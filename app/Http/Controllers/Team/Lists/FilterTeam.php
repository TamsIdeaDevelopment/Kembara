<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 06/03/2021
 * Time: 7:48 PM
 */

namespace App\Http\Controllers\Team\Lists;


use App\Agent;
use App\Agent_levels;
use App\Http\Resources\Agent as AgentResources;


class FilterTeam
{
    /** @var  Agent */
    private $repository;

    /** @var  Agent_levels */
    private $agent_levels;

    /**
     * ListTeam constructor.
     * @param Agent $repository
     * @param Agent_levels $agent_levels
     */
    public function __construct(Agent $repository, Agent_levels $agent_levels)
    {
        $this->repository = $repository;
        $this->agent_levels = $agent_levels;
    }

    public function adminFilter($status)
    {
        if( $status == '3')
        {
            $data = $this->repository->where([
                ['HQ', '=', '0'],
                ['status', '!=', '0']])->latest()->get();
        }
        else{
            $data = $this->repository->where([
                ['HQ', '=', '0'],
                ['status', '=', $status]])->latest()->get();
        }

        return AgentResources::collection($data);
    }

    public function agentFilter($id, $status)
    {
        if( $status == '3')
        {
            $data = $this->repository->where([
//                ['HQ', '=', '0'],
                ['leader_id', '=', $id],
                ['status', '!=', '2']])->latest()->get();
        }
        else{
            $data = $this->repository->where([
//                ['HQ', '=', '0'],
                ['leader_id', '=', $id],
                ['status', '=', $status]])->latest()->get();
        }

        return AgentResources::collection($data);
    }
}
