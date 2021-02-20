<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table='cart_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rowId', 'product_id','seller_id', 'HQ', 'quantity', 'status',
    ];
}
