<?php


namespace App\Providers;


use App\Repository\UserRepository;

class UserProvider
{

    private $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }



    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM user where email = :email";
        return $this->repository->_SQL_tool(
            'SELECT_SINGLE',
            __METHOD__, $query, '', 1, '', '_DEFAULT', ['email' => $email] );
    }
}