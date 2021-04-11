<?php


namespace App\Controllers;


class ApplicationController
{

    public function validatePermission($path, $profile, $name = '', $status = true): bool
    {
        $app = new \App\Entity\Application();
        return $app->isHavePermissionOnApplication($status, $path, $name, $profile);
    }

}