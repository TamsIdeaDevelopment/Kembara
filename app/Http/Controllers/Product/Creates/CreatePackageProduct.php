<?php
/**
 * Created by PhpStorm.
 * User: snh
 * Date: 25/03/2021
 * Time: 11:03 PM
 */

namespace App\Http\Controllers\Product\Creates;


use App\Package;
use App\Packages_type;
use Illuminate\Http\Request;

class CreatePackageProduct
{

    /** @var  Package */
    private $repository;

    /** @var  Packages_type */
    private $packages_type;

    /**
     * CreatePackage constructor.
     * @param Package $repository
     * @param Packages_type $packages_type
     */
    public function __construct(Package $repository, Packages_type $packages_type)
    {
        $this->repository = $repository;
        $this->packages_type = $packages_type;
    }


    public function create(Request $request,$package_id)
    {
//        $packages_product = Packages_type::select('id')->where('name', $request->input('packages_type_id'))->get();

        $input = $request->all();
        $count = count($input);


        for ($i = 0; $i < $count; $i++) {
            $model[] = $this->repository->create([
                'status' => 'On',
                'packages_type_id' => $package_id,
                'product_id' => $input[0][$i]['id'],
                'retail_price' => $input[0][$i]['retail_price'],
                'ss_retail_price' => $input[0][$i]['ss_retail_price'],
                'qty' =>  $input[0][$i]['quantity'],
            ]);
        }
        return $model;
    }
}
