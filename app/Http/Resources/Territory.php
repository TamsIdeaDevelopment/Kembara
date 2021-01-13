<?php

namespace App\Http\Resources;

use App\States as StatesModel;
use App\States;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Territory extends JsonResource
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
            'description' =>  $this->description,
            'quota' => $this->quota,
            'state' => StatesModel::where('id', $this->state)->first(),
            //'state' => new States(StatesModel::find($this->state)),
            'total' => $this->total,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
