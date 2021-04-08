<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 23/10/2020
 * Time: 1:43 AM
 */

namespace App\Http\Controllers\Team\Updates;


use App\Agent;
use App\Running_numbers;
use Illuminate\Http\Request;

class UpdateTeam
{
    /** @var  Agent */
    private $repository;

    /** @var  Running_numbers */
    private $running_numbers;

    /**
     * UpdateTeam constructor.
     * @param Agent $repository
     * @param Running_numbers $running_numbers
     */
    public function __construct(Agent $repository, Running_numbers $running_numbers)
    {
        $this->repository = $repository;
        $this->running_numbers = $running_numbers;
    }


    public function updateMembership(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->territory_id = $request->input('territory_id');
        $data->state_id = $request->input('state_id');

        if($data->save()){
            return $data;
        }
    }
    public function ApproveAgent(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->status = 1;
        $data->paid = 1;

        $model = $this->running_numbers->create([
            'country_id' => 1,
            'user_id' => $data->user_id,
            'agent_levels_id' => $data->agent_levels_id,
        ]);

        $data->member_no = $model->id;


        if($data->save()){
            return $data;
        }
    }

    public function updateNetwork(Request $request, $NewLeaderID)
    {
        $input = $request->all();

        $count = count($input);

        for ($i = 0; $i < $count; $i++) {
            $team [] = $this->repository->findOrFail($input[$i]);
            $team[$i]['leader_id'] = $NewLeaderID;
            $team[$i]->save();
        }
        return $team;
    }
    public function UpgradeDowngradeMembership(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->agent_levels_id = $request->input('agent_levels_id');
        $data->leader_id = $request->input('leader_id');

        if($data->save()){
            return $data;
        }
    }

    public function updateMembershipPoint(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);
        $data->point = $request->input('point');

        if($data->save()){
            return $data;
        }
    }

}
