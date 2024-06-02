<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticationController;

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
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/test', function () {
   dd( Auth::user());
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('login', [AuthenticationController::class, 'index'])->name('login.index');
Route::post('login', [AuthenticationController::class, 'login']);


Route::get('/email/verify/{user}/{hash}', function(User $user, string $hash, Request $request){
    //check the URL signature
    if(!$request->hasValidSignature()){
        abort(419);
    }

    //get the user from the database & check the hash
    if(hash_equals(sha1($user->email), $hash)){      
        $user->status = 1;
        $user->save();

        return redirect()->route('login.index');
    }
    return redirect()->to('register');
})->name('verify.email');