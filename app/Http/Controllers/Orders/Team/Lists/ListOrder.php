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
        $data = $this->repository->where('HQ', 0)->latest()->get();

        return OrdersResources::collection($data);
    }

    public function AgentListOrder($id)
    {
        $data = $this->repository->where([
            ['seller_id', '=', $id]])->latest()->get();

        return OrdersResources::collection($data);
    }

    public function AgentListRestock($id)
    {
        $data = $this->repository->where([
            ['buyer_id', '=', $id]])->latest()->get();

        return OrdersResources::collection($data);
    }
}