<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    protected $table='orders';


    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'point', 'HQ','seller_id', 'buyer_id', 'buyer_type', 'status', 'paid', 'payment_methods', 'billcode','ref_no','total_paid','paid_at','total', 'deliver_to','deliver_to_phone_no', 'shipping_address', 'city', 'state', 'country','postcode', 'tracking_no', 'deleted_at','remarks',
    ];
}
