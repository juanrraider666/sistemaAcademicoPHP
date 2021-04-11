<?php


namespace App\Repository;


use App\Service\QueryService;

class UserRoleRepository extends QueryService
{
    private  $table = "user_role";

    public function __construct()
    {
        parent::__construct($this->table);
    }

}