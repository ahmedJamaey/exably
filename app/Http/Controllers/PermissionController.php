<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest\StorePermissionRequest;
use App\Http\Requests\PermissionRequest\UpdatePermissionRequest;
use App\Http\Resources\V1\PermissionResource\PermissionCollection;
use App\Http\Resources\V1\PermissionResource\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return new PermissionCollection(Permission::query()->get());
    }

    public function store(StorePermissionRequest $request)
    {
        $query = Permission::create($request->validated());

        return response()->json([
            'message' => 'permission added successfully',
            'data' => new PermissionResource($query)
        ], 201);
    }

    public function update(UpdatePermissionRequest $request, string $id)
    {
        $query = Permission::findOrFail($id);

        $query->update($request->validated());

        return response()->json([
            'message' => 'Permission updated successfully',
            'data' => new PermissionResource($query)
        ], 200);
    }

    public function destroy(string $id)
    {
        $role = Permission::findOrFail($id);
        
        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully',
        ], 200);
    }
}
