<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 16/10/2020
 * Time: 11:19 AM
 */

namespace App\Http\Controllers\Product\Lists;


use App\Agent;
use App\Http\Controllers\Team\Lists\ListTeam;
use App\Product;
use App\Http\Resources\Product as ProductResources;
use App\Http\Resources\AgentPriceMOQ as AgentPriceMOQResources;
use App\Product_type;
use App\Roles_price;
use App\Stock_agent;
use App\Http\Resources\StockAgent as StockAgentResources;
use App\Http\Resources\StockAgentForCustomer as StockAgentForCustomerResources;

class ListProduct
{
    /** @var  Product */
    private $repository;

    /** @var  Product_type */
    private $category;

    /** @var  Roles_price */
    private $agent_price;

    /** @var  Agent */
    private $agent;

    /** @var  ListTeam  */
    private $agent_details;

    /** @var  Stock_agent */
    private $stock_leader;

    /**
     * ListProduct constructor.
     * @param Product $repository
     * @param Product_type $category
     * @param Roles_price $agent_price
     * @param Agent $agent
     * @param ListTeam $agent_details
     * @param Stock_agent $stock_leader
     */
    public function __construct(Product $repository, Product_type $category, Roles_price $agent_price, Agent $agent, ListTeam $agent_details, Stock_agent $stock_leader)
    {
        $this->repository = $repository;
        $this->category = $category;
        $this->agent_price = $agent_price;
        $this->agent = $agent;
        $this->agent_details = $agent_details;
        $this->stock_leader = $stock_leader;
    }


    public function list()
    {
        $data = $this->repository->where('status', 'On')->latest()->get();

        return ProductResources::collection($data);
    }

    public function productDetails($id)
    {
        $data = $this->repository->find($id);

        return new ProductResources($data);
    }

    public function agentPriceAndMOQ($product_id)
    {
        $data = $this->agent_price->where('product_id',$product_id)->get();

        return AgentPriceMOQResources::collection($data);
    }

    public function category()
    {
        $data = $this->category->latest()->get(['id','name']);
        return response()->json($data);
    }

    public function ListPriceAndMOQ($user_id)
    {
        $details = $this->agent->where('user_id', $user_id)->first();

        $data = $this->agent_price->where([['agent_levels_id',$details->agent_levels_id],['status','On']])->get();

        return AgentPriceMOQResources::collection($data);
    }

    public function agentMOQ($product_id,$agent_levels_id)
    {
        $data = $this->agent_price->where([['product_id',$product_id],['agent_levels_id',$agent_levels_id]])->first('minimum_order');

        return response()->json($data);
    }


    public function stockListPriceAndMOQ($user_id)
    {
        $details = $this->agent->where('user_id', $user_id)->first();

        $data = $this->agent_price->where([['agent_levels_id',$details->agent_levels_id],['status','On']])->get();

        return $data;
    }

    public function StockLeaderList($user_id)
    {


        $agent_detail = $this->agent_details->agentInformation($user_id);


        $agent_detail = json_decode(json_encode($agent_detail), true);

        $leader_id = $agent_detail['leader_id']['user_id'];
        if($agent_detail['leader_id']['HQ'] == 1)
        {
            $product = $this->ListPriceAndMOQ($user_id);
            $product = json_decode(json_encode($product), true);
            $product_details = array();
            foreach($product as $data)
            {
                $product_details[] = array(
                    'product_id' => $data['product_id']['id'],
                    'price' => $data['price'],
                    'minimum_order' => $data['minimum_order'],
                    'quantity' => $data['product_id']['stock'],
                );

            }
            $product_details = json_decode(json_encode($product_details), false);
            return StockAgentResources::collection($product_details);
        }

        if($agent_detail['leader_id']['HQ'] == 0)
        {
            $product = $this->stockListPriceAndMOQ($user_id);



            $stock_leader = $this->stock_leader->where('user_id',$leader_id)->get();

            $stock_details = array();
            foreach($stock_leader as $key)
            {
                $stock_details[] = array(
                    'product_id' => $key['product_id'],
                    'quantity' => $key['quantity'],
                );

            }
            $product_details = array();
            foreach($product as $data)
            {
                $product_details[] = array(
                    'product_id' => $data['product_id'],
                    'price' => $data['price'],
                    'minimum_order' => $data['minimum_order'],
                    'quantity' => 0,
                );

            }
            $final =$stock_details;
            foreach ($product_details as $value) {
                $flag = 0;
                foreach ($final as $key => $data) {
                    // Check for date, size and type
                    if ($data['product_id']===$value['product_id']) {
                        $final[$key]['price'] = $value['price'];
                        $final[$key]['minimum_order'] = $value['minimum_order'];
                        $flag = 1;
                        break;
                    }
                }
                if ($flag === 0) {
                    array_push($final, $value);
                }
            }

            $object = json_decode(json_encode($final), false);
            return StockAgentResources::collection($object);
        }


    }
    public function StockListAgent($user_id)
    {
        $agent_detail = $this->agent_details->agentDetails($user_id);

        $product = $this->stockListPriceAndMOQ($user_id);
        $stock_leader = $this->stock_leader->where('user_id',$user_id)->get();

        $stock_details = array();
        foreach($stock_leader as $key)
        {
            $stock_details[] = array(
                'product_id' => $key['product_id'],
                'quantity' => $key['quantity'],
            );

        }
        $product_details = array();
        foreach($product as $data)
        {
            $product_details[] = array(
                'product_id' => $data['product_id'],
                'price' => $data['price'],
                'minimum_order' => $data['minimum_order'],
                'quantity' => 0,
            );

        }
        $final =$stock_details;
        foreach ($product_details as $value) {
            $flag = 0;
            foreach ($final as $key => $data) {
                // Check for date, size and type
                if ($data['product_id']===$value['product_id']) {
                    $final[$key]['price'] = $value['price'];
                    $final[$key]['minimum_order'] = $value['minimum_order'];
                    $flag = 1;
                    break;
                }
            }
            if ($flag === 0) {
                array_push($final, $value);
            }
        }

        $object = json_decode(json_encode($final), false);
        return StockAgentResources::collection($object);
    }

    public function StockListAgentForCustomer($user_id)
    {
        $agent_detail = $this->agent_details->agentDetails($user_id);

        $product = $this->stockListPriceAndMOQ($user_id);
        $stock_leader = $this->stock_leader->where('user_id',$user_id)->get();

        $stock_details = array();
        foreach($stock_leader as $key)
        {
            $stock_details[] = array(
                'product_id' => $key['product_id'],
                'stock' => $key['quantity'],
                'quantity' => 0,
                'total_price' => 0,
                'item_id' => $key['product_id'],
            );

        }
        $product_details = array();
        foreach($product as $data)
        {
            $product_details[] = array(
                'product_id' => $data['product_id'],
                'price' => $data['price'],
                'minimum_order' => $data['minimum_order'],
                'stock' => 0,
                'quantity' => 0,
                'total_price' => 0,
                'item_id' =>$data['product_id'],
            );

        }
        $final =$stock_details;
        foreach ($product_details as $value) {
            $flag = 0;
            foreach ($final as $key => $data) {
                // Check for date, size and type
                if ($data['product_id']===$value['product_id']) {
                    $final[$key]['price'] = $value['price'];
                    $final[$key]['minimum_order'] = $value['minimum_order'];
                    $flag = 1;
                    break;
                }
            }
            if ($flag === 0) {
                array_push($final, $value);
            }
        }

        $object = json_decode(json_encode($final), false);
        return StockAgentForCustomerResources::collection($object);
    }
}