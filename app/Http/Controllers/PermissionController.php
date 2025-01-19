<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest\StorePermissionRequest;
use App\Http\Requests\RoleRequest\UpdatePermissionRequest;
use App\Http\Resources\V1\RoleResource\PermissionCollection;
use App\Http\Resources\V1\RoleResource\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function index(): PermissionCollection
    {
        Gate::authorize('viewAny', Permission::class);

        return new PermissionCollection(Permission::query()->get());
    }

    public function store(StorePermissionRequest $request): JsonResponse
    {
        Gate::authorize('create', Permission::class);

        $permission = Permission::query()->create($request->validated());

        return response()->json([
            'message' => 'permission added successfully',
            'data' => new PermissionResource($permission)
        ], 201);
    }

    public function update(UpdatePermissionRequest $request, string $id): JsonResponse
    {
        Gate::authorize('update', Permission::class);

        $permission = Permission::query()->findOrFail($id);

        $permission->update($request->validated());

        return response()->json([
            'message' => 'Permission updated successfully',
            'data' => new PermissionResource($permission)
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        Gate::authorize('delete', Permission::class);

        $permission = Permission::query()->findOrFail($id);

        $permission->delete();

        return response()->json([
            'message' => 'Role deleted successfully',
        ], 200);
    }
}
