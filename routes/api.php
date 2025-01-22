<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\Auth\VerifyEmailController;
use App\Http\Controllers\Api\V1\Auth\ResetPasswordController;
use App\Http\Controllers\Api\V1\Auth\EmailVerificationNotificationController;
use Illuminate\Support\Facades\Route;


Route::post('/login', loginController::class)
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);

Route::post('/email-resend', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth:sanctum');
Route::post('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware('auth:sanctum');


