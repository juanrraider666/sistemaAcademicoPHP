<?php
/** TODO: Posiblemente sera eliminada ya que creamos otra:  sesion manager */

namespace App\Core;


class session
{

    private $session;

    public function __construct($session_name)
    {
        session_start(); //evaluar esto

        if(!isset($_SESSION[$session_name])){
            $_SESSION[$session_name] = NULL;
            //echo "Sesión $session_name creada";
        }
        //echo "Sesión $session_name ya existe";

        $this->session = $session_name;
    }

    public function setValue($value)
    {
        $_SESSION[$this->session] = $value;
    }

    public function getValue()
    {
        return $_SESSION[$this->session];
    }

}