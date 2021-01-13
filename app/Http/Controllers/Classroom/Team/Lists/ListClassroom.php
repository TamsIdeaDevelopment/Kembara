<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 28/12/2020
 * Time: 1:40 AM
 */

namespace App\Http\Controllers\Classroom\Team\Lists;


use App\Classroom;
use App\Http\Resources\Classroom as ClassroomResources;

class ListClassroom
{
    public function all()
    {
        $data = Classroom::all();

        return ClassroomResources::collection($data);
    }
}