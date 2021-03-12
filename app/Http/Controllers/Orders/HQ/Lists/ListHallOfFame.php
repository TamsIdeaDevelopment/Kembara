<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 06/03/2021
 * Time: 3:20 PM
 */

namespace App\Http\Controllers\Orders\HQ\Lists;

use App\Order;
use App\Order_items;
Use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\HallOfFame as HallOfFameResouces;
class ListHallOfFame
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

    public function adminlistMasterStokis($user_id)
    {

        $data = Order::selectRaw('SUM(total) as total, buyer_id')
            ->join('users', 'users.id', '=', 'orders.buyer_id')
            ->join('agent', 'agent.user_id', '=', 'users.id')
//            ->whereYear('orders.created_at', $year)
//            ->whereMonth('orders.created_at', '=', $month)
            ->where('orders.status', '=', 1)
            ->where('orders.HQ', '=', 1)
            ->where('orders.buyer_type', '=', null)
            ->where('agent.agent_levels_id', 2)
            ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        return HallOfFameResouces::collection($data);
    }

    public function adminlistStokis($user_id)
    {

        $data = Order::selectRaw('SUM(total) as total, buyer_id')
            ->join('users', 'users.id', '=', 'orders.buyer_id')
            ->join('agent', 'agent.user_id', '=', 'users.id')
            ->where('orders.status', '=', 1)
            ->where('orders.HQ', '=', 1)
            ->where('orders.buyer_type', '=', null)
            ->where('agent.agent_levels_id', 3)
            ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        return HallOfFameResouces::collection($data);
    }

    public function adminlistAgent($user_id)
    {

        $data = Order::selectRaw('SUM(total) as total, buyer_id')
            ->join('users', 'users.id', '=', 'orders.buyer_id')
            ->join('agent', 'agent.user_id', '=', 'users.id')
            ->where('orders.status', '=', 1)
            ->where('orders.HQ', '=', 1)
            ->where('orders.buyer_type', '=', null)
            ->where('agent.agent_levels_id', 4)
            ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        return HallOfFameResouces::collection($data);
    }

    public function adminlistMiniAgent($user_id)
    {

        $data = Order::selectRaw('SUM(total) as total, buyer_id')
            ->join('users', 'users.id', '=', 'orders.buyer_id')
            ->join('agent', 'agent.user_id', '=', 'users.id')
            ->where('orders.status', '=', 1)
            ->where('orders.HQ', '=', 1)
            ->where('orders.buyer_type', '=', null)
            ->where('agent.agent_levels_id', 5)
            ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        return HallOfFameResouces::collection($data);
    }
}
