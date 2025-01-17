<?php

namespace App\Http\Controllers;

use App\Services\ProductService as Service;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Response;
use Exception;

class ProductController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $response = $this->service->getAll();

            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $response = $this->service->store($request);

            return response()->json($response, Response::HTTP_CREATED);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $response = $this->service->findOne($id);

            if (!$response) {
                return response()->json("Not Found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $response = $this->service->update($request->all(), $id);

            if (!$response) {
                return response()->json("Not Found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json($response, Response::HTTP_NO_CONTENT);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $response = $this->service->delete($id);

            if (!$response) {
                return response()->json("Not Found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json($response, Response::HTTP_NO_CONTENT);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }
}
