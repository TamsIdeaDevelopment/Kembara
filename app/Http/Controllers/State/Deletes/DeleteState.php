<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 14/10/2020
 * Time: 5:12 PM
 */

namespace App\Http\Controllers\State\Deletes;

use App\States;
use App\Http\Resources\State as StateResources;


class DeleteState
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


    public function delete($id)
    {
        $data = $this->repository->findOrFail($id);

        if($data->delete()){

            return $data;
        }
    }
}