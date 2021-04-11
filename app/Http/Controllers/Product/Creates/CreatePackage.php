<?php
/**
 * Created by PhpStorm.
 * User: snh
 * Date: 25/03/2021
 * Time: 11:03 PM
 */

namespace App\Http\Controllers\Product\Creates;


use App\Packages_type;
use Illuminate\Http\Request;

class CreatePackage
{

    /** @var  Packages_type */
    private $repository;

    /**
     * CreatePackage constructor.
     * @param Packages_type $repository
     */
    public function __construct(Packages_type $repository)
    {
        $this->repository = $repository;
    }


    public function create(Request $request)
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
        else
        {
            $fileNameToStore = 'null';
        }
        $model = $this->repository->create([
            'status' => 'On',
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'retail_price' => $request->input('retail_price'),
            'ss_retail_price' => $request->input('ss_retail_price'),
            'featured_image' => $fileNameToStore,
        ]);

        return $model->id;
    }
}
