<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Product as ProductModel;
use App\User as UserModel;

class StockAgent extends JsonResource
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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'ss_price' => $this->ss_price,
            'minimum_order' => $this->minimum_order,
        ];
    }
}
