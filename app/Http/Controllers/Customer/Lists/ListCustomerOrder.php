<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 04/02/2021
 * Time: 12:17 PM
 */

namespace App\Http\Controllers\Customer\Lists;

use App\Order;
Use App\Http\Resources\Orders as OrdersResources;

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
        $data = $this->repository->where([
            ['buyer_id', '=', $user_id],['seller_id', '=', $user_id],['buyer_type', '=', 'Customer']])->latest()->get();

        return OrdersResources::collection($data);
    }
}