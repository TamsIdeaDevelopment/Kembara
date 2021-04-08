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
use Carbon\Carbon;

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

    public function adminlistMasterStokis($user_id,$option)
    {
        if($option == '0') {
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 2)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        }
        else{
            $date = explode("-", $option);
            $year = $date[1];
            $month = $date[0];
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereYear('orders.created_at', $year)
                ->whereMonth('orders.created_at', '=', $month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 2)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);
        }
        return HallOfFameResouces::collection($data);

    }

    public function adminlistStokis($user_id,$option)
    {

        if($option == '0') {
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 3)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        }
        else{
            $date = explode("-", $option);
            $year = $date[1];
            $month = $date[0];
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereYear('orders.created_at', $year)
                ->whereMonth('orders.created_at', '=', $month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 3)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);
        }
        return HallOfFameResouces::collection($data);

    }

    public function adminlistAgent($user_id,$option)
    {
        if($option == '0') {
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 4)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);
        }
        else if($option !== '0'){
            $date = explode("-", $option);
            $year = $date[1];
            $month = $date[0];
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereYear('orders.created_at', $year)
                ->whereMonth('orders.created_at', '=', $month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 4)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);
        }
        return HallOfFameResouces::collection($data);

    }

    public function adminlistMiniAgent($user_id,$option)
    {
        if($option == '0') {
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereMonth('orders.created_at', '=', Carbon::now()->month)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 5)
                ->where('orders.status', '=', 1)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        }
        else if($option !== '0'){

            $date = explode("-", $option);
            $year = $date[1];
            $month = $date[0];
            $data = Order::selectRaw('SUM(total) as total, buyer_id')
                ->join('users', 'users.id', '=', 'orders.buyer_id')
                ->join('agent', 'agent.user_id', '=', 'users.id')
                ->whereYear('orders.created_at', $year)
                ->whereMonth('orders.created_at', '=', $month)
                ->where('orders.status', '=', 1)
                ->where('orders.HQ', '=', 1)
                ->where('orders.buyer_type', '=', null)
                ->where('agent.agent_levels_id', 5)
                ->groupBy('buyer_id')->orderBy('total', 'desc')->get()->take(10);

        }
        return HallOfFameResouces::collection($data);

    }

    public function DropdownDate()
    {
        for ($i = 0; $i <= 12; $i++)
        {
            $months[] = date("m-Y", strtotime( date( 'Y-m-10' )." -$i months"));
        }
        return($months);

//        $start = $month = strtotime(Carbon::now()->subMonths(6));
//        $start = $month = strtotime(Carbon::now()->subMonths(6));
//
////        return Carbon::now()->subMonths(6);
//        return $start;
//
//        $end = strtotime(Carbon::now()->month);
//        while($month < $end)
//        {
//            echo date('F Y', $month), PHP_EOL;
//            $month = strtotime("+1 month", $month);
//        }
//        return $start;
    }
}
