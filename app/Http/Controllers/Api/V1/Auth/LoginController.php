<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($request->only(['email', 'password']))){
          $user = User::query()->where('email', $request->email)->first();
          $token = $user->createToken('authToken')->plainTextToken;
          return response()->json([
              'token' => $token,
          ]);
        } else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
