<?php


namespace App\Http\Controllers\Orders\Team\Lists;


use App\Order;
use App\Order_items;
use App\Http\Resources\HallOfFame as HallOfFameResources;
use Carbon\Carbon;

class ListHallOfFameRestock
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

    public function HallOfFameRestock($user_id,$leader_id,$agent_levels_id)
    {
        $data = Order::selectRaw('SUM(total) as total, buyer_id')
            ->join('users', 'users.id', '=', 'orders.buyer_id')
            ->join('agent', 'agent.user_id', '=', 'users.id')
//            ->whereYear('orders.created_at', $year)
            ->whereMonth('orders.created_at', '=', Carbon::now()->month)
            ->where('orders.status', '=', 1)
//            ->where('orders.HQ', '=', 0)
            ->where('orders.seller_id', '=', $leader_id)
            ->where('orders.buyer_type', '=', null)
            ->where('agent.leader_id', '=', $leader_id)
            ->where('agent.agent_levels_id', '=', $agent_levels_id)
            ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        return HallOfFameResources::collection($data);
    }
}
