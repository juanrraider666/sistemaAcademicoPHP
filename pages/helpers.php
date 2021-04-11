<?php
/** helper para guardar la sesion con el prefijo AM */
error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED);
session_start();

$CORE_session = new SessionManager('AM');
\App\Core\dbConection::assignSession($CORE_session);




