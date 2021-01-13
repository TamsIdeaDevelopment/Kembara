<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Agent extends Model
{
    use SoftDeletes;
    protected $table='agent';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'point', 'user_id', 'agent_levels_id', 'leader_id', 'referral_id', 'territory_id','state_id', 'member_no', 'city', 'district', 'country','paid', 'status', 'deleted_at','remarks','HQ'
    ];
}
