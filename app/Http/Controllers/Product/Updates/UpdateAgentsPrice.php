<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 19/10/2020
 * Time: 11:35 PM
 */

namespace App\Http\Controllers\Product\Updates;

use App\Agent_levels;
use App\Roles_price;
use Illuminate\Http\Request;

class UpdateAgentsPrice
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

    public function update(Request $request)
    {
        $input = $request->all();

        $count = count($input);

        for ($i = 0; $i < $count; $i++) {
            $product [] = $this->repository->findOrFail($input[$i]['id']);
            $product[$i]['price'] = $input[$i]['price'];
            $product[$i]['minimum_order'] = $input[$i]['minimum_order'];
            $product[$i]->save();
        }
        return $product;
    }
}