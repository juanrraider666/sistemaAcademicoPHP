<?php
/** Aqui escribimos y obtenemos lo que se guardo en $_SESSION  */
class SessionManager
{
    var $prefix = null;


    public function __construct($prefix)
    {
        var_dump($_SERVER['SERVER_NAME']);
        $this->prefix = $prefix . '_' . $_SERVER['SERVER_NAME'] . "_";
    }


    /*
     * Crea una variable de session incluyendo la fecha y hora de creacion
     */
    function write($name, $value)
    {
        if (!$this->exist($name))
            $created = date('y-m-d h:i:s');
        else
            $created = isset($_SESSION[$this->prefix . $name]['created']) ? @$_SESSION[$this->prefix . $name]['created'] : '';


        $_SESSION[$this->prefix . $name]['value'] = $value;
        $_SESSION[$this->prefix . $name]['created'] = $created;
        $_SESSION[$this->prefix . $name]['accessed'] = date('y-m-d h:i:s');

    }

    /*
     * Lee el contenido de la variable de session
     */
    function read($name, $delete = false)
    {
        $_SESSION[$this->prefix . $name]['accessed'] = date('y-m-d h:i:s');
        $value = isset($_SESSION[$this->prefix . $name]['value']) ? @$_SESSION[$this->prefix . $name]['value'] : '';
        if ($delete) $this->destroy($name);

        return $value;
    }

    /**
     * Escribe una variable en la seccion
     * @param $name
     * @param $value
     */
    function w($name, $value)
    {
        $this->write($name, $value);
    }

    /**
     * Lee una variable de seccion especifica
     * @param $name
     * @param $delete
     */
    function r($name, $delete = false)
    {
        return $this->read($name, $delete);
    }

    /**
     * Destruye una variable de seccion
     * @param $name
     */
    function destroy($name)
    {
        unset($_SESSION[$this->prefix . $name]);
    }

    /**
     * Destruye toda la seccion
     */
    function destroyAll()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Verifica si existe una varible de seccion
     * @param $name
     */
    function exist($name)
    {
        if (isset($_SESSION[$this->prefix . $name]))
            return true;
        else
            return false;
    }


}

