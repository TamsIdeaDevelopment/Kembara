<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 17/11/2020
 * Time: 2:49 PM
 */

namespace App\Http\Controllers\Orders\Team\Updates;


use App\Agent;
use App\Order;
use App\Order_items;
use App\Stock_agent;

class ApproveOrder
{

    /** @var  Order */
    private $order;

    /** @var  Order_items */
    private $order_items;

    /** @var  Stock_agent */
    private $stock_agent;

    /**
     * ApproveOrder constructor.
     * @param Order $order
     * @param Order_items $order_items
     * @param Stock_agent $stock_agent
     */
    public function __construct(Order $order, Order_items $order_items, Stock_agent $stock_agent)
    {
        $this->order = $order;
        $this->order_items = $order_items;
        $this->stock_agent = $stock_agent;
    }


    public function approveOrder($buyer_id,$order_id)
    {
        $order = $this->order->findOrFail($order_id);
        $order->status = 1;
        $order->delivery_status = 0;

        $buyer = Agent::where('user_id',$order->buyer_id)->first();
        if($buyer->paid == 0)
        {
            if($buyer->referral_id !== null)
            {
                $commision = $order->total*0.10;
                $referral = Agent::where('user_id',$buyer->referral_id)->first();
                $referral->point = $referral->point + $commision;
                $referral->save();
            }
            $buyer->paid = 1;
            $buyer->save();
        }

        $order_items = $this->order_items->where('order_id', $order_id)->get();
        //return $order_items;
        for($i=0; $i<count($order_items); $i++)
        {
            $stock[$i] = $this->stock_agent->where([['product_id',$order_items[$i]['product_id']],['user_id',$buyer_id]])->first();
            if($stock[$i])
            {
                $stock[$i]->quantity = $stock[$i]->quantity + $order_items[$i]['quantity'];
                $stock[$i]->save();
            }
            if(!$stock[$i])
            {
                $stock_new =$this->stock_agent->create([
                    'user_id' => $buyer_id,
                    'product_id' => $order_items[$i]['product_id'],
                    'quantity' => $order_items[$i]['quantity'],
                ]);
            }
        }
        $order->save();

    }



}