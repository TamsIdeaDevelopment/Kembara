<?php

/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 16/10/2020
 * Time: 5:30 PM
 */

namespace App\Http\Controllers\Orders\HQ\Lists;


use App\Agent;
use App\Order;
use App\Order_items;
use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\OrderItems as OrderItemsResources;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ListOrder
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


    public function list()
    {
        $order = DB::select(
            DB::raw("SELECT a.*, a.paid, a.id, b.avatar, a.HQ, a.created_at, a.status, b.name as buyer_name FROM orders as a, users as b 
                                WHERE a.buyer_id=b.id 
                                AND YEAR(a.created_at) = :year
                                AND MONTH(a.created_at) = :month
                                AND a.HQ = 1"),
            array(
                'month' => Carbon::now()->month,
                'year' => Carbon::now()->year,
            )
        );

        return $order;
    }

    public function AgentListOrder($id)
    {
        $data = $this->repository->where([
            ['HQ', '=', '1'],
            ['buyer_id', '=', $id]
        ])->latest()->get();

        return OrdersResources::collection($data);
    }

    public function OrderDetails($orderID)
    {
        $data = $this->repository->findOrFail($orderID);

        return new OrdersResources($data);
    }
    public function OrderItems($orderID)
    {
        $data = $this->order_items->where('order_id', $orderID)->get();

        return OrderItemsResources::collection($data);
    }

    public function checkLastOrder()
    {
        $order = Order::where('paid', 0)
            ->where('created_at', '<=', now()->subMinutes(30)->toDateTimeString())
            ->get();

        return $order;
        //        $agent = Agent::where('HQ',0)->get();
        //        $listInActiveAgent = [];
        //
        //        foreach($agent as $key)
        //        {
        //            $data = Order::
        //                where('status', 1)
        //                ->where('buyer_id',$key['user_id'])
        //                ->where('created_at', '<=', now()->subMonth(3))->latest()->first();
        //
        //            if($data)
        //            {
        //                array_push($listInActiveAgent,$data['buyer_id']);
        //
        //            }
        //        }
        //
        //        foreach($listInActiveAgent as $inActiveAgent)
        //        {
        //            $user = User::findOrFail($inActiveAgent);
        //
        //            echo $user->email;
        //        }
        //        return $agent;
        //
        //        $data = $this->repository->where('status', 1)
        //            ->where('created_at', '<=', now()->subMonth(3))->latest()->get();
        //        return $data;
    }

    public function searchCustomerOrder($start_date, $end_date)
    {

        $order = DB::select(
            DB::raw("SELECT a.*, a.paid, a.id, b.avatar, a.HQ, a.created_at, a.status, b.name as buyer_name FROM orders as a, users as b 
                                WHERE a.buyer_id=b.id 
                                AND DATE(a.created_at) >= :start_date
                                AND DATE(a.created_at) <= :end_date
                                AND a.HQ = 1"),
            array(
                'start_date' => $start_date,
                'end_date' => $end_date,
            )
        );

        return $order;

    }

}