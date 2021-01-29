<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 25/12/2020
 * Time: 9:26 PM
 */

namespace App\Http\Controllers\Orders\Team\Lists;


use App\Order;
use Carbon\Carbon;

class ListChart
{
    public function listChart($user_id)
    {
        $week = Order::where('seller_id',$user_id)
            ->where('HQ',0)
            ->where('status',1)
            ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
            ->sum('total_paid');

        $month = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->sum('total_paid');


        $year = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('total_paid');

        $total = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->sum('total_paid');

        $data = array(
            'week' => $week,
            'month' => $month,
            'year' => $year,
            'total' => $total,
        );

        return $data;

    }
}