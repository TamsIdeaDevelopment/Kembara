<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 06/11/2020
 * Time: 9:36 PM
 */

namespace App\Http\Controllers\Orders\HQ\Creates;

use App\Agent;
use App\CartItem;
use App\Mail\OrderEmail;
use App\Order;
Use App\Http\Resources\Orders as OrdersResources;
use App\Order_items;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

class CreateOrder
{
    /** @var  Order */
    private $repository;

    /** @var  Order_items */
    private $order_items;

    /**
     * CreateOrder constructor.
     * @param Order $repository
     * @param Order_items $order_items
     */
    public function __construct(Order $repository, Order_items $order_items)
    {
        $this->repository = $repository;
        $this->order_items = $order_items;
    }

    public function createOrder(Request $request)
    {
        $input = @json_decode($request->input('order'), true);
        $details= $input['details'];
        $input_order_items =$input['Carts'];
        $total=str_replace(",","",$details['total']);

        if($input['payment_methods'] ==1)
        {
            if($input['delivery_type'] == 0)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => $input['delivery_fees'],
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => $details['deliver_to'],
                    'deliver_to_phone_no' => $details['deliver_to_phone_no'],
                    'shipping_address' => $details['shipping_address'],
                    'city' => $details['city'],
                    'state' => $details['state'],
                    'country' => $details['country'],
                    'postcode' => $details['postcode'],
                    'tracking_number' => $details['tracking_number'],
                    'remarks' => $details['remarks'],
                ]);
            }
            if($input['delivery_type'] == 1)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => 0,
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => 'Self Pickup',
                    'deliver_to_phone_no' => '',
                    'shipping_address' => '',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                    'postcode' => '',
                    'tracking_number' => '',
                    'remarks' => $details['remarks'],
                ]);
            }

            $user = User::findOrFail($details['buyer_id']);
            Mail::to($user->email)->send(new OrderEmail($order,$user));

            foreach($input_order_items as $key) {

                $order_items[] = $this->order_items->create([
                    'order_id' => $order->id,
                    'product_id' => $key['id'],
                    'price' => $key['price'],
                    'quantity' => $key['qty'],
                    'total' => $key['subtotal'],
                    'weight' => $key['weight'],
                    'name' => $key['name'],
                ]);

                $cart_items = CartItem::where('rowId', $key['rowId'])->first();
                $cart_items->delete();
            }

            if($input['point'] != 0)
            {
                $point = Agent::where('user_id',$details['buyer_id'])->first();

                $point->point = $point->point - $input['point'];
                $point->save();
            }

            Cart::destroy();
            return ['redirect' => route('toyyibpay-create',$order->id)];
        }

        if($input['payment_methods'] ==2)
        {
            if($request->hasFile('proof_of_payment'))
            {

                $filenameWithExt = $request->proof_of_payment->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->proof_of_payment->getClientOriginalExtension();
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                $path = $request->proof_of_payment->storeAs('public/Receipt', $fileNameToStore);

            }
            else
            {
                $fileNameToStore = '';
            }

            if($details['paid_at'] != null)
            {
                $paid_at = Carbon::parse($details['paid_at'])->toDateTimeString();
                if($input['delivery_type'] == 0)
                {
                    $order = $this->repository->create([
                        'point' => $input['point'],
                        'HQ' => $details['HQ'],
                        'seller_id' => $details['seller_id'],
                        'buyer_id' => $details['buyer_id'],
                        'delivery_type' => $input['delivery_type'],
                        'delivery_fees' => $input['delivery_fees'],
                        'payment_methods' => $input['payment_methods'],
                        'status' => 2,
                        'paid' => 1,
                        'ref_no' => $fileNameToStore,
                        'total_paid' => $details['total_paid'],
                        'paid_at' => $paid_at,
                        'total' => $total,
                        'deliver_to' => $details['deliver_to'],
                        'deliver_to_phone_no' => $details['deliver_to_phone_no'],
                        'shipping_address' => $details['shipping_address'],
                        'city' => $details['city'],
                        'state' => $details['state'],
                        'country' => $details['country'],
                        'postcode' => $details['postcode'],
                        'tracking_number' => $details['tracking_number'],
                        'remarks' => $details['remarks'],
                    ]);
                }
                if($input['delivery_type'] == 1)
                {
                    $order = $this->repository->create([
                        'point' => $input['point'],
                        'HQ' => $details['HQ'],
                        'seller_id' => $details['seller_id'],
                        'buyer_id' => $details['buyer_id'],
                        'delivery_type' => $input['delivery_type'],
                        'delivery_fees' => 0,
                        'payment_methods' => $input['payment_methods'],
                        'status' => 4,
                        'paid' => 1,
                        'ref_no' => $fileNameToStore,
                        'total_paid' => $details['total_paid'],
                        'paid_at' => $paid_at,
                        'total' => $total,
                        'deliver_to' => 'Self Pickup',
                        'deliver_to_phone_no' => '',
                        'shipping_address' => '',
                        'city' => '',
                        'state' => '',
                        'country' => '',
                        'postcode' => '',
                        'tracking_number' => '',
                        'remarks' => $details['remarks'],
                    ]);
                }
            }
            if($details['paid_at'] == null && $details['total_paid'] == null)
            {
                if($input['delivery_type'] == 0)
                {
                    $order = $this->repository->create([
                        'point' => $input['point'],
                        'HQ' => $details['HQ'],
                        'seller_id' => $details['seller_id'],
                        'buyer_id' => $details['buyer_id'],
                        'delivery_type' => $input['delivery_type'],
                        'delivery_fees' => $input['delivery_fees'],
                        'payment_methods' => $input['payment_methods'],
                        'status' => 4,
                        'paid' => 0,
                        'ref_no' => $fileNameToStore,
                        'total_paid' => 0,
                        'total' => $total,
                        'deliver_to' => $details['deliver_to'],
                        'deliver_to_phone_no' => $details['deliver_to_phone_no'],
                        'shipping_address' => $details['shipping_address'],
                        'city' => $details['city'],
                        'state' => $details['state'],
                        'country' => $details['country'],
                        'postcode' => $details['postcode'],
                        'tracking_number' => $details['tracking_number'],
                        'remarks' => $details['remarks'],
                    ]);
                }
                if($input['delivery_type'] == 1)
                {
                    $order = $this->repository->create([
                        'point' => $input['point'],
                        'HQ' => $details['HQ'],
                        'seller_id' => $details['seller_id'],
                        'buyer_id' => $details['buyer_id'],
                        'delivery_type' => $input['delivery_type'],
                        'delivery_fees' => 0,
                        'payment_methods' => $input['payment_methods'],
                        'status' => 4,
                        'paid' => 0,
                        'ref_no' => $fileNameToStore,
                        'total_paid' => 0,
                        'total' => $total,
                        'deliver_to' => 'Self Pickup',
                        'deliver_to_phone_no' => '',
                        'shipping_address' => '',
                        'city' => '',
                        'state' => '',
                        'country' => '',
                        'postcode' => '',
                        'tracking_number' => '',
                        'remarks' => $details['remarks'],
                    ]);
                }
            }

            $user = User::findOrFail($details['buyer_id']);
            Mail::to($user->email)->send(new OrderEmail($order,$user));


            foreach($input_order_items as $key) {

                $order_items[] = $this->order_items->create([
                    'order_id' => $order->id,
                    'product_id' => $key['id'],
                    'price' => $key['price'],
                    'quantity' => $key['qty'],
                    'total' => $key['subtotal'],
                    'weight' => $key['weight'],
                    'name' => $key['name'],
                ]);

                $cart_items = CartItem::where('rowId', $key['rowId'])->first();
                $cart_items->delete();
            }

            if($input['point'] != 0)
            {
                $point = Agent::where('user_id',$details['buyer_id'])->first();

                $point->point = $point->point - $input['point'];
                $point->save();
            }
            Cart::destroy();
            return ['redirect' => route('details.order',$order->id)];
        }

        if($input['payment_methods'] ==3)
        {
            if($input['delivery_type'] == 0)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => $input['delivery_fees'],
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => $details['deliver_to'],
                    'deliver_to_phone_no' => $details['deliver_to_phone_no'],
                    'shipping_address' => $details['shipping_address'],
                    'city' => $details['city'],
                    'state' => $details['state'],
                    'country' => $details['country'],
                    'postcode' => $details['postcode'],
                    'tracking_number' => $details['tracking_number'],
                    'remarks' => $details['remarks'],
                ]);
            }
            if($input['delivery_type'] == 1)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => 0,
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => 'Self Pickup',
                    'deliver_to_phone_no' => '',
                    'shipping_address' => '',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                    'postcode' => '',
                    'tracking_number' => '',
                    'remarks' => $details['remarks'],
                ]);
            }

            $user = User::findOrFail($details['buyer_id']);
            Mail::to($user->email)->send(new OrderEmail($order,$user));

            foreach($input_order_items as $key) {

                $order_items[] = $this->order_items->create([
                    'order_id' => $order->id,
                    'product_id' => $key['id'],
                    'price' => $key['price'],
                    'quantity' => $key['qty'],
                    'total' => $key['subtotal'],
                    'weight' => $key['weight'],
                    'name' => $key['name'],
                ]);

                $cart_items = CartItem::where('rowId', $key['rowId'])->first();
                $cart_items->delete();
            }
            if($input['point'] != 0)
            {
                $point = Agent::where('user_id',$details['buyer_id'])->first();

                $point->point = $point->point - $input['point'];
                $point->save();
            }
            Cart::destroy();
            return ['redirect' => route('billplz-create',$order->id)];
        }
        if($input['payment_methods'] ==4)
        {
            if($input['delivery_type'] == 0)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => $input['delivery_fees'],
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => $details['deliver_to'],
                    'deliver_to_phone_no' => $details['deliver_to_phone_no'],
                    'shipping_address' => $details['shipping_address'],
                    'city' => $details['city'],
                    'state' => $details['state'],
                    'country' => $details['country'],
                    'postcode' => $details['postcode'],
                    'tracking_number' => $details['tracking_number'],
                    'remarks' => $details['remarks'],
                ]);
            }
            if($input['delivery_type'] == 1)
            {
                $order = $this->repository->create([
                    'point' => $input['point'],
                    'HQ' => $details['HQ'],
                    'seller_id' => $details['seller_id'],
                    'buyer_id' => $details['buyer_id'],
                    'delivery_type' => $input['delivery_type'],
                    'delivery_fees' => 0,
                    'payment_methods' => $input['payment_methods'],
                    'status' => 4,
                    'paid' => 0,
                    'total' => $total,
                    'deliver_to' => 'Self Pickup',
                    'deliver_to_phone_no' => '',
                    'shipping_address' => '',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                    'postcode' => '',
                    'tracking_number' => '',
                    'remarks' => $details['remarks'],
                ]);
            }

            $user = User::findOrFail($details['buyer_id']);
            Mail::to($user->email)->send(new OrderEmail($order,$user));

            foreach($input_order_items as $key) {

                $order_items[] = $this->order_items->create([
                    'order_id' => $order->id,
                    'product_id' => $key['id'],
                    'price' => $key['price'],
                    'quantity' => $key['qty'],
                    'total' => $key['subtotal'],
                    'weight' => $key['weight'],
                    'name' => $key['name'],
                ]);

                $cart_items = CartItem::where('rowId', $key['rowId'])->first();
                $cart_items->delete();

            }
            if($input['point'] != 0)
            {
                $point = Agent::where('user_id',$details['buyer_id'])->first();

                $point->point = $point->point - $input['point'];
                $point->save();
            }
            Cart::destroy();
            return ['redirect' => route('senang-pay-create',$order->id)];
        }
    }

}
