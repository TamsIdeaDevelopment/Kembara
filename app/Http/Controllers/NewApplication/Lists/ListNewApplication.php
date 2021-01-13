<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 15/10/2020
 * Time: 2:19 PM
 */

namespace App\Http\Controllers\NewApplication\Lists;


use App\Agent;
use App\Http\Resources\Agent as AgentResources;

class ListNewApplication
{

    /** @var  Agent */
    private $repository;

    /**
     * ListNewApplication constructor.
     * @param Agent $repository
     */
    public function __construct(Agent $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $data = $this->repository->where('status', 0)->latest()->get();

        return AgentResources::collection($data);
    }


}