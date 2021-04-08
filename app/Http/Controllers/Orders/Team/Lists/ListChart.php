<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 25/12/2020
 * Time: 9:26 PM
 */

namespace App\Http\Controllers\Orders\Team\Lists;


use App\Agent;
use App\Order;
use Carbon\Carbon;

class ListChart
{
    public function listChart($user_id)
    {
        $user = Agent::where('user_id',$user_id)->first();
//        $week = Order::where('seller_id',$user_id)
//            ->where('buyer_type',null)
//            ->where('HQ',1)
//            ->where('status',1)
//            ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
////                ->sum('total_paid');
//            ->get();
//
//        return $week;
        if($user->HQ == 0)
        {
            $daily = Order::where('buyer_id',$user_id)
                ->where('buyer_type',null)
                ->where('status',1)
                ->where('created_at','>=', Carbon::today()->toDateString())
                ->sum('total');

            $daily = number_format((float)$daily, 2, '.', '');

            $week = Order::where('buyer_id',$user_id)
                ->where('buyer_type',null)
                ->where('status',1)
//                ->whereBetween('created_at', [Carbon::now()->startOfWeek()->format("Y-m-d H:i:s"),Carbon::now()->endOfWeek()->format("Y-m-d H:i:s")])
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->sum('total');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('buyer_id',$user_id)
                ->where('buyer_type',null)
                ->where('status',1)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total');

            $month = number_format((float)$month, 2, '.', '');

            $year = Order::where('buyer_id',$user_id)
                ->where('buyer_type',null)
                ->where('status',1)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total');

            $year = number_format((float)$year, 2, '.', '');

            $total = Order::where('buyer_id',$user_id)
                ->where('buyer_type',null)
                ->where('status',1)
                ->sum('total');

            $total = number_format((float)$total, 2, '.', '');
        }
        if($user->HQ == 1)
        {
            $daily = Order::where('seller_id',$user_id)
                ->where('buyer_type',null)
                ->where('HQ',1)
                ->where('status',1)
                ->where('created_at','>=', Carbon::today()->toDateString())
                ->sum('total');

            $daily = number_format((float)$daily, 2, '.', '');

            $week = Order::where('seller_id',$user_id)
                ->where('buyer_type',null)
                ->where('HQ',1)
                ->where('status',1)
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->sum('total');

            $week = number_format((float)$week, 2, '.', '');

            $month = Order::where('seller_id',$user_id)
                ->where('buyer_type',null)
                ->where('HQ',1)
                ->where('status',1)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->sum('total');

            $month = number_format((float)$month, 2, '.', '');

            $year = Order::where('seller_id',$user_id)
                ->where('buyer_type',null)
                ->where('HQ',1)
                ->where('status',1)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->sum('total');

            $year = number_format((float)$year, 2, '.', '');

            $total = Order::where('seller_id',$user_id)
                ->where('buyer_type',null)
                ->where('HQ',1)
                ->where('status',1)
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
