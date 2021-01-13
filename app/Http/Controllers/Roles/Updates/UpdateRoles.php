<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 11:28 AM
 */

namespace App\Http\Controllers\Roles\Updates;

use App\Agent_levels;
use Illuminate\Http\Request;

class UpdateRoles
{
    /** @var  Agent_levels */
    private $repository;

    /**
     * UpdateRoles constructor.
     * @param Agent_levels $repository
     */
    public function __construct(Agent_levels $repository)
    {
        $this->repository = $repository;
    }


    public function update(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->parent = $request->input('parent');
        $data->remarks = $request->input('remarks');

        if($data->save()){
            return $data;
        }
    }

}