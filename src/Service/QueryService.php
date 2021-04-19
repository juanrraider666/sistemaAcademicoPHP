<?php

namespace App\Service;

/** TODO: aqui creamos todo para poder ejecutar nuestras consultas a la BD  */

use App\Core\dbConection;
use ConditionSql;
use PDO;
use PDOException;
use PDOStatement;


class QueryService extends dbConection
{

    var $SELECT = 'SELECT';
    var $return_id = '';
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getAll()
    {
        $result = $this->getConnection()->query("SELECT * FROM $this->table ORDER BY id DESC");
        $items = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }

        return $items;
    }

    public function getOne($param)
    {

        $query = "
        SELECT * 
        FROM $this->table
        WHERE id = $param
        ";
        return $this->_SQL_tool('SELECT',__METHOD__, $query);
    }

    /**
     * Guarda la informacion de una tabla en especifico
     *
     * @param $data
     * @param string $comment
     * @param string $app
     * @return array
     */
    public function save(array $data, $comment = '', $app = "_DEFAULT", $i = null)
    {
        $params = [];
        //INSERTAMOS LA DATA
        if (!isset($data['id']) && !isset($this->id)) {
            $fieldNames = [];
            $refValues = [];


            foreach ($data as $field => $value) {
                $refValues[] = $this->buildParameter($params, $field, $value);
                $fieldNames[] = "`{$field}`";
            }

            $query = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $this->table,
                implode(", ", $fieldNames),
                implode(", ", $refValues)
            );

            $result = $this->_SQL_tool('INSERT', __METHOD__, $query, $comment, '', '', '_DEFAULT', $params);
            $this->id = $result;
        } else {
            //UPDATING ROWS
            $sets = [];

            foreach ($data as $field => $value) {
                // @todo: revisar si quitar data de las condiciones.
                $sets[] = $this->buildCondition($params, $field, $value);
            }

            if (is_null($data['id'])) {
                $params[':id'] = $this->id;
            }

            $query = sprintf(
                'UPDATE %s SET %s WHERE `id`=:id',
                $this->table,
                join(", ", $sets)
            );
            $result = $this->_SQL_tool('UPDATE', __METHOD__, $query, $comment, '', '', '_DEFAULT', $params);
        }

        return $result;
    }
    /**
     * OJO No actualiza Ids o campos usados para filtrar
     * @param $data
     * @param string $comment
     * @param string $company_name
     * @param string $app
     * @param array $ids
     * @return array
     */
    function saveMultiId($data, $comment = '', $company_name = '', $app = "_DEFAULT", $ids = array())
    {
        if (empty($ids)) {
            $result = $this->save($data, $comment = '', $company_name = '', $app = "_DEFAULT");
        } else {
            $sets = [];
            $conditions = [];
            $params = [];

            foreach ($data as $field => $value) {
                $sets[] = $this->buildCondition($params, $field, $value);
            }

            foreach ($ids as $field => $value) {
                if ($value) {
                    $conditions[] = $this->buildCondition($params, $field, $value, '_where');
                }
            }

            $query = sprintf(
                'UPDATE %s SET %s WHERE %s',
                $this->table,
                join(", ", $sets),
                join(" AND ", $conditions)
            );
//            var_dump($params);die;
            $result = $this->_SQL_tool('UPDATE', __METHOD__, $query, $comment, '', '', '_DEFAULT', $params);
        }

        return $result;
    }
    /**
     * Funcion general para hacer los queries
     * @param $type
     * @param $funct_call
     * @param $query
     * @param string $comment
     * @param int $calcrows
     * @param string $viewQ
     * @param string $app
     * @param $params
     */
    function _SQL_tool($type, $funct_call, $query, $comment = '', $calcrows = 1, $viewQ = '', $app = '_DEFAULT', $params = [])
    {
        try {

            $type = strtoupper($type);

            $queryTrim = trim($query);
            $conn = $this->getConnection($app);
            if ($conn) {
                switch ($type) {
                    case 'SELECT':
                        return $this->executeSelect($conn, $queryTrim, $params);
                    case 'SELECT_SINGLE':
                        return $this->executeSelect($conn, $queryTrim, $params, true);
                    case 'INSERT':
                    case 'UPDATE':
                    case 'DELETE':
                        return $this->executeIUD($conn, $queryTrim, $params, $type, $comment, $funct_call);
                }
            }
            $conn = null;
            return false;
        } catch (PDOException $exc) { // PDOException o la excepcion a manejar
            throw $exc;
        }
    }

    /**
     * Execute Insert, Update or Delete
     * @param $conn
     * @param $query
     * @param $params
     * @param $type
     * @param $comment
     * @param $function_call
     * @return bool|string
     */
    private function executeIUD($conn, $query, $params, $type, $comment, $function_call)
    {
        try {

            $pdoQuery = $conn->prepare($query);
            $result = $pdoQuery->execute($params);
            $return_value = true;
            if ($type === 'INSERT') {
                $this->return_id = $conn->lastInsertId();
                $return_value = $this->return_id;
            }

            $conn = $pdoQuery = null;
            return $return_value;
        } catch (PDOException $exc) { // PDOException o la excepcion a manejar
            throw $exc;
        }
    }

    /**
     * @param $conn
     * @param $query
     * @param $params
     * @param bool $single
     * @return mixed
     */
    private function executeSelect($conn, $query, $params, $single = false)
    {
        try {

            $pdoQuery = $conn->prepare($query);
            $pdoQuery->execute($params);

            if ($single) {
                $return = $pdoQuery->fetch(PDO::FETCH_ASSOC);
            } else {
                $return = $pdoQuery->fetchAll(PDO::FETCH_ASSOC);
            }

            return $return;
        } catch (PDOException $exc) { // PDOException o la excepcion a manejar
            throw $exc;
        }
    }

    /**
     * @param $condition
     * @param null $limit
     * @param string $fields
     * @param string $type
     * @param string $order
     * @return array|bool
     */
    public function find($condition, $limit = null, $fields = '*', $type = '', $order = '')
    {
        $queryCondition = '1 ';
        $query = 'SELECT ';
        $params = [];

        if ($condition != null) {
            foreach ($condition as $field => $value) {
                $queryCondition .= ' AND ' . $this->buildCondition($params, $field, $value);
            }
        }


        if (is_array($fields)) {
            foreach ($fields as $i => $value) {
                if ($i > 0) $query .= ',';
                $query .= "`" . $value . "`";
            }
        } else {
            $query .= $fields;
        }



        $query .= " FROM " . $this->table  . " where " . $queryCondition;
        $result = false;

        if (!empty($order)) {
            $query .= ' ORDER BY ' . get_class($this) . '.' . $order;
        }

        $result = $this->_SQL_tool('SELECT', __METHOD__, $query, '', '', '', '_DEFAULT', $params);

        if (strcasecmp('list', $type) == 0) {
            $list = array();
            $key = (count($fields) > 1) ? $fields[0] : 'id';
            $value = (count($fields) > 1) ? $fields[1] : 'name';
            if (count($result) > 0)
                foreach ($result as $element) $list[$element[$key]] = $element[$value];
            $result = $list;
        }

        return $result;
    }


    /**
     * Construye una condición basado en los datos que se le pasen como argumentos.
     *
     * @param array $params
     * @param $columnName
     * @param $value
     * @param null $refSuffix
     * @return string
     */
    protected function buildCondition(array &$params, $columnName, $value, $refSuffix = null)
    {
        if (is_array($value)) {
            $references = [];

            foreach (array_values($value) as $key => $inValue) {
                $references[] = $this->buildParameter(
                    $params,
                    $columnName . $key,
                    $inValue,
                    $refSuffix
                );
            }

            return sprintf("%s IN (%s)", $columnName, join(',', $references));
        } elseif ($value instanceof ConditionSql) {
            return sprintf(
                '%s %s %s',
                $this->quotedColumnName($value->getField()),
                $value->getComparator(),
                $this->buildParameter($params, $value->getField(), $value->getValue(), $refSuffix)
            );
        } else {
            return sprintf(
                '%s = %s',
                $this->quotedColumnName($columnName),
                $this->buildParameter($params, $columnName, $value, $refSuffix)
            );
        }
    }


    protected function buildConditions(array $conditions, array &$params, $isAnd = true, $refSuffix = null)
    {
        if (0 === count($conditions)) {
            return ' true ';
        }

        $parts = [];

        foreach ($conditions as $field => $value) {
            $parts[] = $this->buildCondition($params, $field, $value, $refSuffix);
        }

        return ' ' . join($isAnd ? ' AND ' : ' OR ', $parts) . ' ';
    }

    protected function buildParameter(array &$params, $columnName, $value, $refSuffix = null)
    {
        if (is_string($value)) {
            $value = trim($value);
        }

        if (is_string($value) && $value !== null) {
            $value = str_replace("\'", "'", $value);
        }

        $reference = $this->escapeColumnName($columnName . $refSuffix);
        $params[':' . $reference] = $value;
        //:last_name
        return sprintf(':%s', $reference);
    }

    /**
     * @param string $sql
     * @param array $params
     */
    public function findAllBySQL($sql, $params = [])
    {
        return $this->_SQL_tool(
            'SELECT', __METHOD__, $sql, "", 1, "", '_DEFAULT', $params
        );
    }
    /**
     * @param $columnName
     * @return string|string[]
     */
    protected function escapeColumnName($columnName)
    {
        return str_replace([' ', '-', '.'], '_', $columnName);
    }

    private function quotedColumnName($columnName)
    {
        if (in_array(strtolower($columnName), ['order', 'from', 'user', 'limit', 'offset'])) {
            return "`{$columnName}`";
        }

        return $columnName;
    }
}
