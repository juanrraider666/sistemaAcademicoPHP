<?php


namespace App\Entity;


use App\Service\QueryService;

class UserRole extends QueryService
{
    const ROLE_CLIENT = 1;
    const ROLE_USER = 2;

    var $table = 'user_role';

    public function __construct()
    {
        parent::__construct($this->table);
    }


    public function addRoleUser($user, $profile): bool
    {
        $this->save([
            'user_id' => $user,
            'role_id' => $profile
        ]);

        return true;
    }

}