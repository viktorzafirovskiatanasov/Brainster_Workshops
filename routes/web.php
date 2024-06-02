<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    return 'welcome';
});

// Route::get('/profile/{name}', function (){
//     return view('profiles.profile', compact('name'));
// });

Route::get('/profile/me', [ProfileController::class, 'showMyProfile']);

Route::get('/profile/{name?}/{address?}/{email?}', [ProfileController::class, 'showProfile'])->name('profile.personal');


