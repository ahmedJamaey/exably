<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->apiResource('users', UserController::class);
Route::prefix('v1')->apiResource('roles', RoleController::class);
Route::apiResource('permissions', PermissionController::class);
