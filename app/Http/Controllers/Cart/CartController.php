<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 04/11/2020
 * Time: 2:43 PM
 */

namespace App\Http\Controllers\Cart;


use App\Agent;
use App\CartItem;
use App\Http\Controllers\Team\Lists\ListTeam;
use App\Package;
use App\Product;
use App\Stock_agent;
use Cart;
use App\Http\Resources\Package as PackageResource;


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

    public function CartMiniAgentAddItems($user_id,$package_id)
    {
        $agent = Agent::where('user_id',$user_id)->first();

        $data = Cart::count();
        if($data ==0)
        {
            $package_items = Package::where('packages_type_id', $package_id)->get();

            $package_details = PackageResource::collection($package_items);
            $package_details = json_decode(json_encode($package_details), true);



//        $data = $this->product->findOrFail($product_id);

            $agent_detail = $this->agent_details->agentInformation($user_id);
            $agent_detail = json_decode(json_encode($agent_detail), true);
            $leader_id = $agent_detail['leader_id']['user_id'];
            $paid = $agent_detail['paid'];
            $stock = 0;
            $HQ = 0;

            for($i=0; $i<count($package_details); $i++)
            {

                $cart[] = Cart::add($package_details[$i]['product_id']['id'],$package_details[$i]['product_id']['name'], $package_details[$i]['qty'], $package_details[$i]['retail_price'], $package_details[$i]['product_id']['weight'] , ['size' => $package_details[$i]['product_id']['featured_image']]);

                $cart_items [] = CartItem::create([
                    'rowId' =>  $cart[$i]->rowId,
                    'product_id' =>  $package_details[$i]['product_id']['id'],
                    'seller_id' =>  $leader_id,
                    'HQ' =>  $HQ,
                    'quantity' =>  $package_details[$i]['qty'],
                    'status' =>  0,
                ]);

                $product = $this->product->findOrFail($package_details[$i]['product_id']['id']);

                if($product->id == $package_details[$i]['product_id']['id'])
                {
                    $product->stock = $product->stock - $package_details[$i]['qty'];
                    $product->save();
                }
            }
            return view('pages.Cart.MiniAgentDetails',['agent' => $agent]);

        }
        else

        {
//            return 'no';
            return view('pages.Cart.MiniAgentDetails',['agent' => $agent]);

        }





//        if($paid == 0)
//        {
//            $data->stock = $data->stock -$quantity;
//            $data->save();
//            $stock = $data->stock;
//            $HQ = 1;
//        }
//        else
//        {
//            if($agent_detail['leader_id']['HQ'] == 1)
//            {
//                $data->stock = $data->stock -$quantity;
//                $data->save();
//                $stock = $data->stock;
//                $HQ = 1;
//            }
//            if($agent_detail['leader_id']['HQ'] == 0)
//            {
//                $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$product_id]])->first();
//
//                $stock_leader->quantity = $stock_leader->quantity-$quantity;
//
//                $stock_leader->save();
//                $stock = $stock_leader->quantity;
//                $HQ = 0;
//            }
//        }




        //return redirect('/cart-details');
    }
    public function CartAddItems($user_id,$product_id, $price, $minimum_order, $quantity,$product_type)
    {
        $data = $this->product->findOrFail($product_id);

        $agent_detail = $this->agent_details->agentInformation($user_id);
        $agent_detail = json_decode(json_encode($agent_detail), true);
        $leader_id = $agent_detail['leader_id']['user_id'];
        $paid = $agent_detail['paid'];
        $stock = 0;
        $HQ = 0;


        if($paid == 0)
        {
            $data->stock = $data->stock -$quantity;
            $data->save();
            $stock = $data->stock;
            $HQ = 1;
        }
        else
        {
            if($agent_detail['leader_id']['HQ'] == 1)
            {
                $data->stock = $data->stock -$quantity;
                $data->save();
                $stock = $data->stock;
                $HQ = 1;
            }
            if($agent_detail['leader_id']['HQ'] == 0)
            {
                $stock_leader = $this->stock_leader->where([['user_id',$leader_id],['product_id',$product_id]])->first();

                $stock_leader->quantity = $stock_leader->quantity-$quantity;

                $stock_leader->save();
                $stock = $stock_leader->quantity;
                $HQ = 0;
            }
        }

        $cart = Cart::add($data->id, $data->name, $quantity, $price, $data->weight, ['size' => $data->featured_image , 'stock' => $stock, 'MOQ' => $minimum_order, 'stock' => $stock, 'product_type' => $product_type]);

        $cart_items = CartItem::create([
            'rowId' =>  $cart->rowId,
            'product_id' =>  $product_id,
            'seller_id' =>  $leader_id,
            'HQ' =>  $HQ,
            'quantity' =>  $quantity,
            'status' =>  0,
        ]);
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
        $paid = $agent_detail['paid'];
        if($paid == 0)
        {
            $product->stock = $product->stock +$cart->qty;
            $product->save();
        }
        else
        {
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
        }

        $cart_items = CartItem::where('rowId', $cart->rowId)->first();
        $cart_items->delete();

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
        $paid = $agent_detail['paid'];
        if($paid == 0)
        {
            $product->stock = $product->stock + $cart->qty;
            $product->save();
            $product->stock = $product->stock - $quantity;
            $product->save();
        }
        else
        {
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
        }



        $cart_items = CartItem::where('rowId', $cart->rowId)->first();
        $cart_items->quantity = $quantity;
        $cart_items->save();

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
        $paid = $agent_detail['paid'];
        if($paid == 0)
        {
            $product->stock = $product->stock + 1;
            $product->save();
        }
        else
        {
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
        }


        $cart_items = CartItem::where('rowId', $cart->rowId)->first();
        $cart_items->quantity = $quantity;
        $cart_items->save();

        Cart::update($rowId, $quantity);
        $data = Cart::content();
        return $data;

    }

    public function CartDetails()
    {
        return view('pages.Cart.details');
    }

    public function CartFirstPurchase()
    {
        return view('pages.Cart.cartFirstPurchase');
    }

}
