<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{user}', [UserController::class, 'destroy']);

//Instructions to enable auth:sanctum middleware

// 1. config -> cors.php - change support credentials to true 
// 2. config -> auth.php add following code to guards
// 'guards' => [
//     'web' => [
//         'driver' => 'session',
//         'provider' => 'users',
//     ] ,
//     'api' => [
//         'driver' => 'token',
//         'provider' => 'users',
//         'hash' => false,
//     ]
// ],
//3. Http -> Kernel.php 
//uncomment \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,