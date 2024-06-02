<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\RegisteredCustom;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        $userInput = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);

        // dd($userInput);

        $user = User::create($userInput);

        //fire an event for mail link verification
        RegisteredCustom::dispatch($user);

        return redirect('/');
    }
}
