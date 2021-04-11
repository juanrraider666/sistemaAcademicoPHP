<?php


namespace App\Controllers\Backend;


use App\Entity\User;
use App\Repository\UserRepository;
use App\Util\SecurityUtil;

/**
 * Class AdminUsersController
 * @package App\Controllers\Backend
 */
class AdminUsersController
{

    public function editUser($data)
    {
        $userObject = new User();
        $data['password'] = SecurityUtil::calcSHA($data['password']);

        if($userObject->save($data))
        {
            return true;
        }
        return false;

    }

    public function enable($data)
    {
        $userObject = new User();
        if($userObject->save($data))
        {
            return true;
        }

        return false;

    }

    public function listUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getAll();
    }

    public function getUserByIdAjax($id)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getOne($id);
        return json_encode([
            'success' => true,
            'data' => $user[0]
        ]);
    }

}