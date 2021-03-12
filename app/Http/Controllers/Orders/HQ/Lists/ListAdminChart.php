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
            $daily = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->where('created_at','>=', Carbon::today()->toDateString())
                ->sum('total');

            $daily = number_format((float)$daily, 2, '.', '');

            $week = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
//                ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->sum('total');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total');

            $month = number_format((float)$month, 2, '.', '');


            $year = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total');

            $year = number_format((float)$year, 2, '.', '');


            $total = Order::where('seller_id',$user_id)
                ->where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->sum('total');

            $total = number_format((float)$total, 2, '.', '');
        }

        if($user->HQ == 1)
        {
            $daily = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->where('created_at','>=', Carbon::today()->toDateString())
                ->sum('total');

            $daily = number_format((float)$daily, 2, '.', '');

            $week = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
                ->sum('total');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total');

            $month = number_format((float)$month, 2, '.', '');


            $year = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total');

            $year = number_format((float)$year, 2, '.', '');


            $total = Order::where('status',1)
                ->where('HQ',0)
                ->where('buyer_type',null)
                ->sum('total');

            $total = number_format((float)$total, 2, '.', '');
        }



        $data = array(
            'daily' => $daily,
            'week' => $week,
            'month' => $month,
            'year' => $year,
            'total' => $total,
        );

        return $data;

    }
}
