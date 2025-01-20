<?php
namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\UserRequest\UpdateUserRequest;
use App\Http\Resources\V1\UserResource\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use AuthorizesRequests;

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
