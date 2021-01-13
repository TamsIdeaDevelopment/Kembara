<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 17/10/2020
 * Time: 7:53 PM
 */

namespace App\Http\Controllers\Product\Creates;


use App\Agent_levels;
use App\Roles_price;
use Illuminate\Http\Request;

class CreateAgentsPrice
{
    /** @var  Roles_price */
    private $repository;

    /**
     * CreateProduct constructor.
     * @param Roles_price $repository
     */
    public function __construct(Roles_price $repository)
    {
        $this->repository = $repository;
    }


    public function create(Request $request)
    {
        $input = $request->all();
        $count = count($input);
        for ($i = 0; $i < $count; $i++) {
            $model[] = $this->repository->create([
                'product_id' => $input[$i]['product_id'],
                'agent_levels_id' => $input[$i]['id'],
                'price' => $input[$i]['price'],
                'minimum_order' => $input[$i]['moq'],
                'status' => 'On',
            ]);
        }
        return $model;
    }
    public function createAgentPrice(Request $request)
    {
            $model = $this->repository->create([
                'product_id' => $request->input('product_id'),
                'agent_levels_id' => $request->input('agent_levels_id'),
                'price' => $request->input('price'),
                'minimum_order' => 0,
                'status' => 'On',
            ]);

        return $model;
    }
}