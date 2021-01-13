<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;
use App\Order as OrderModel;
use App\Product as ProductModel;

class OrderItems extends JsonResource
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
            'order_id' => OrderModel::where('id',$this->order_id)->first(),
            'product_id' => ProductModel::where('id',$this->product_id)->first(),
            'price' =>  $this->price,
            'quantity' =>  $this->quantity,
            'total' =>  $this->total,
            'name' =>  $this->name,
            'weight' =>  $this->weight,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
