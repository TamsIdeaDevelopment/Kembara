<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 06/03/2021
 * Time: 7:48 PM
 */

namespace App\Http\Controllers\Orders\HQ\Lists;


use App\Agent;
use App\Order;
use App\Order_items;
Use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\OrderItems as OrderItemsResources;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class FilterOrder
{
    /** @var  Order */
    private $repository;

    /** @var  Order_items */
    private $order_items;

    /**
     * ListOrder constructor.
     * @param Order $repository
     * @param Order_items $order_items
     */
    public function __construct(Order $repository, Order_items $order_items)
    {
        $this->repository = $repository;
        $this->order_items = $order_items;
    }

    public function adminFilter($status,$HQ,$customer)
    {
        // if($customer === 'Customer')
        // {
        //     $data = $this->repository->where('status', $status)
        //         ->where('HQ', $HQ)
        //         ->where('buyer_type', $customer)
        //         ->latest()->get();
        // }
        // else
        // {
        //     $data = $this->repository->where('status', $status)
        //         ->where('HQ', $HQ)
        //         ->where('buyer_type', null)
        //         ->latest()->get();
        // }
        // return OrdersResources::collection($data);

        if($customer === 'Customer')
        {
            $order = DB::select(
                DB::raw("SELECT a.*, a.paid, a.id, b.avatar, a.HQ, DATE(a.created_at) as order_date, a.status, b.name as buyer_name FROM orders as a, users as b
                                    WHERE a.buyer_id=b.id
                                    AND a.status = :status
                                    AND a.buyer_type= :customer 
                                    AND a.HQ = :HQ
                                    AND YEAR(a.created_at) = :year
                                    AND MONTH(a.created_at) = :month
                                    ORDER BY a.id DESC"),
                array(
                    'status' => $status,
                    'customer' => $customer,
                    'HQ' => $HQ,
                    'month' => Carbon::now()->month,
                    'year' => Carbon::now()->year,
                )
            );
        }
        else
        {
            if($HQ == 1){
                $order = DB::select(
                    DB::raw("SELECT a.*, a.paid, a.id, b.avatar, a.HQ, DATE(a.created_at) as order_date, a.status, b.name as buyer_name FROM orders as a, users as b
                                        WHERE a.buyer_id=b.id
                                        AND a.status = :status
                                        AND a.buyer_type is null
                                        AND a.HQ = :HQ
                                        AND YEAR(a.created_at) = :year
                                        AND MONTH(a.created_at) = :month
                                        ORDER BY a.id DESC"),
                    array(
                        'status' => $status,
                        'HQ' => $HQ,
                        'month' => Carbon::now()->month,
                        'year' => Carbon::now()->year,
                    )
                );
            }
            if($HQ == 0){
                $order = DB::select(
                    DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, c.avatar as buyer_avatar, b.name as seller_name, a.total, DATE(a.created_at) as order_date, a.status, c.name as buyer_name FROM orders as a, users as b, users as c
                                        WHERE a.seller_id=b.id
                                        AND a.buyer_id = c.id
                                        AND a.status = :status
                                        AND a.buyer_type is null
                                        AND a.HQ = :HQ
                                        AND YEAR(a.created_at) = :year
                                        AND MONTH(a.created_at) = :month
                                        ORDER BY a.id DESC"),
                    array(
                        'status' => $status,
                        'HQ' => $HQ,
                        'month' => Carbon::now()->month,
                        'year' => Carbon::now()->year,
                    )
                );
            }

        }
        return $order;
    }

    public function ListChartOrderHQ($option,$seller_id)
    {

        $user = Agent::where('user_id',$seller_id)->first();
        if($user->HQ == 0)
        {
            if($option === 'Daily'){
                $data = Order::where('buyer_id',$seller_id)
                    ->where('status',1)
                    ->where('buyer_type',null)
                    ->where('created_at','>=', Carbon::today()->toDateString())
                    ->latest()->get();
            }
            if($option === 'Week'){
                $data = Order::where('buyer_id',$seller_id)
                    ->where('status',1)
                    ->where('buyer_type',null)
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->latest()->get();

            }
            if($option === 'Month'){
                $data = Order::where('buyer_id',$seller_id)
                    ->where('status',1)
                    ->where('buyer_type',null)
                    ->whereMonth('created_at', '=', Carbon::now()->month)
                    ->whereYear('created_at', '=', Carbon::now()->year)
                    ->latest()->get();

            }
            if($option === 'Year'){
                $data = Order::where('buyer_id',$seller_id)
                    ->where('status',1)
                    ->where('buyer_type',null)
                    ->whereYear('created_at', '=', Carbon::now()->year)
                    ->latest()->get();
            }
            if($option === 'Total'){
                $data = Order::where('buyer_id',$seller_id)
                    ->where('status',1)
                    ->where('buyer_type',null)
                    ->latest()->get();
            }
        }
        if($user->HQ == 1)
        {
            if($option === 'Daily'){
                $data = Order::where('seller_id',$seller_id)
                    ->where('status',1)
                    ->where('created_at','>=', Carbon::today()->toDateString())
                    ->latest()->get();
            }
            if($option === 'Week'){
                $data = Order::where('seller_id',$seller_id)
                    ->where('status',1)
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->latest()->get();

            }
            if($option === 'Month'){
                $data = Order::where('seller_id',$seller_id)
                    ->where('status',1)
                    ->whereMonth('created_at', '=', Carbon::now()->month)
                    ->whereYear('created_at', '=', Carbon::now()->year)
                    ->latest()->get();

            }
            if($option === 'Year'){
                $data = Order::where('seller_id',$seller_id)
                    ->where('status',1)
                    ->whereYear('created_at', '=', Carbon::now()->year)
                    ->latest()->get();
            }
            if($option === 'Total'){
                $data = Order::where('seller_id',$seller_id)
                    ->where('status',1)
                    ->latest()->get();
            }
        }

        return OrdersResources::collection($data);
    }
    public function SearchChartOrderHQ($startdate,$enddate,$seller_id)
    {
        $user = Agent::where('user_id',$seller_id)->first();
        if($user->HQ == 0)
        {
            $data = Order::where('buyer_id',$seller_id)
                ->where('buyer_type',null)
                ->whereDate('created_at','>=', $startdate)
                ->whereDate('created_at','<=', $enddate)
                ->where('status',1)
                ->latest()
                ->get();
        }
        if($user->HQ == 1)
        {
            $data = Order::where('seller_id',$seller_id)
                ->where('buyer_type',null)
                ->whereDate('created_at','>=', $startdate)
                ->whereDate('created_at','<=', $enddate)
                ->where('status',1)
                ->latest()
                ->get();
        }

        return OrdersResources::collection($data);
    }
    public function SearchTotalChartOrderHQ($startdate,$enddate,$seller_id)
    {
        $user = Agent::where('user_id',$seller_id)->first();
        if($user->HQ == 0)
        {
            $data = Order::where('status',1)
                ->where('buyer_id',$seller_id)
                ->where('buyer_type',null)
                ->whereDate('created_at','>=', $startdate)
                ->whereDate('created_at','<=', $enddate)
                ->sum('total');
        }
        if($user->HQ == 1)
        {
            $data = Order::where('status',1)
                ->where('seller_id',$seller_id)
                ->where('buyer_type',null)
                ->whereDate('created_at','>=', $startdate)
                ->whereDate('created_at','<=', $enddate)
                ->sum('total');
        }


        $data = number_format((float)$data, 2, '.', '');
        return $data;
    }

}