<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:14 PM
 */

namespace App\Http\Controllers\Territory\Updates;

use App\Territories;
use App\Http\Resources\Territory as TerritoryResources;
use Illuminate\Http\Request;

class UpdateTerritory
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


    public function update(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->quota = $request->input('quota');
        $data->status = $request->input('status');
        $data->state = $request->input('state');
        $data->total = $request->input('total');

        if($data->save()){
            return $data;
        }
    }
}