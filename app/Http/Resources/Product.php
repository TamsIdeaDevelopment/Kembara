<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Product_type as ProductTypeModel;

class Product extends JsonResource
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
            'product_type_id' => ProductTypeModel::where('id', $this->product_type_id)->first(['id','name']),
            'product_set' => $this->product_set,
            'status' => $this->status,
            'name' => $this->name,
            'description' =>  $this->description,
            'retail_price' =>  $this->retail_price,
            'featured_image' =>  $this->featured_image,
            'images' =>  $this->images,
            'weight' =>  $this->weight,
            'stock' => $this->stock,
            'shipping_west_my' => $this->shipping_west_my,
            'shipping_east_my' => $this->shipping_east_my,
            'shipping_bn' => $this->shipping_bn,
            'shipping_sg' => $this->shipping_sg,
            'score' => $this->score,
            'remarks' => $this->remarks,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
