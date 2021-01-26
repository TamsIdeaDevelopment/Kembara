<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 24/01/2021
 * Time: 5:31 PM
 */

namespace App\Http\Controllers\Orders\HQ\Updates;

use App\Order;
use App\Order_items;
Use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\OrderItems as OrderItemsResources;

class UpdateShipment
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

    public function updateShipment($order_id,$tracking_no)
    {
        if($tracking_no == '')
        {
            $data = $this->repository->findOrFail($order_id);
            $data->tracking_no = '';
        }
        if($tracking_no != '')
        {
            $data = $this->repository->findOrFail($order_id);
            $data->tracking_no = $tracking_no;
            $data->delivery_status = '1';
        }

        $data->save();
        return $data;
    }

}