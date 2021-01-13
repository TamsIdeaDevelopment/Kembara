<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 17/10/2020
 * Time: 6:43 PM
 */

namespace App\Http\Controllers\Product\Creates;


use App\Product;
use Illuminate\Http\Request;

class CreateProduct
{

    /** @var  Product */
    private $repository;

    /**
     * CreateProduct constructor.
     * @param Product $repository
     */
    public function __construct(Product $repository)
    {
        $this->repository = $repository;
    }


    public function create(Request $request)
    {

        if($request->hasFile('featured_image'))
        {

            $filenameWithExt = $request->featured_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->featured_image->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->featured_image->storeAs('public/Product', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'null';
        }

        $model = $this->repository->create([
            'product_type_id' => $request->input('product_type_id'),
            'status' => 'On',
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'retail_price' => $request->input('retail_price'),
            'weight' => $request->input('weight'),
            'stock' => $request->input('stock'),
            'featured_image' => $fileNameToStore,
        ]);

        return $model->id;
    }
}