<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 12:54 PM
 */

namespace App\Http\Controllers\Roles\Deletes;


use App\Agent_levels;

class DeleteRoles
{
    /** @var  Agent_levels */
    private $repository;

    /**
     * DeleteRoles constructor.
     * @param Agent_levels $repository
     */
    public function __construct(Agent_levels $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return $data;
        }
    }

}