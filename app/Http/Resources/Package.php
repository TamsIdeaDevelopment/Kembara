<?php

namespace App\Http\Resources;

use App\Packages_type as PackagesTypeModel;
use App\Product as ProductModel;
use Illuminate\Http\Resources\Json\JsonResource;

class Package extends JsonResource
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
//            'packages_type_id' => PackagesTypeModel::where('id', $this->packages_type_id)->first(['id','name']),
            'packages_type_id' => $this->packages_type_id,
            'product_id' => ProductModel::where('id', $this->product_id)->first(['id','name','featured_image','weight']),
            'retail_price' =>  $this->retail_price,
            'ss_retail_price' => $this->ss_retail_price,
            'qty' =>  $this->qty,
        ];
    }
}
