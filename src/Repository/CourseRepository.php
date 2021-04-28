<?php


namespace App\Repository;


use App\Service\QueryService;

class CourseRepository extends QueryService
{
    private  $table = "`course`";

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

}