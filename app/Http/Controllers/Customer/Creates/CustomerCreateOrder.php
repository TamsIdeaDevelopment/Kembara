<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 05/02/2021
 * Time: 2:06 AM
 */

namespace App\Http\Controllers\Customer\Creates;

use App\Agent;
use App\Mail\OrderEmail;
use App\Order;
Use App\Http\Resources\Orders as OrdersResources;
use App\Order_items;
use App\Stock_agent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

class CustomerCreateOrder
{
    /** @var  Order */
    private $repository;

    /** @var  Order_items */
    private $order_items;

    /** @var  Stock_agent */
    private $stock_leader;

    /**
     * CustomerCreateOrder constructor.
     * @param Order $repository
     * @param Order_items $order_items
     * @param Stock_agent $stock_leader
     */
    public function __construct(Order $repository, Order_items $order_items, Stock_agent $stock_leader)
    {
        $this->repository = $repository;
        $this->order_items = $order_items;
        $this->stock_leader = $stock_leader;
    }


    public function customerCreateOrder(Request $request)
    {
        $input = @json_decode($request->input('order'), true);
        $details= $input['details'];
        $input_order_items =$input['Carts'];
        $total=str_replace(",","",$details['total']);

        $order = $this->repository->create([
            'point' => 0,
            'HQ' => $details['HQ'],
            'buyer_type' => 'Customer',
            'seller_id' => $details['seller_id'],
            'buyer_id' => $details['buyer_id'],
            'payment_methods' => '2',
            'status' => 1,
            'paid' => 1,
            'total' => $total,
            'total_paid' => $total,
            'paid_at' => Carbon::now(),
            'deliver_to' => $details['deliver_to'],
            'deliver_to_phone_no' => $details['deliver_to_phone_no'],
            'shipping_address' => $details['shipping_address'],
            'city' => $details['city'],
            'state' => $details['state'],
            'country' => $details['country'],
            'postcode' => $details['postcode'],
            'tracking_number' => $details['tracking_number'],
        ]);

        $user = User::findOrFail($details['buyer_id']);

        foreach($input_order_items as $key) {

            $stock_leader = $this->stock_leader->where([['user_id',$details['seller_id']],['product_id',$key['product_id']['id']]])->first();

            $stock_leader->quantity = $stock_leader->quantity - $key['quantity'];
            $stock_leader->save();


            $order_items[] = $this->order_items->create([
                'order_id' => $order->id,
                'product_id' => $key['product_id']['id'],
                'price' => $key['product_id']['retail_price'],
                'quantity' => $key['quantity'],
                'total' => $key['total_price'],
                'weight' => $key['product_id']['weight'],
                'name' => $key['product_id']['name'],
            ]);
        }
        return ['redirect' => route('customer.details.order',$order->id)];

    }


}