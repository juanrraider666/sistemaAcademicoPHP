<?php


namespace App\Repository;


use App\Service\QueryService;

class TeacherCourseRepository extends QueryService
{

    private $table = 'teacher_course';

    public function __construct($table = null)
    {
        parent::__construct($this->table);
    }

    public function findFromCourse($courseId)
    {
        $query = "
         SELECT * FROM $this->table
            where course_id = $courseId
        ";
        return $this->_SQL_tool('SELECT',__METHOD__, $query);
    }
}