<?php


namespace App\Http\Controllers\Customer\Lists;


use App\Agent;
use App\Order;
use Carbon\Carbon;

class ListCustomerChart
{
    public function listChart($user_id)
    {
        $user = Agent::where('user_id',$user_id)->first();

        $daily = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->where('HQ',0)
            ->where('buyer_type','Customer')
            ->where('created_at','>=', Carbon::today()->toDateString())
            ->sum('total');

        $daily = number_format((float)$daily, 2, '.', '');

        $week = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->where('HQ',0)
            ->where('buyer_type','Customer')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('total');

        $week = number_format((float)$week, 2, '.', '');

        $month = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->where('HQ',0)
            ->where('buyer_type','Customer')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->sum('total');

        $month = number_format((float)$month, 2, '.', '');


        $year = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->where('HQ',0)
            ->where('buyer_type','Customer')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('total');

        $year = number_format((float)$year, 2, '.', '');


        $total = Order::where('seller_id',$user_id)
            ->where('status',1)
            ->where('HQ',0)
            ->where('buyer_type','Customer')
            ->sum('total');

        $total = number_format((float)$total, 2, '.', '');

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
