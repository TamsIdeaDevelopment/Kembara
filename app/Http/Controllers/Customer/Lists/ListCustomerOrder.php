<?php

/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 04/02/2021
 * Time: 12:17 PM
 */

namespace App\Http\Controllers\Customer\Lists;

use App\Order;
use App\Http\Resources\Orders as OrdersResources;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ListCustomerOrder
{
    /** @var  Order */
    private $repository;

    /**
     * ListOrder constructor.
     * @param Order $repository
     */
    public function __construct(Order $repository)
    {
        $this->repository = $repository;
    }

    public function agentListCustomerOrder($user_id)
    {
        // $data = $this->repository->where([
        //     ['buyer_id', '=', $user_id],['seller_id', '=', $user_id],['buyer_type', '=', 'Customer']])->latest()->get();

        // return OrdersResources::collection($data);
        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.name as buyer_name, a.buyer_type, a.deliver_to, a.total, a.created_at, a.status FROM orders as a, users as b
                            WHERE a.buyer_id=b.id
                            AND a.seller_id = :seller_id
                            AND a.buyer_id = :buyer_id
                            AND a.buyer_type='Customer'
                            AND YEAR(a.created_at) = :year
                            AND MONTH(a.created_at) = :month"),
            array(
                'seller_id' => $user_id,
                'buyer_id' => $user_id,
                'month' => Carbon::now()->month,
                'year' => Carbon::now()->year,
            )
        );

        return $order;
    }

    public function agentListCustomerOrderTeam($user_id)
    {
        // $data = $this->repository->where([
        //     ['buyer_id', '=', $user_id],['seller_id', '=', $user_id],['buyer_type', '=', 'Customer']])->latest()->get();

        // return OrdersResources::collection($data);
        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.name as buyer_name, a.buyer_type, a.deliver_to, a.total, a.created_at, a.status FROM orders as a, users as b
                            WHERE a.buyer_id=b.id
                            AND a.seller_id = :seller_id
                            AND a.buyer_id = :buyer_id
                            AND a.buyer_type='Customer'
                            ORDER BY a.created_at DESC"),
            array(
                'seller_id' => $user_id,
                'buyer_id' => $user_id,
            )
        );

        return $order;
    }

    public function searchCustomerOrder($start_date, $end_date, $user_id)
    {

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.name as buyer_name, a.buyer_type, a.deliver_to, a.total, a.created_at, a.status FROM orders as a, users as b
                                WHERE a.buyer_id=b.id
                                AND a.seller_id = :seller_id
                                AND a.buyer_id = :buyer_id
                                AND a.buyer_type='Customer'
                                AND DATE(a.created_at) >= :start_date
                                AND DATE(a.created_at) <= :end_date"),
            array(
                'seller_id' => $user_id,
                'buyer_id' => $user_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
            )
        );

        return $order;
    }
}
