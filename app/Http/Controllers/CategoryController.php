<?php

namespace App\Http\Controllers;

use App\Services\CategoryService as Service;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $response = $this->service->getAll();

            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $response = $this->service->store($request);

            return response()->json($response, Response::HTTP_CREATED);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    public function show($email)
    {
        try {
            $response = $this->service->findOne($email);

            if (!$response) {
                return response()->json("Not Found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }
    }


    public function update(Request $request, $id)
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
    }}
