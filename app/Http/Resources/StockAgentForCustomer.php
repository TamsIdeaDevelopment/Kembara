<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Product as ProductModel;
use App\User as UserModel;

class StockAgentForCustomer extends JsonResource
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
            'product_id' => ProductModel::findOrFail($this->product_id),
            'stock' => $this->stock,
            'price' => $this->price,
            'minimum_order' => $this->minimum_order,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'item_id' => $this->item_id,

//            'ss_price' => $this->ss_price,
//            'sg_brn_price' => $this->sg_brn_price,

        ];
    }
}
