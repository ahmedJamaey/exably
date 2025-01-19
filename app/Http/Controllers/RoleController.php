<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest\StoreRoleRequest;
use App\Http\Requests\RoleRequest\UpdateRoleRequest;
use App\Http\Resources\V1\RoleResource\RoleCollection;
use App\Http\Resources\V1\RoleResource\RoleResource;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index(): RoleCollection
    {
        Gate::authorize('viewAny', Role::class);

        return new RoleCollection(Role::query()->get());

    }

    public function store(StoreRoleRequest $request): JsonResponse
    {
        Gate::authorize('create', Role::class);

        $role = Role::query()->create($request->validated());

        return response()->json([
            'message' => 'Role added successfully',
            'data' => new RoleResource($role)
        ], 201);
    }

    public function update(UpdateRoleRequest $request, string $id): JsonResponse
    {
        Gate::authorize('update', Role::class);

        $role = Role::query()->findOrFail($id);

        $role->update($request->validated());

        return response()->json([
            'message' => 'Role updated successfully',
            'data' => new RoleResource($role)
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        Gate::authorize('delete', Role::class);

        $role = Role::query()->findOrFail($id);

        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully',
        ], 200);
    }
}
