<?php
/**
 * Created by PhpStorm.
 * User: snh
 * Date: 25/03/2021
 * Time: 11:03 PM
 */

namespace App\Http\Controllers\Product\Updates;


use App\Packages_type;
use Illuminate\Http\Request;

class UpdatePackage
{

    /** @var  Packages_type */
    private $package;

    /**
     * CreatePackage constructor.
     * @param Packages_type $package
     */
    public function __construct(Packages_type $package)
    {
        $this->package = $package;
    }


    public function updatePackage($id, Request $request)
    {

        if($request->hasFile('featured_image'))
        {

            $filenameWithExt = $request->featured_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->featured_image->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->featured_image->storeAs('public/Product', $fileNameToStore);

        }
        if(!$request->hasFile('featured_image'))
        {
            $fileNameToStore = $request->featured_image;
        }

        $update_package = $this->package->findOrFail($id);

        $update_package->name = $request->input('name');
        $update_package->description = $request->input('description');
        $update_package->retail_price = $request->input('retail_price');
        $update_package->ss_retail_price = $request->input('ss_retail_price');
        $update_package->featured_image = $fileNameToStore;

        if($update_package->save()){
            return $update_package;
        }
    }
}
