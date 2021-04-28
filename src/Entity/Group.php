<?php


namespace App\Entity;


use App\Service\QueryService;

class Group  extends QueryService
{

    public $id;

    var $table = "`group`";

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }


    public function create($params)
    {
        $group = new self();
        $group->save($params);
    }

}