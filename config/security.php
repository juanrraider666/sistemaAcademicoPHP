<?php

(!is_null($pathFile) ? $pathFile : $pathFile = '..' );

require_once  $pathFile . '/pages/session_manager.class.php';
require_once  $pathFile . '/pages/access.class.php';
require_once  $pathFile . '/src/Core/session.php';
require_once  $pathFile . '/pages/helpers.php';


if(!is_null($CORE_session)){
    $profileId = $CORE_session->read('s_profile');
    if(!validatePermission($pathFrom, $profileId, $namePath)){
        header('location: ../pages/error.php');
        exit;
    }
}

 function validatePermission($path, $profile, $name = '', $status = true): bool
{
    $app = new \App\Entity\Application();
    return $app->isHavePermissionOnApplication($status, $path, $name, $profile);
}

