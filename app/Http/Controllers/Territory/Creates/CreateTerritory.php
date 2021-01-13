<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\Territory\Creates;

use App\Territories;
use App\Http\Resources\Territory as TerritoryResources;
use Illuminate\Http\Request;

class CreateTerritory
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

    public function create(Request $request)
    {
        $model = $this->repository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quota' => $request->input('quota'),
            'status' => $request->input('status'),
            'state' => $request->input('state'),
            'total' => $request->input('total'),
        ]);

        return $model;
    }
}