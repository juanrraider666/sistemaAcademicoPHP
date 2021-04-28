<?php


namespace App\Controllers;


use App\Entity\Group;
use App\Entity\ProgramGroup;
use App\Repository\ProgramRepository;

class GroupController
{

    public function createAction($params)
    {
        $programID = $params['program'];

        unset($params['program']);
        $group = new Group();
        $group->save($params);

        $paramsGrou = [
          'group_id' => (int)$group->id,
            'program_id' => (int)$programID
        ];

        $programGroup = new ProgramGroup();
        $programGroup->save($paramsGrou);
        return true;
    }

    public function listAction()
    {
        $group = new Group();
        return $group->getAll();
    }

   public function listProgram()
   {
       $programGroup = new ProgramRepository();
       return $programGroup->getAll();
   }

}