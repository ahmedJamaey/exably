<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest\StoreRoleRequest;
use App\Http\Requests\RoleRequest\UpdateRoleRequest;
use App\Http\Resources\V1\RoleResource\RoleCollection;
use App\Http\Resources\V1\RoleResource\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return new RoleCollection(Role::query()->get());
        
    }

    public function store(StoreRoleRequest $request)
    {

        $query = Role::create($request->validated());

        return response()->json([
            'message' => 'Role added successfly',
            'data' => new RoleResource($query)
        ], 201);
    }

    public function update(UpdateRoleRequest $request, string $id)
    {
        $query = Role::findOrFail($id);

        $query->update($request->validated());

        return response()->json([
            'message' => 'Role updated successfully',
            'data' => new RoleResource($query)
        ], 200);
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        
        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully',
        ], 200);
    }
}
