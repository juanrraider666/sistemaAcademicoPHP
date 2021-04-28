<?php


namespace App\Repository;


use App\Entity\UserRole;
use App\Service\QueryService;

class UserRepository extends QueryService
{
    private  $table = "user";

    public function __construct()
    {
        parent::__construct($this->table);
    }


    public function getUserTeacherProfile()
    {
        $teacherRole = UserRole::ROLE_TEACHER;
        $query = "
        SELECT u.id, u.last_name FROM user_role
        INNER JOIN user u ON u.id = user_role.user_id
        WHERE role_id = $teacherRole
        ";

        return $this->_SQL_tool('SELECT',__METHOD__, $query);
    }
}