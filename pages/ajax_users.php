<?php

require __DIR__ . "./../vendor/autoload.php";


header('Content-type: application/json; charset=utf-8');


if(isset($_GET['id']))
{
   getUserEdit($_GET['id']);

}

if(isset($_POST['data_user']))
{
    setEditUser($_POST['data_user']);

}

if(isset($_POST['enable_user']))
{
    enableUser($_POST['enable_user']);

}

function getUserEdit($id)
{
    $userController = new \App\Controllers\Backend\AdminUsersController();
    echo $userController->getUserByIdAjax($id);
}

function setEditUser($data)
{
    $userController = new \App\Controllers\Backend\AdminUsersController();
    if($userController->editUser($data)){
        echo json_encode(['success' => true, 'message' => 'Success!']);
    }
}

function enableUser($data)
{
    $data['status_id'] = $data['status_id'] ? 0 : 1;

    $userController = new \App\Controllers\Backend\AdminUsersController();
    if($userController->enable($data)){
        echo json_encode(['success' => true, 'message' => 'Success!']);
    }

}



