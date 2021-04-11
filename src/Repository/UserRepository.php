<?php


namespace App\Repository;


use App\Service\QueryService;

class UserRepository extends QueryService
{
    private  $table = "user";

    public function __construct()
    {
        parent::__construct($this->table);
    }

}