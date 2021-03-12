<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User as UserModel;

class HallOfFame extends JsonResource
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
            'total' => number_format((float)$this->total, 2, '.', ''),
            'buyer_id' => UserModel::where('id', $this->buyer_id)->get()->first(),
        ];
    }
}
