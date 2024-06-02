<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile($name = 'default name', $address = 'default address', $email = 'default email'){
        echo 'On ProfileController -> showProfile method<br>';
        return view('profiles.profile', compact('name', 'address', 'email'));
    }

    public function showMyProfile(){
        echo 'On ProfileController -> showMYProfile method<br>';
        return redirect()->route('profile.personal', ['name' => 'Filip', 'address' => 'my_address', 'email' => 'my_email@mail.com']);
    }
}
