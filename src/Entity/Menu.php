<?php


namespace App\Entity;


use App\Service\QueryService;

class Menu extends QueryService
{
    /******************************************************************
    /*******  VARIABLES
    /******************************************************************/
    var $table = 'menu';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

    /**
     * @param int $idStatus
     * @return array
     */
    public function getMenuData($idProfile = null, $idStatus = 1)
    {
        $query = <<<SQL
            SELECT DISTINCT
                m.id,
                m.id_parent,
                m.description,
                m.link,
                m.vorder
            FROM menu m
            WHERE
                m.status = :status
SQL;
        $params = [
            'status' => $idStatus,
        ];

        $subQueries = [];


        if ($idProfile != NULL) {
            $subQueries[] = "SELECT id_menu FROM menu_profile WHERE id_profile = :profile";
            $params['profile'] = $idProfile;
        }

        if (0 < count($subQueries)) {
            $subQueries = join(' UNION ', $subQueries);
            $query .= ' AND m.id IN ('.$subQueries.')';
        }

        $query .= " ORDER BY vorder";

        return $this->findAllBySQL($query, $params);
    }

    public function getMenu($idProfile = null, $idCompanyType = null, $idMedal = null, $idRegion = null, $idParent = 0, $idStatus = 1){
        $query = "	SELECT m.*
					FROM menu m
					WHERE 
					m.status = '$idStatus'
					AND
					m.id_parent = '$idParent'";

        if ($idProfile != null)
            $query .= "	AND
					m.id NOT IN 
					(SELECT mp.id_menu
						FROM menu_profile mp
						WHERE
						mp.id_profile = '$idProfile')";


        $query .= " ORDER by m.vorder";

        return $this->_SQL_tool($this->SELECT, __METHOD__, $query);
    }

   public function divideURL($link){
        $pos = strrpos($link, "/");
        $page = substr($link,$pos+1);
        return $page;
    }

    public  function getSubMenu($idProfile = null, $idParent = 0, $idStatus = 1){

        $tmpID = -1;
        $con = 0;

        $trueResult = [];

        //Pagina de navegacion de la aplicacion
        $query = "SELECT * FROM Menu m WHERE m.link like '%" . $this->divideURL($_SERVER['PHP_SELF']) . "' ";
        $result = $this->_SQL_tool($this->SELECT, __METHOD__, $query);
        $tmpID = $result[0]['idParent'];
        $trueResult[] = $result[0];

        while($tmpID != 0){
            $query = "SELECT * FROM Menu m WHERE m.id = " . $tmpID;
            $result = $this->_SQL_tool($this->SELECT, __METHOD__, $query);
            $trueResult[] = $result[0];
            $tmpID = $result[0]['idParent'];
            if($con>5){
                break;
            }
            $con++;
        }

        //Descubre si ya se encuentra registrado
        if(substr_count($_SERVER['PHP_SELF'],'landing_page.php')==0){
            //Pagina de inicio
            $query = "SELECT * FROM Menu m WHERE m.link like '%landing_page.php'";
            $result = $this->_SQL_tool($this->SELECT, __METHOD__, $query);
            $trueResult[] = $result[0];
        }

        return $trueResult;
    }


    public function getVOrder ($idParent = 0, $idStatus = 1){
        $query = "	SELECT
					MAX(menu.vorder)
					FROM
					menu
					WHERE
					menu.id_parent = '$idParent'
					AND
					menu.status = '$idStatus'";

        return $this->_SQL_tool($this->SELECT, __METHOD__, $query);
    }

    public function getSimpleMenu($idProfile = null, $IdCompanyType = null, $idMedal = null, $idRegion = null)
    {
        $query = "
            SELECT DISTINCT
              m.id,
              m.id_parent,
              m.description,
              m.link,
              m.vorder
            FROM
              menu m
            WHERE
              m.id NOT IN
              (
                SELECT id_menu FROM menu_profile WHERE id_profile = ". $idProfile ."
                UNION
                SELECT menu_id FROM menu_company_type WHERE company_type_id = ". $IdCompanyType;
        if($idMedal){
            $query .= "
                        UNION
                        SELECT menu_id FROM menu_medals WHERE medal_id = ". $idMedal;
        }
        $query .= "
                    UNION
                    SELECT menu_id FROM menu_regions WHERE region_id = ". $idRegion ."
              )
            ORDER BY id_parent, vorder
        ";

        return $this->_SQL_tool($this->SELECT, __METHOD__, $query);
    }
}