<?php


namespace App\Http\Controllers\Product\Lists;


use App\Agent;
use App\Http\Controllers\Team\Lists\ListTeam;
use App\Http\Resources\AgentPriceMOQ as AgentPriceMOQResources;
use App\Http\Resources\StockAgent as StockAgentResources;
use App\Product;
use App\Product_type;
use App\Roles_price;
use App\Stock_agent;

class ListFirstPurchaseProduct
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

    public function ListPriceAndMOQ($user_id)
    {
        $details = $this->agent->where('user_id', $user_id)->first();

        $data = $this->agent_price->where([['agent_levels_id',$details->agent_levels_id],['status','On']])->get();

        return AgentPriceMOQResources::collection($data);
    }

    public function StockFirstPurchase($user_id)
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

}
