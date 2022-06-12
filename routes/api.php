<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AlbumController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\V1\UserController;

/*
|-----------------------------------------------------------------:"


| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// protected route..

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {

    // protected route based on sanctum token and ability....

    /**
     * $token = $user->createToken($request->token_name ?? $request->email, ['user.show','user.index']);
     * return response(['token' => $token->plainTextToken]);
     */
    /*
    Route::middleware(['auth:sanctum', 'abilities:user.index,user.show,user.delete'])->group(function(){
       Route::apiResource('user', UserController::class);
    });*/

    Route::middleware(['auth:sanctum', 'ability:user.index,user.show,user.delete'])->group(function () {
        Route::apiResource('user', UserController::class);
        Route::post('user/logout', [UserController::class, 'logout']);
    });

    Route::post('user/store', [UserController::class, 'store']);
    Route::post('user/login', [UserController::class, 'login']);


});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('album', AlbumController::class);
        Route::apiResource('todo', TodoController::class);
    });
});

Route::middleware(['throttle:my_rate_limiter_name'])->group(function () {
    Route::get('/', function (Request $request) {
        return uniqid();
    });
});


Route::get('/test/{mobile}/{message}', function (string $mobile, string $message, \App\Services\SmsService $smsService) {

    $smsService->send($mobile, $message);
    return [$mobile, $message];
});

