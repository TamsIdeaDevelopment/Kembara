<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\Territory\Deletes;


use App\Territories;
use App\Http\Resources\Territory as TerritoryResources;

class DeleteTerritory
{
    /** @var  Territories */
    private $repository;

    /**
     * ListState constructor.
     * @param States $repository
     */
    public function __construct(Territories $repository)
    {
        $this->repository = $repository;
    }


    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return $data;
        }
    }
}