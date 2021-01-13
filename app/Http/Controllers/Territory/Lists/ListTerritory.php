<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 12/10/2020
 * Time: 1:13 AM
 */

namespace App\Http\Controllers\Territory\Lists;


use App\Territories;
use App\Http\Resources\Territory as TerritoryResources;

class ListTerritory
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


    public function list()
    {
        $data = $this->repository->latest()->get();

        return TerritoryResources::collection($data);
    }
    public function listTerritory()
    {
        $data = $this->repository->latest()->get();
        //return $data;
        return response()->json($data);
    }

    public function listTerritoryUnderState($id)
    {
        $data = $this->repository->where('state', $id)->get();
        //return $data;
        return response()->json($data);
    }
}