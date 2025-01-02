<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;
use App\Http\Resources\V1\UserResource\UserCollection;
use App\Http\Resources\V1\UserResource\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return new UserCollection(User::get());
        // return new UserCollection(User::where('gender', 'male')->get());

    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'User added successfuly',
            'data' => new UserResource($user)
        ], 201);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id); 

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }
}
