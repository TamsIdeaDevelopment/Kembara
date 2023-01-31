<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 17/10/2020
 * Time: 2:22 AM
 */

namespace App\Http\Controllers\Orders\Team\Lists;

use App\Order;
Use App\Http\Resources\Orders as OrdersResources;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ListOrder
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

    public function list()
    {
        // $data = $this->repository->where('HQ', 0)->where('buyer_type','=',null)->latest()->get();

        // return OrdersResources::collection($data);

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, c.avatar as buyer_avatar, b.name as seller_name, a.total, a.created_at, a.status, c.name as buyer_name FROM orders as a, users as b, users as c 
                                WHERE a.seller_id=b.id 
                                AND a.buyer_id = c.id
                                AND a.HQ = 0
                                AND a.buyer_type IS NULL
                                AND YEAR(a.created_at) = :year
                                AND MONTH(a.created_at) = :month"),
            array(
                'month' => Carbon::now()->month,
                'year' => Carbon::now()->year,
            )
        );

        return $order;
    }

    public function AgentListOrder($id)
    {
        // $data = $this->repository->where([
        //     ['seller_id', '=', $id],['buyer_type', '=', null]])->latest()->get();

        // return OrdersResources::collection($data);

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, b.name as seller_name, a.total, a.created_at, a.status FROM orders as a, users as b 
                                WHERE a.seller_id=b.id 
                                AND a.seller_id= :seller_id
                                AND a.buyer_type is null
                                AND YEAR(a.created_at) = :year
                                AND MONTH(a.created_at) = :month"),
            array(
                'seller_id' => $id,
                'month' => Carbon::now()->month,
                'year' => Carbon::now()->year,
            )
        );

        return $order;

    }

    public function AgentListRestock($id)
    {
        // $data = $this->repository->where([
        //     ['buyer_id', '=', $id],['buyer_type', '=', null]])->latest()->get();

        // return OrdersResources::collection($data);

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, b.name as seller_name, a.total, a.created_at, a.status FROM orders as a, users as b 
                                WHERE a.seller_id=b.id 
                                AND a.buyer_id= :buyer_id
                                AND a.buyer_type is null
                                AND YEAR(a.created_at) = :year
                                AND MONTH(a.created_at) = :month"),
            array(
                'buyer_id' => $id,
                'month' => Carbon::now()->month,
                'year' => Carbon::now()->year,
            )
        );

        return $order;

    }

    public function searchCustomerOrder($start_date, $end_date)
    {

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, c.avatar as buyer_avatar, b.name as seller_name, a.total, a.created_at, a.status, c.name as buyer_name FROM orders as a, users as b, users as c 
                            WHERE a.seller_id=b.id 
                            AND a.buyer_id = c.id
                            AND a.HQ = 0
                            AND a.buyer_type IS NULL
                            AND DATE(a.created_at) >= :start_date
                            AND DATE(a.created_at) <= :end_date"),
            array(
                'start_date' => $start_date,
                'end_date' => $end_date,
            )
        );

        return $order;

    }

    public function searchCustomerOrderHQ($start_date, $end_date, $id)
    {

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as seller_avatar, b.name as seller_name, a.total, a.created_at, a.status FROM orders as a, users as b 
                                WHERE a.seller_id=b.id
                                AND a.buyer_id= :buyer_id
                                AND a.buyer_type IS null 
                                AND DATE(a.created_at) >= :start_date
                                AND DATE(a.created_at) <= :end_date"),
            array(
                'buyer_id' => $id,
                'start_date' => $start_date,
                'end_date' => $end_date,
            )
        );

        return $order;

    }

    public function searchCustomerOrderTeam($start_date, $end_date, $id)
    {

        $order = DB::select(
            DB::raw("SELECT a.*, a.id, a.HQ, a.paid, b.avatar as buyer_avatar, b.name as buyer_name, a.total, a.created_at, a.status FROM orders as a, users as b 
                                WHERE a.buyer_id=b.id
                                AND a.seller_id= :seller_id
                                AND a.buyer_type is null 
                                AND DATE(a.created_at) >= :start_date
                                AND DATE(a.created_at) <= :end_date"),
            array(
                'seller_id' => $id,
                'start_date' => $start_date,
                'end_date' => $end_date,
            )
        );

        return $order;

    }
}