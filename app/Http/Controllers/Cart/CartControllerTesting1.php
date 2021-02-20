<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 04/11/2020
 * Time: 2:43 PM
 */

namespace App\Http\Controllers\Cart;


use App\Http\Controllers\Team\Lists\ListTeam;
use App\Product;
use App\Stock_agent;
use Cart;


class CartController
{
    /** @var  Product */
    private $product;

    /** @var  ListTeam  */
    private $agent_details;

    /** @var  Stock_agent */
    private $stock_leader;

    /**
     * CartController constructor.
     * @param Product $product
     * @param ListTeam $agent_details
     * @param Stock_agent $stock_leader
     */
    public function __construct(Product $product, ListTeam $agent_details, Stock_agent $stock_leader)
    {
        $this->product = $product;
        $this->agent_details = $agent_details;
        $this->stock_leader = $stock_leader;
    }


    public function test($product_id, $price, $minimum_order)
    {


        $data = $this->product->findOrFail($product_id);

        //Cart::add($data->id,$data->name, $minimum_order, $price, $data->weight,  ['size' => $data->featured_image]);
        Cart::add($data->id, $data->name, $minimum_order, $price, $data->weight, ['size' => $data->featured_image]);

        return redirect()->back();
//        return view('pages.Admin.Products.ListProduct');
    }

//    public function CartAddItems($user_id,$product_id, $price, $minimum_order)
//    {
//        $data = $this->product->findOrFail($product_id);
//
//        $agent_detail = $this->agent_details->agentInformation($user_id);
//        $agent_detail = json_decode(json_encode($agent_detail), true);
//        $leader_id = $agent_detail['leader_id']['user_id'];
//
//        if($agent_detail['leader_id']['HQ'] == 1)
//        {
//           $data->stock = $data->stock -$minimum_order;
//           $data->save();
//        }
//        if($agent_detail['leader_id']['HQ'] == 0)
//        {
//            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$product_id]])->first();
//
//            $stock_leader->quantity = $stock_leader->quantity-$minimum_order;
//
//            $stock_leader->save();
//        }
//
//        Cart::add($data->id, $data->name, $minimum_order, $price, $data->weight, ['size' => $data->featured_image]);
//        return redirect()->back();
//        //return redirect('/cart-details');
//    }

    public function CartAddItems($user_id,$product_id, $price, $minimum_order, $quantity,$product_type)
    {
        $data = $this->product->findOrFail($product_id);

        $agent_detail = $this->agent_details->agentInformation($user_id);
        $agent_detail = json_decode(json_encode($agent_detail), true);
        $leader_id = $agent_detail['leader_id']['user_id'];

        $stock = 0;

        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $data->stock = $data->stock -$quantity;
            $data->save();
            $stock = $data->stock;
        }
        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$product_id]])->first();

            $stock_leader->quantity = $stock_leader->quantity-$quantity;

            $stock_leader->save();
            $stock = $stock_leader->quantity;

        }

        Cart::add($data->id, $data->name, $quantity, $price, $data->weight, ['size' => $data->featured_image , 'stock' => $stock, 'MOQ' => $minimum_order, 'stock' => $stock, 'product_type' => $product_type]);
        return redirect()->back();
        //return redirect('/cart-details');
    }

    public function RemoveItem($user_id,$rowId)
    {
        $cart = Cart::get($rowId);
        $product = $this->product->findOrFail($cart->id);
        $agent_detail = $this->agent_details->agentInformation($user_id);
        $agent_detail = json_decode(json_encode($agent_detail), true);
        $leader_id = $agent_detail['leader_id']['user_id'];

        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $product->stock = $product->stock +$cart->qty;
            $product->save();
        }
        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$cart->id]])->first();
            $stock_leader->quantity = $stock_leader->quantity+$cart->qty;
            $stock_leader->save();
        }



        Cart::remove($rowId);
        $data = Cart::content();
        return response()->json($data);

    }


    public function ListCarts()
    {
        $data = Cart::content();
        return $data;

    }

    public function CountCarts()
    {
        $data = Cart::count();
        return $data;

    }

    public function totalCarts()
    {
        $data = Cart::subtotal();
        $data = floatval(preg_replace('/[^\d.]/', '', $data));
        return $data;

    }

    public function AddQuantity($user_id,$rowId,$quantity)
    {

        $cart = Cart::get($rowId);
        $product = $this->product->findOrFail($cart->id);
        $agent_detail = $this->agent_details->agentInformation($user_id);
        $agent_detail = json_decode(json_encode($agent_detail), true);
        $leader_id = $agent_detail['leader_id']['user_id'];

        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $product->stock = $product->stock + $cart->qty;
            $product->save();
        }
        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$cart->id]])->first();

            $stock_leader->quantity = $stock_leader->quantity + $cart->qty;

            $stock_leader->save();
        }

        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $product->stock = $product->stock - $quantity;
            $product->save();
        }
        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$cart->id]])->first();

            $stock_leader->quantity = $stock_leader->quantity - $quantity;

            $stock_leader->save();
        }

        Cart::update($rowId, $quantity);
        $data = Cart::content();
        return $data;

    }

    public function DecreaseQuantity($user_id,$rowId,$quantity)
    {

        $cart = Cart::get($rowId);
        $product = $this->product->findOrFail($cart->id);
        $agent_detail = $this->agent_details->agentInformation($user_id);
        $agent_detail = json_decode(json_encode($agent_detail), true);
        $leader_id = $agent_detail['leader_id']['user_id'];

        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $product->stock = $product->stock + 1;
            $product->save();
        }
        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$cart->id]])->first();

            $stock_leader->quantity = $stock_leader->quantity+1;

            $stock_leader->save();
        }

        Cart::update($rowId, $quantity);
        $data = Cart::content();
        return $data;

    }

    public function CartDetails()
    {
        return view('pages.Cart.details');
    }

}