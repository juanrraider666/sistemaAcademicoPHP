<?php


namespace App\Repository;


use App\Service\QueryService;

class GroupRepository  extends QueryService
{
    private  $table = "`group`";

    public function __construct()
    {
        parent::__construct($this->table);
    }


}