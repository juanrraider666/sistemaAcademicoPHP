<?php

use App\Entity\User;
use App\Service\QueryService;

class access extends QueryService
{

    private $session = '';

    function __construct($session7)
    {
        $this->session = $session7;
    }

    private function regenerateSession()
    {
        session_regenerate_id();
        $new_sessionid = session_id();
        $this->session->write('session_id', $new_sessionid);
    }


    /**
     *
     * @param array $user
     */
    private function setSessionValues($user)
    {
        $fieldsToRemove = ['password', 'question', 'answer', 'cpf'];
        $arrayWithSessionValues = array_diff_key($user, array_flip($fieldsToRemove));


        foreach ($arrayWithSessionValues as $key => $value) {
            $this->session->write('s_' . $key, $value);
        }
        $this->session->write('s_first_name', $user['first_name']);
        $this->session->write('s_last_name', $user['last_name']);
        $this->session->write('s_complete_name', $user['first_name']." ".$user['last_name']);
    }


    public function validateLogin($user)
    {
        try {

            if ($user && $user['status_id'] == User::STATUS_ACTIVE) {

                $this->setSessionValues($user);

                //Usuario Conectado!
                if ($user['connected'] && !$this->session->read('s_pgen')) {
                    return "conectado";
                }

                $this->updateUserConnected($user['id']);

                return 'success';

            } else {
                return 'LoginError&estado=' . $user['status_id'];
            }
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * Dar acceso a la aplicacion
     * @param $login
     * @param $password
     * @return string
     */
    function do_login($login, $password)
    {

        try {
            //$this->regenerateSession();

            if (!$login || !$password) {
                return "LoginError";
            }

            $userObj = new \App\Repository\UserRepository();
            $userRoleRepo = new \App\Repository\UserRoleRepository();

            $user = $userObj->find(['email' => $login], 1);
            $userStatus = (int)$user[0]['status_id'];


            if (empty($user[0]['password']) || empty($user[0]['email'])) {
                return 'noregistrado';
            }

            if(!$this->validatePassword($user[0], $password))
            {
                return  'datosInvalidos';

            }

            /** escribimos la sesion */
            $this->session->write('s_id', $user[0]['id']);

            $profile = $userRoleRepo->find(['user_id' => $user[0]['id']], 1);
            /** escribimos la el perfi */
            $this->session->write('s_profile', $profile[0]['role_id']);

            /** verificamos su estatus */
            switch ($userStatus) {
                case User::STATUS_INACTIVE:
                case User::STATUS_BLOCKED:
                    return 'LoginError&estado=' . $userStatus;
            }


        } catch (PDOException $exc) {
            throw $exc;
        }

        return $this->validateLogin($user[0]);

    }


    private function validatePassword(array $user, string $password)
    {
        return $user['password'] == $password;
    }

    /**
     * actualizar el last_login
     * @param int $user_id
     */
    function updateUserConnected($user_id)
    {
        $data = [
            'id' => $user_id,
            'last_login' => date('Y-m-d H:i:s'),
            'connected' => 1,
            'session' => session_id(),
        ];

        $userRepo = new \App\Repository\UserRepository();
        $user = new User();
        $user->id = $user_id;
        $userRepo->save($data, 'User Login');

        $this->session->write('s_connected', 1);
    }

    /**
     * verificamos si esta logeado
     * @return boolean
     */
    function isLogged()
    {
        if (($this->session->read('s_connected') == 1
                || $this->isUserConnected($this->session->read('s_id')))
            && $this->userExists($this->session->read('s_id'))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Finds out if an user is connected or not.
     * @param int $user_id
     * @return boolean
     */
    protected function isUserConnected($user_id)
    {
        if (!$this->session->read('s_pgen')) {
            $userObj = new User();
            $conditions = array('id' => $user_id, 'connected' => '1');
            $fields = array('connected', 'session');
            $res_array = $userObj->find($conditions, '', $fields);

            if ($res_array) {
                return true;
            } else {
                $this->session->destroyAll();
                return false;
            }
        }
        return true;
    }

    /**
     * Return true when user exists
     * @param int $user_id
     * @return boolean
     */
    function userExists($user_id)
    {
        $userObj = new User();
        $conditions = array('id' => $user_id);

        if ($userObj->find($conditions, '', array('connected'))) {
            $whosOnlineObj = new WhosOnline($this->session);
            $whosOnlineObj->updateWhosOnline();
            return true;
        }
        return false;
    }


    /**
     * Session attribute getter
     * @return session
     */
    function getSession()
    {
        return $this->session;
    }
}
