<?php


namespace App\Entity;


use App\Service\QueryService;

class Application extends QueryService
{
    var $table = 'application';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

    public function isHavePermissionOnApplication($status, $source, $name, $profile): bool
    {
        $query = "
            SELECT
                ap.application_id,
                ap.profile_id
            FROM application a
            INNER JOIN application_profile ap ON ap.application_id = a.id
            WHERE
                a.active = :status
            AND ap.profile_id = :profile
            AND a.name = :name
            ";

        $params = [
            'status' => $status,
            'profile' => $profile,
            'name' => $name,
        ];

        $result =  $this->findAllBySQL($query, $params);

        if(count($result)){
            return true;
        }

        return false;
    }

}