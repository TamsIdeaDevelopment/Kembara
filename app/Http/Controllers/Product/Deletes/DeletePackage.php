<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 18/10/2020
 * Time: 6:22 PM
 */

namespace App\Http\Controllers\Product\Deletes;

use App\Package;
use App\Packages_type;

class DeletePackage
{
    /** @var  Package */
    private $package_product;

    /** @var  Packages_type */
    private $package;

    /**
     * DeletePackage constructor.
     * @param Package $package_product
     * @param Packages_type $package
     */

    public function __construct(Package $package_product, Packages_type $package)
    {
        $this->package_product = $package_product;
        $this->package = $package;
    }


    public function delete($id)
    {

        $delete_package = $this->package->findOrFail($id);

        $delete_package->status = 'Off';


        $delete_package_product = $this->package_product->where('packages_type_id', $delete_package->id)->get();

        $count = count($delete_package_product);


        for ($i = 0; $i < $count; $i++) {
            $delete_package_product[$i]['status'] = 'Off';
            $delete_package_product[$i]->save();
        }

        if($delete_package->save()){
            return $delete_package;
        }

    }
}
