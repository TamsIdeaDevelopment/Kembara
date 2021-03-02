<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 25/12/2020
 * Time: 10:04 PM
 */

namespace App\Http\Controllers\Orders\HQ\Lists;

use App\Agent;
use App\Order;
use Carbon\Carbon;

class ListAdminChart
{
    public function listChart($user_id)
    {
        $user = Agent::where('user_id',$user_id)->first();


        if($user->HQ == 0)
        {
            $week = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
                ->sum('total_paid');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total_paid');

            $month = number_format((float)$month, 2, '.', '');


            $year = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total_paid');

            $year = number_format((float)$year, 2, '.', '');


            $total = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->sum('total_paid');

            $total = number_format((float)$total, 2, '.', '');
        }
        if($user->HQ == 1)
        {
            $week = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
                ->sum('total_paid');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total_paid');

            $month = number_format((float)$month, 2, '.', '');


            $year = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total_paid');

            $year = number_format((float)$year, 2, '.', '');


            $total = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->sum('total_paid');

            $total = number_format((float)$total, 2, '.', '');
        }



        $data = array(
            'week' => $week,
            'month' => $month,
            'year' => $year,
            'total' => $total,
        );

        return $data;

    }
}