<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 21/10/2020
 * Time: 3:50 PM
 */

namespace App\Http\Controllers;


use App\Agent_levels;
use App\Http\Controllers\Team\Lists\ListTeam;

use App\Agent;
use App\Http\Resources\Agent as AgentResources;
use App\User;

class CreateInvite
{
    /** @var  Agent */
    private $agent;

    /** @var  User */
    private $user;

    /** @var  Agent_levels */
    private $agent_levels;

    /**
     * CreateInvite constructor.
     * @param Agent $agent
     * @param User $user
     * @param Agent_levels $agent_levels
     */
    public function __construct(Agent $agent, User $user, Agent_levels $agent_levels)
    {
        $this->agent = $agent;
        $this->user = $user;
        $this->agent_levels = $agent_levels;
    }


    public function index($leader_id)
    {
        $member_no = ltrim($leader_id, "0");

        $leader = $this->agent->where('member_no',$member_no)->first();

        if(!$leader)
        {
            return redirect('/register');
        }

        $user = $this->user->findOrFail($leader->user_id);



        $agent_levels = $this->agent_levels->findOrFail($leader->agent_levels_id);

        $list_levels = $this->agent_levels->whereNotNull('parent')->get();



//        $leader = $this->agent->findOrFail($leader_id);
//
//        $user = $this->user->findOrFail($leader->user_id);
//
//        $agent_levels = $this->agent_levels->findOrFail($leader->agent_levels_id);
//
//        $list_levels = $this->agent_levels->whereNotNull('parent')->get();

//        return $user;
//
//        $data = json_encode(new AgentResources($leader));
//        $data1 = new AgentResources($leader);
//
//        return $data1->user_id['name'];
////return $data1->user_id;
////return $data['user_id'][0]->id;
//
return view('pages.User.Invite.index')->with(['leader'=>$leader, 'user'=> $user , 'agent_levels'=>$agent_levels, 'list_levels'=>$list_levels]);
//return view('pages.User.Invite.index', $data);

        //return view('pages.User.Invite.index', new AgentResources($leader));
    }
}