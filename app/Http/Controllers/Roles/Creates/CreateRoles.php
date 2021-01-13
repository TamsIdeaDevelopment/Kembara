<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 12/10/2020
 * Time: 8:19 PM
 */

namespace App\Http\Controllers\Roles\Creates;


use App\Agent_levels;
use Illuminate\Http\Request;

class CreateRoles
{
    /** @var  Agent_levels */
    private $repository;

    /**
     * CreateRoles constructor.
     * @param Agent_levels $repository
     */
    public function __construct(Agent_levels $repository)
    {
        $this->repository = $repository;
    }


    public function create(Request $request)
    {
        $model = $this->repository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent' => $request->input('parent'),
            'remarks' => $request->input('remarks'),
        ]);

        return $model;
    }
}