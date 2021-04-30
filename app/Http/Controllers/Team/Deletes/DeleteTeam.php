<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 23/10/2020
 * Time: 7:18 PM
 */

namespace App\Http\Controllers\Team\Deletes;


use App\Agent;
use App\User;

class DeleteTeam
{
    /** @var  Agent */
    private $repository;

    /**
     * DeleteTeam constructor.
     * @param Agent $repository
     */
    public function __construct(Agent $repository)
    {
        $this->repository = $repository;
    }


    public function deleteAgent($id)
    {
        $data = $this->repository->findOrFail($id);
        $data->status = 2;

        $id_agent = User::find($data->user_id);
        $id_agent->status = 1;
        $id_agent->save();

        if($data->save()){
            return $data;
        }
    }
}
