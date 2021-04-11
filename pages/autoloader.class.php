<?php

class Autoloader {

    /**
     * Registra la clase y la funcion que permite autocargar las clases
     * @return
     */
    public static function Register() {
        return spl_autoload_register(['Autoloader', 'APP_Load']);
    }

    /**
     * Funcion para autocargar las clases simples en pages
     * @param $class_name
     * @return
     */
    public static function APP_Load($class_name) {
        if ((class_exists($class_name))) {
            return false;
        }

        require_once $class_name.'.php';
    }

}
