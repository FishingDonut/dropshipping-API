<?php

namespace App\Http\Controllers;

use App\Services\FieldValuesService as Service;
use App\Http\Requests\UpdateFieldValuesRequest;
use App\Http\Requests\StoreFieldValuesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Exception;

class FieldValuesController extends Controller
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

    public function store(UpdateFieldValuesRequest $request)
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


    public function update(UpdateFieldValuesRequest $request, $id)
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
