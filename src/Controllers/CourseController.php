<?php


namespace App\Controllers;


use App\Entity\ProgramGroupTeacher;
use App\Repository\ProgramGroupRepository;
use App\Repository\ProgramRepository;
use App\Repository\TeacherCourseRepository;

class CourseController
{

    public function assosiateGroup($group, $course)
    {
        $courseGroup = new TeacherCourseRepository();
        $programGGroup = new ProgramGroupRepository();

        $pg = $programGGroup->findFromGroup($group);
        $teahcerCourse =  $courseGroup->findFromCourse($course);

        $inser = [
          'program_group_id' => $pg[0]['id'],
           'teacher_course_id' =>$teahcerCourse[0]['id']
        ];

        $pc = new ProgramGroupTeacher();
        $pc->save($inser);
        return true;

    }
}