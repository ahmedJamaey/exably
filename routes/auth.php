<?php

use App\Http\Controllers\Api\V1\Auth\VerifyEmailController;
//use App\Http\Controllers\Api\V1\Auth\EmailVerificationNotificationController;
//use App\Http\Controllers\Api\V1\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Api\V1\Auth\EmailVerificationNotificationController;
use Illuminate\Support\Facades\Route;



Route::get('/verify-email/{id}/{hash}', EmailVerificationNotificationController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

//Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//    ->middleware(['auth', 'throttle:6,1'])
//    ->name('verification.send');
Route::post('/email-resend', [VerifyEmailController::class, '__invoke']);
