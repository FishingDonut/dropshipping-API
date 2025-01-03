<?php

namespace App\Services;

use App\Models\User as Model;
use Exception;

class UserService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    function store($request)
    {
        try {
            return $this->model->create($request->all());
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
}
