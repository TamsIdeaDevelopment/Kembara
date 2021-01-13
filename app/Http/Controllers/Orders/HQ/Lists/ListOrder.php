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
Use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\OrderItems as OrderItemsResources;
use App\User;
use Carbon\Carbon;

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
        $data = $this->repository->where('HQ', 1)->latest()->get();

        return OrdersResources::collection($data);
    }

    public function AgentListOrder($id)
    {
        $data = $this->repository->where([
            ['HQ', '=', '1'],
            ['buyer_id', '=', $id]])->latest()->get();

        return OrdersResources::collection($data);
    }

    public function OrderDetails($orderID)
    {
        $data = $this->repository->findOrFail($orderID);

        return new OrdersResources($data);
    }
    public function OrderItems($orderID)
    {
        $data = $this->order_items->where('order_id',$orderID)->get();

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

}