<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-v2', [\App\Http\Controllers\DashboardV2Controller::class, 'index'])
        ->name('dashboard-v2');

    Route::get('/dashboard-v2/generate-token', function (Request $request) {
        if (!empty($request->token_name)) {
            $token = $request->user()->createToken($request->token_name);
            return ['token' => $token->plainTextToken];
        }

        return 'Please specify the token_name in url';
    });
});


require __DIR__ . '/auth.php';
