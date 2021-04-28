<?php


namespace App\Repository;


use App\Service\QueryService;

class ProgramGroupRepository extends QueryService
{
    private $table = 'program_group';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

    public function findFromGroup($groupId)
    {
        $query = "
        SELECT * FROM $this->table
        WHERE  group_id = $groupId
        ";

        return $this->_SQL_tool('SELECT',__METHOD__, $query);
    }

}