<?php

namespace App\Controllers;

use App\Entity\User;
use App\Entity\UserRole;
use App\Service\Mail\mailer;
use App\Util\SecurityUtil;

class UserController
{
    public function createUser(int $profile, array $userRequest): bool
    {

        switch ($profile) {
            case User::PROFILE_CLIENT:
            case User::PROFILE_USER:
                $result =  $this->insert($userRequest, $profile);
                break;
            default:
                $result = false;
                break;
        }

        return $result;


    }

    /**
     * @param $userRequest
     * @param $profile
     * @return bool
     */
    private function insert($userRequest, $profile): bool
    {
        $userObject = new User();
        $userRequest['password'] = SecurityUtil::calcSHA($userRequest['password']);
        try {
            if($userObject->save($userRequest))
            {
                if($this->insertProfile($userObject->id, $profile))
                {
                    $mailer = new mailer();
                    $mailer->send([
                        'email' => $userRequest['email'],
                        'usermame' => $userRequest['first_name']
                    ], "Bienvenido a " . NAME_PROJECT,'success_register.html');

                    return true;
                }

                return false;

            }

        }catch (PDOException $exception)
        {
            return 'No se puede crear usuario';
        }


        return true;

    }

    protected function insertProfile($user, $profile)
    {
        $userRole = new UserRole();
        return $userRole->addRoleUser($user, $profile);
    }


}