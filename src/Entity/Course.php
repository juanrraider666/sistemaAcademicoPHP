<?php


namespace App\Entity;


use App\Service\QueryService;

class Course extends QueryService
{
    var $table = 'course';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }


}