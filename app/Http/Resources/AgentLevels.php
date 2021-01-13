<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Agent_levels as Agent_levelsModel;

class AgentLevels extends JsonResource
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
            'name' => $this->name,
            'priority' => $this->priority,
            'description' => $this->description,
            'parent' => $this->parent,
            //'parent_id' => new AgentLevels(Agent_levelsModel::find($this->parent_id)),
//            'parent' => Agent_levelsModel::select('name')->where('id', $this->parent_id)->get(),
            'label' => $this->label,
            'remarks' => $this->remarks,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
