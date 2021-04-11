<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 16/10/2020
 * Time: 11:19 AM
 */

namespace App\Http\Controllers\Product\Lists;

use App\Http\Resources\Product as ProductResources;
use App\Product;
use App\Package;
use App\Packages_type;
use App\Http\Resources\PackagesType as PackageResources;
use App\Http\Resources\Package as PackageProductResources;

class ListPackage
{
    /** @var  Packages_type */
    private $package;

    /** @var  Package */
    private $package_product;

    /** @var  Product */
    private $product;

    /**
     * ListProduct constructor.
     * @param Packages_type $package
     * @param Package $package_product
     * @param Product $product
     */
    public function __construct(Packages_type $package, Package $package_product, Product $product)
    {
        $this->package = $package;
        $this->package_product = $package_product;
        $this->product = $product;
    }


    public function list()
    {
        $data = $this->package->where('status', 'On')->latest()->get();

        return PackageResources::collection($data);
    }

    public function listProduct()
    {
        $data = $this->product->where('status', 'On')->get();

        return ProductResources::collection($data);
    }

    public function PackageDetails($id)
    {
        $data = $this->package->find($id);

        return new PackageResources($data);
    }

    public function PackageProductDetails($id)
    {
        $data = $this->package_product->where('packages_type_id', $id)->get();

        return PackageProductResources::collection($data);
    }

    public function listPackageProductDetails($id)
    {
        $product = $this->listProduct();

        $package = $this->package_product->where('packages_type_id', $id)->get();

        $ListPackage = array();
        foreach($package as $key)
        {
            $ListPackage[] = array(
                'packages_type_id' => $key['packages_type_id'],
                'product_id' => $key['product_id'],
                'retail_price' => $key['retail_price'],
                'ss_retail_price' => $key['ss_retail_price'],
                'qty' => $key['qty'],
            );
        }
        $ListProduct = array();
        foreach($product as $data)
        {
            $ListProduct[] = array(
                'packages_type_id' => '',
                'qty' => 0,
                'product_id' => $data['id'],
                'product_name' => $data['name'],
                'retail_price' => 0,
                'ss_retail_price' => 0,
            );
        }

//        return $ListProduct;
        $final =$ListProduct;
        foreach ($ListPackage as $value) {
            $flag = 0;
            foreach ($final as $key => $data) {
                // Check for date, size and type
                if ($data['product_id']===$value['product_id']) {
//                    $final[$key]['retail_price'] = $value['retail_price'];
                    $final[$key]['retail_price'] = $value['retail_price'];
                    $final[$key]['ss_retail_price'] = $value['ss_retail_price'];
                    $final[$key]['qty'] = $value['qty'];
                    $flag = 1;
                    break;
                }
            }
            if ($flag === 0) {
                array_push($final, $value);
            }
        }



//        return $list_product[0]['id'];

//        return $list_package_product[0]['product_id']['id'];
//        $list_package_product_details = array();
//        foreach($list_package_product as $a)
//        {
//            $list_package_product_details [] = array(
//              'packages_type_id' => $a['packages_type_id'],
//              'product_id' => $a['product_id'],
//              'retail_price' => $a['retail_price'],
//              'ss_retail_price' => $a['ss_retail_price'],
//              'qty' => $a['qty'],
//            );
//        }
//
//        $list_product_details = array();
//        foreach($list_product as $b)
//        {
//            $list_product_details [] = array(
//                'packages_type_id' => '',
//                'qty' => 0,
//                'product_id' => $b['id'],
////                'product_name' => $b['name'],
//                'retail_price' => $b['retail_price'],
//                'ss_retail_price' => $b['ss_retail_price'],
//            );
//        }
//
////        return $list_package_product_details;
//
//        $listing = $list_package_product_details;
//        foreach($list_product_details as $c)
//        {
//            $flag = 0;
//            foreach($listing as $list_package_products => $list_products)
//            {
//                if ($list_products['product_id']['id'] === $c['product_id'])
//                {
//                    $listing[$list_package_products]['retail_price'] = $c['retail_price'];
//                    $listing[$list_package_products]['ss_retail_price'] = $c['ss_retail_price'];
//                    $listing[$list_package_products]['qty'] = $c['qty'];
//                    $flag = 1;
//                    break;
//                }
//                if ($flag === 0)
//                {
//                    array_push($listing, $c);
//                }
//            }
//
//        }
//
//        return $listing ;

        $object = json_decode(json_encode($final), false);
        return PackageProductResources::collection($object);
    }

}
