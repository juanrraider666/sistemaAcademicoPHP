<?php


namespace App\Entity;


use App\Service\QueryService;

class ProgramGroupTeacher extends QueryService
{
    var $table = 'program_group_course';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

}