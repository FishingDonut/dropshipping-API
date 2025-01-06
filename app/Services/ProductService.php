<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product as Model;
use Exception;

class ProductService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    function getAll()
    {
        try {
            return $this->model->all();
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
    function findOne($id)
    {
        try {
            return $this->model->where('id', $id)->first();
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    function update($request, $id)
    {
        try {
            $response = $this->model->where('id', $id)->first();

            if (!$response) {
                return null;
            }

            return $response->update($request);
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    function store(StoreProductRequest $request)
    {
        try {
            return $this->model->create($request->all());
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
    function delete($id)
    {
        try {
            $response = $this->model->where('id', $id)->first();
            if (!$response) {
                return null;
            }
            return $response;
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
}
