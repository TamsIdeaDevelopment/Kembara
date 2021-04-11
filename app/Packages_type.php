<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages_type extends Model
{
    protected $table='packages_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'name', 'description', 'retail_price','ss_retail_price','featured_image'
    ];
}
