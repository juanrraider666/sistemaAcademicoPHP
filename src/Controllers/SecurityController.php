<?php


namespace App\Controllers;


use App\Providers\UserProvider;
use App\Service\Mail\mailer;

class SecurityController
{

    public function resetPassword($email)
    {

        if ($email) {
            $user = $this->getUser($email);

            if (count($user)) {
                $mailer = new mailer();
                $mailer->send([
                    'email' => $user['email'],
                    'usermame' => $user['first_name']
                ], "Reestablecer contraseña", 'reset_password.html');

                return true;
            }

        }

        return false;

    }


    protected function getUser(string $email)
    {
        $provider = new UserProvider();
        return $provider->getUserByEmail($email);
    }

}