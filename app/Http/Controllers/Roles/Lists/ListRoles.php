<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 12/10/2020
 * Time: 7:31 PM
 */

namespace App\Http\Controllers\Roles\Lists;
use App\Agent_levels;
use App\Http\Resources\AgentLevels as AgentLevelsResources;
use Illuminate\Support\Facades\DB;

class ListRoles
{
    /** @var  Agent_levels */
    private $repository;

    /**
     * ListState constructor.
     * @param States $repository
     */
    public function __construct(Agent_levels $repository)
    {
        $this->repository = $repository;
    }


    public function list()
    {
        $data = $this->repository->get();

        return AgentLevelsResources::collection($data);
    }

    public function listExcludeHQ()
    {
        $data = $this->repository->whereNotNull('parent')->get();

        return AgentLevelsResources::collection($data);
    }

    public function listAgentLevel()
    {
        $data = $this->repository->whereNotNull('parent')->get();

        return response()->json($data);
    }

    public function listParentName()
    {
        $data = $this->repository->latest()->get('name');
        return response()->json($data);
    }

    public function AgentDropdownList($product_id)
    {
        $data = DB::select(DB::raw("select DISTINCT agent_levels.id,agent_levels.name from
                                      agent_levels,roles_price where agent_levels.parent != '' AND agent_levels.id
                                      NOT IN (select roles_price.agent_levels_id from roles_price where product_id = :product_id)"),
            array(
            'product_id' => $product_id,
        ));

        return response()->json($data);
    }
}