<?php

namespace App\Core;

use PDO;
use PDOException;

class dbConection
{
    public static $DBParameters = ["_DEFAULT" => [
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "dbshopuninpahu"
    ]];

    protected static $DBconnection = [];
    public static $DBsession = '';


    /**
     * Guarda de forma estatica los paramteros de conexion de la base de datos
     * @param array $arrDB
     */
    public static function assignDBParameters($arrDB): array
    {
        return self::$DBParameters = $arrDB;
    }


    /**
     * Conecta con la base de datos permitiendo que sean multiples conexiones a distintas bases de datos
     * @param string $app
     * @return boolean
     */
    public function _connectDB($app = "_DEFAULT"): bool
    {
        try {
            $arrDBP = self::$DBParameters[$app];
            $stringConnect = sprintf('mysql:host=%s;dbname=%s', $arrDBP['host'], $arrDBP['db']);
            self::$DBconnection[$app] = new PDO($stringConnect, $arrDBP['user'], $arrDBP['pass']);
            self::$DBconnection[$app]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exc) {
            throw $exc;
        }
        if (empty(self::$DBconnection[$app]))
            return false;

        return true;
    }

    /**
     * Guarda el objeto del manejo de sessiones en el dbtools
     * @param $varSession
     */
    public static function assignSession($varSession) {
        self::$DBsession = $varSession;
    }

    /**
     * Verifica la conexion a la base de datos
     * @param $app
     * @return bool
     */
    public function check_connect($app = '_DEFAULT'): bool
    {
        if (!isset(self::$DBconnection[$app])){
            return $this->_connectDB($app);
        }
        return true;
    }

    /**
     * @param string $app
     * @return mixed|PDO
     */
    protected function getConnection($app = "_DEFAULT")
    {
        if (!isset(self::$DBconnection[$app]))
            $this->_connectDB($app);

        return self::$DBconnection[$app];
    }


}