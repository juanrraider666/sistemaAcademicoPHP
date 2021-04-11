<?php

class routes {

    public static function ctrRuta(){
        $ip = $_SERVER['SERVER_NAME'];
        return "http://$ip/".Parameters::NAME_PROJECT."/";
    }

}