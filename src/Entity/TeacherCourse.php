<?php


namespace App\Entity;


use App\Service\QueryService;

class TeacherCourse extends QueryService
{

    private $table = 'teacher_course';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }


    public static function create($params)
    {
        $group = new self();
        $group->save($params);
    }
}