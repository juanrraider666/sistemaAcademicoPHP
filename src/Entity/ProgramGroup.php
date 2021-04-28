<?php


namespace App\Entity;


use App\Service\QueryService;

class ProgramGroup extends QueryService
{

    var $table = "`program_group`";

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }
}