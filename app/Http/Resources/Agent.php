<?php

namespace App\Http\Resources;

use App\Agent as AgentModel;
use App\User as UserModel;
use App\Agent_levels as Agent_levelsModel;
use App\Territories as TerritoriesModel;
use App\States as StatesModel;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Agent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'point' => $this->point,
            'HQ' => $this->HQ,
            'user_id' => UserModel::where('id', $this->user_id)->first(),
            'agent_levels_id' => Agent_levelsModel::where('id', $this->agent_levels_id)->first(),
//            'leader_id' =>  UserModel::where('id', $this->leader_id)->first(),
            'leader_id' =>  AgentModel::where('user_id', $this->leader_id)->first(),
            'referral_id' =>  UserModel::where('id', $this->referral_id)->first(),
            'territory_id' =>  TerritoriesModel::where('id', $this->territory_id)->first(),
            'state_id' =>  StatesModel::where('id', $this->state_id)->first(),
            'city' => $this->city,
            'district' => $this->district,
            'country' => $this->country,
            'paid' => $this->paid,
            'status' => $this->status,
            'member_no' => $this->member_no,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
