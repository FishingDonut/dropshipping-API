<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService as Service;
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
            return $this->service->getAll();
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
            return $this->service->store($request);
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
            return $this->service->findOne($id);
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
            return $this->service->update($request->all(), $id);
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
            return $this->service->delete($id);
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }    }
}
