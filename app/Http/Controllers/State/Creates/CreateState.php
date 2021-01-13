<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:12 PM
 */

namespace App\Http\Controllers\State\Creates;

use App\States;
use App\Http\Resources\State as StateResources;
use Illuminate\Http\Request;


class CreateState
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


    public function create(Request $request)
    {
        $model = $this->repository->create([
            'country_id' => 1,
            'name' => $request->input('name'),
            'shortcode' => $request->input('shortcode'),
            'quota' => $request->input('quota'),
            'total' => $request->input('total'),
        ]);

        return $model;
    }
}