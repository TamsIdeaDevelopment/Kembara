<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 11/10/2020
 * Time: 3:31 PM
 */

namespace App\Http\Controllers\State\Lists;

use App\States;
use App\Http\Resources\State as StateResources;

class ListState
{
    /** @var  States */
    private $repository;

    /**
     * ListState constructor.
     * @param States $repository
     */
    public function __construct(States $repository)
    {
        $this->repository = $repository;
    }


    public function list()
    {
        $data = $this->repository->latest()->get();

        return StateResources::collection($data);
    }

    public function listState()
    {
        $data = $this->repository->latest()->get();
        return $data;
        return response()->json($data);
    }

}

