<?php
/**
 * Created by PhpStorm.
 * User: snh
 * Date: 25/03/2021
 * Time: 11:03 PM
 */

namespace App\Http\Controllers\Product\Updates;


use App\Package;
use App\Packages_type;
use Illuminate\Http\Request;

class UpdatePackageProduct
{

    /** @var  Package */
    private $package_product;

    /** @var  Packages_type */
    private $package;

    /**
     * CreatePackage constructor.
     * @param Package $package_product
     * @param Packages_type $package
     */
    public function __construct(Package $package_product, Packages_type $package)
    {
        $this->package_product = $package_product;
        $this->package = $package;
    }

    public function updatePackageProduct(Request $request,$id)
    {
//        $packages_product = Packages_type::select('id')->where('name', $request->input('packages_type_id'))->get();

        $input = $request->all();
        $count = count($input);

//        return response($input);

        for ($i = 0; $i < $count; $i++) {
            $update_package_product [] = $this->package_product->findOrFail($id);
            $update_package_product[$i]['packages_type_id'] = $id;
            $update_package_product[$i]['product_id'] = $input[$i]['id'];
            $update_package_product[$i]['retail_price'] = $input[$i]['retail_price'];
            $update_package_product[$i]['ss_retail_price'] = $input[$i]['ss_retail_price'];
            $update_package_product[$i]['qty'] = $input[$i]['qty'];
            $update_package_product[$i]->save();

        }
        return $update_package_product;
    }
}
