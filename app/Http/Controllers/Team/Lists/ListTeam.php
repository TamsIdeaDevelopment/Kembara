<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 15/10/2020
 * Time: 5:29 PM
 */

namespace App\Http\Controllers\Team\Lists;

use App\Agent;
use App\Agent_levels;
use App\Http\Resources\Agent as AgentResources;

class ListTeam
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


    public function list()
    {
        $data = $this->repository->where([
            ['HQ', '=', '0'],
            ['status', '=', '1']])->latest()->get();

        return AgentResources::collection($data);
    }

    public function listHQ()
    {
        $data = $this->repository->where([
            ['HQ', '=', '1'],
            ['status', '=', '1']])->latest()->get();

        return AgentResources::collection($data);
    }

    public function agentProfile($id)
    {
        $data = $this->repository->findOrFail($id);

        return new AgentResources($data);
    }
    public function agentDetails($id)
    {
        $data = $this->repository->where('user_id',$id)->first();

        return response()->json($data);
    }
    public function agentInformation($id)
    {
        $data = $this->repository->where('user_id',$id)->first();

        return new AgentResources($data);
    }
    public function TeamMember($id)
    {
        $data = $this->repository->where([['leader_id',$id]])->latest()->get();

        return AgentResources::collection($data);
    }

    public function SearchTeam($territory_id,$agent_level_id)
    {
        $level= $this->agent_levels->findOrFail($agent_level_id);

        //$agent_leader_level = $this->agent_levels->where('name', $level->parent)->first();

        $data = $this->repository->whereNotNull('member_no')->where([['territory_id',$territory_id],['agent_levels_id','<', $level->id ]])->latest()->get();



        return AgentResources::collection($data);

//        $level= $this->agent_levels->findOrFail($agent_level_id);
//
//        $agent_leader_level = $this->agent_levels->where('name', $level->parent)->first();
//
//        if(!$agent_leader_level->parent)
//        {
//            $data = $this->repository->where('HQ',1)->latest()->get();
//        }
//        else
//        {
//            $data = $this->repository->whereNotNull('member_no')->where([['territory_id',$territory_id],['agent_levels_id',$agent_leader_level->id]])->latest()->get();
//        }
//
//
//        return AgentResources::collection($data);
    }

    public function TeamMemberUnderLevelOnly($id)
    {
//        $leader_level = $this->repository->where('user_id',$id)->first();
//
//        $parent_name = $this->agent_levels->where('id', $leader_level->agent_levels_id)->first();
//
//        $agent_leader_level = $this->agent_levels->where('parent', $parent_name->name)->first();

//        return $agent_leader_level;

        $data = $this->repository->where('leader_id',$id)->OrderBy('agent_levels_id')->get();
//        $data = $this->repository->whereNotNull('member_no')->where([['leader_id',$id],['agent_levels_id',$agent_leader_level->id]])->OrderBy('agent_levels_id')->get();

        return AgentResources::collection($data);
    }

    public function listNewLeader($levelID)
    {
        $data = $this->repository->where([
            ['agent_levels_id', '=', $levelID],
            ['status', '=', '1']])->latest()->get();

        return AgentResources::collection($data);
    }
    public function listNewLeaderBasedOnParent($id)
    {
        $parent_name = $this->agent_levels->findOrFail($id);

        $agent_level = $this->agent_levels->where('name', $parent_name->parent)->first();

        $data = $this->repository->where([
            ['agent_levels_id', '=', $agent_level->id],
            ['status', '=', '1']])->latest()->get();

        return AgentResources::collection($data);
    }
}