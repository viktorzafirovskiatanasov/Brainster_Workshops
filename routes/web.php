<?php

use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('color.red');
});

Route::get('/red', [ColorController::class, 'red'])->name('color.red');
Route::get('/green', [ColorController::class, 'green'])->name('color.green');
Route::get('/blue', [ColorController::class, 'blue'])->name('color.blue');

// Route::get('/{color}', [ColorController::class, 'dynamicMethod'])->name('color.dynamic');
