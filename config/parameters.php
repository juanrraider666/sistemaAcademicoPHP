<?php
require_once("routes.php");

class parameters
{
    const NAME_PROJECT = "sistemaAcademico";

}


$url = routes::ctrRuta();

define("DOMAIN_ROOT", "$url"); //ruta
define("NAME_PROJECT", "sistemaAcademico"); //ruta
define("CONTROLLER_DEFAULT", "productController"); //controlador por defecto
define("ACTION_DEFAULT", "index"); //action por defecto
define("DEBUG", "1");
define("MAIL_CONFIG", [
    'email' => 'iamputorraider09@gmail.com',
    'password' => 'putorraider',
]);

// parametros de conexion
$arrDB = ["_DEFAULT" => [
    "host" => "localhost",
    "user" => "root",
    "pass" => "",
    "db" => "sisstema_academico"
]];
