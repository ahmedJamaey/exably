<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;
use App\Http\Resources\V1\UserResource\UserCollection;
use App\Http\Resources\V1\UserResource\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function index(): UserCollection
    {
        Gate::authorize('viewAny', User::class);

        return new UserCollection(User::query()->get());
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        Gate::authorize('create', User::class);

        $user = User::query()->create($request->validated());

        return response()->json([
            'message' => 'User added successfully',
            'data' => new UserResource($user),
        ], 201);
    }

    public function update(UpdateUserRequest $request, $id): JsonResponse
    {
        Gate::authorize('update', User::class);

        $user = User::query()->findOrFail($id);

        $user->update($request->validated());

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        Gate::authorize('delete', User::class);
        $user = User::query()->findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }

}
