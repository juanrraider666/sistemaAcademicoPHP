<?php
/** Verificamos el acceso del usuario y guardamios todos sus atributos en  $CORE_session */
require __DIR__ ."../../vendor/autoload.php";
require_once  '../base.php';
require_once  '../pages/session_manager.class.php';
require_once  '../pages/access.class.php';
require_once  '../pages/helpers.php';


if(isset($_GET['ac'])) {
    $ac = $_GET['ac'];


    $login = ($_POST['email']) ? $_POST['email'] : $CORE_session->read('s_login');
    $pass = ($_POST['password']) ? $_POST['password'] : $CORE_session->read('s_pass');
    $CORE_session->destroy('s_login');
    $CORE_session->destroy('s_pass');

    $objaccess = new access($CORE_session);
    $action = $objaccess->do_login($login, \App\Util\SecurityUtil::calcSHA($pass));

    switch($action){
        case 'success':
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
            header("location: ../index.php");
            exit();
        case 'noregistrado':
            $CORE_session->write('email', $login);
            header("location: register.php");
            exit();
        case 'conectado':
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
            header("location: ../index.php");
            exit();
        default:
            $msg = ($action) ? '?msg='.$action : '';
            header("location: login.php".$msg);
            exit();
    }

}
else {
    header("location: ../index.php");
    exit();
}