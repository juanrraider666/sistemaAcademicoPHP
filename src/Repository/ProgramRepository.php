<?php


namespace App\Repository;


use App\Service\QueryService;

class ProgramRepository   extends QueryService
{

    private  $table = "`program`";

    public function __construct()
    {
        parent::__construct($this->table);
    }


}