<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Roles_price extends Model
{
//    use SoftDeletes;
    protected $table='roles_price';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'status', 'agent_levels_id', 'price','ss_price','minimum_order','quantity', 'postage', 'postage_west_my', 'starter', 'remarks'
    ];
}
