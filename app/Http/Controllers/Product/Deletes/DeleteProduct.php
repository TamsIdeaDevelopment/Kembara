<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 18/10/2020
 * Time: 6:22 PM
 */

namespace App\Http\Controllers\Product\Deletes;

use App\Product;
use App\Roles_price;

class DeleteProduct
{
    /** @var  Product */
    private $repository;

    /** @var  Roles_price */
    private $agent_levels_price;

    /**
     * DeleteProduct constructor.
     * @param Product $repository
     * @param Roles_price $agent_levels_price
     */
    public function __construct(Product $repository, Roles_price $agent_levels_price)
    {
        $this->repository = $repository;
        $this->agent_levels_price = $agent_levels_price;
    }


    public function delete($id)
    {

        $product = $this->repository->findOrFail($id);

        $product->status = 'Off';


        $price = $this->agent_levels_price->where('product_id', $product->id)->get();

        $count = count($price);


        for ($i = 0; $i < $count; $i++) {
            $price[$i]['status'] = 'Off';
            $price[$i]->save();
        }

        if($product->save()){
            return $product;
        }

    }
}