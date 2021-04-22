<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 18/10/2020
 * Time: 6:22 PM
 */

namespace App\Http\Controllers\Product\Updates;


use App\Product;
use App\Stock_agent;
use Illuminate\Http\Request;

class UpdateProduct
{

    /** @var  Product */
    private $repository;

    /**
     * UpdateProduct constructor.
     * @param Product $repository
     */
    public function __construct(Product $repository)
    {
        $this->repository = $repository;
    }

    public function update($id, Request $request)
    {

        if($request->hasFile('featured_image'))
        {

            $filenameWithExt = $request->featured_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            $extension = $request->featured_image->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->featured_image->storeAs('public/Product', $fileNameToStore);

        }
        if(!$request->hasFile('featured_image'))
        {
            $fileNameToStore = $request->featured_image;
        }

        $product = $this->repository->findOrFail($id);

        $product->name = $request->input('name');
        $product->product_type_id = $request->input('product_type_id');
        $product->product_set = $request->input('product_set');
        $product->description = $request->input('description');
        $product->weight = $request->input('weight');
        $product->stock = $request->input('stock');
        $product->retail_price = $request->input('retail_price');
        $product->ss_retail_price = $request->input('ss_retail_price');
        $product->featured_image = $fileNameToStore;


        if($product->save()){
            return $product;
        }

    }

    public function updateStock($id, Request $request){

        $product = $this->repository->findOrFail($id);

        $product->stock = $request->input('stock');

        if($product->save()){
            return $product;
        }

    }

    public function editAgentStock($user_id, $product_id, $quantity)
    {
        $stock_agent = Stock_agent::updateOrCreate(['user_id' => $user_id,'product_id' => $product_id], ['quantity'=>$quantity]);
        return $stock_agent;
    }


}
