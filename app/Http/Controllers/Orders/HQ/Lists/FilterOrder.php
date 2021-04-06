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
        if($customer === 'Customer')
        {
            $data = $this->repository->where('status', $status)
                ->where('HQ', $HQ)
                ->where('buyer_type', $customer)
                ->latest()->get();
        }
        else
        {
            $data = $this->repository->where('status', $status)
                ->where('HQ', $HQ)
                ->where('buyer_type', null)
                ->latest()->get();
        }
        return OrdersResources::collection($data);
    }

    public function ListChartOrderHQ($option,$seller_id)
    {
        if($option === 'Daily'){
            $data = Order::where('seller_id',$seller_id)
                ->where('paid',1)
                ->where('created_at','>=', Carbon::today()->toDateString())
                ->latest()->get();
        }
        if($option === 'Week'){
            $data = Order::where('seller_id',$seller_id)
                ->where('paid',1)
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->latest()->get();

        }
        if($option === 'Month'){
            $data = Order::where('seller_id',$seller_id)
                ->where('paid',1)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->latest()->get();

        }
        if($option === 'Year'){
            $data = Order::where('seller_id',$seller_id)
                ->where('paid',1)
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->latest()->get();
        }
        return OrdersResources::collection($data);
//        if($customer === 'Customer')
//        {
//            $data = $this->repository->where('status', $status)
//                ->where('HQ', $HQ)
//                ->where('buyer_type', $customer)
//                ->latest()->get();
//        }
//        else
//        {
//            $data = $this->repository->where('status', $status)
//                ->where('HQ', $HQ)
//                ->where('buyer_type', null)
//                ->latest()->get();
//        }
//        return OrdersResources::collection($data);
    }

}
