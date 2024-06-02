<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Ex. 1
Route::get('/create', [PostsController::class, 'create']);
Route::post('/show',  [PostsController::class, 'show'])->name('show');

//Ex. 2, 3 & 4
Route::get('/users/login', [UserController::class, 'login']);
Route::post('/users/login/validate', [UserController::class, 'customValidate'])->name('login.valdiate');

Route::get('/users/login/success', [UserController::class, 'success'])->name('login.success');
Route::get('/users/login/error', [UserController::class, 'error'])->name('login.error');



Route::get('/session', [UserController::class, 'session']);
Route::get('/clear', [UserController::class, 'clear']);