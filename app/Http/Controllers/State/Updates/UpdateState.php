<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:13 PM
 */

namespace App\Http\Controllers\State\Updates;

use App\States;
use App\Http\Resources\State as StateResources;
use Illuminate\Http\Request;

class UpdateState
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


    public function update(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        $data->country_id = $request->input('country_id');
        $data->name = $request->input('name');
        $data->shortcode = $request->input('shortcode');
        $data->quota = $request->input('quota');
        $data->total = $request->input('total');

        if($data->save()){
            return $data;
        }
    }
}