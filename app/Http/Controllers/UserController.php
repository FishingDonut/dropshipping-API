<?php

namespace App\Http\Controllers;

use App\Services\UserService as Service;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Response;
use Exception;

class UserController extends Controller
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
    public function store(StoreUserRequest $request)
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

    public function update(UpdateUserRequest $request, $id)
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
