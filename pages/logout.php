<?php

use App\Entity\User;

require __DIR__ . "./../vendor/autoload.php";
require_once 'session_manager.class.php';
require_once 'access.class.php';
require_once '../src/Core/session.php';
require_once 'helpers.php';

require_once('../base.php');

$data = array(
    'connected' => 0,
    'session' => '-'
);

$ids = array(
    'id' => $CORE_session->read('s_id'),
    'session' => session_id()
);

$objUser = new User();
$resultUpdate = $objUser->saveMultiId($data, '', '', '', $ids);

$CORE_session->destroyAll();
header("location: " . DOMAIN_ROOT . "login.php");
exit;
