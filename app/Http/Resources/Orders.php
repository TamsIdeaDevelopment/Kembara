<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\User as UserModel;

class Orders extends JsonResource
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
            'buyer_id' => UserModel::where('id', $this->buyer_id)->first(),
            'seller_id' => UserModel::where('id', $this->seller_id)->first(),
            'buyer_type' =>  $this->buyer_type,
            'delivery_type' =>  $this->delivery_type,
            'delivery_fees' =>  $this->delivery_fees,
            'status' =>  $this->status,
            'paid' =>  $this->paid,
            'payment_methods' =>  $this->payment_methods,
            'billcode' =>  $this->billcode,
            'ref_no' =>  $this->ref_no,
            'total_paid' =>  $this->total_paid,
            'paid_at' =>  $this->paid_at,
            'total' =>  $this->total,
            'deliver_to' =>  $this->deliver_to,
            'deliver_to_phone_no' =>  $this->deliver_to_phone_no,
            'shipping_address' =>  $this->shipping_address,
            'city' =>  $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'postcode' => $this->postcode,
            'delivery_status' => $this->delivery_status,
            'tracking_no' => $this->tracking_no,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
