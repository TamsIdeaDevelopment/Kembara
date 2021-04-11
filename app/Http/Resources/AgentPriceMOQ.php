<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Agent_levels as Agent_levelsModel;
use App\Product as ProductModel;


class AgentPriceMOQ extends JsonResource
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
//            'product_id' => $this->product_id,
            'product_id' => ProductModel::where('id',$this->product_id)->first(),
            'status' => $this->status,
            'agent_levels_id' => Agent_levelsModel::where('id', $this->agent_levels_id)->first(['name','id']),
            'price' => $this->price,
            'ss_price' => $this->ss_price,
            'minimum_order' => $this->minimum_order,
            'quantity' => $this->quantity,
            'postage' => $this->postage,
            'postage_west_my' => $this->postage_west_my,
            'starter' => $this->starter,
            'remarks' => $this->remarks,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
