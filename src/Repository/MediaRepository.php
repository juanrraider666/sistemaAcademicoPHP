<?php


namespace App\Repository;


use App\Service\QueryService;

class MediaRepository extends QueryService
{
    private $table = 'media';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getMedia()
    {
        $query = "SELECT * FROM $this->table WHERE status = 1 ORDER BY $this->table.order";

        return $this->_SQL_tool("SELECT",__METHOD__,$query);

    }
}