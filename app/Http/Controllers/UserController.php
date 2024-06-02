<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::with('role')->get();

        return view('admin.dashboard', compact('users'));
    }

    public function create(){

        return view('admin.create');
    }

    public function edit(){

        //returns a view
    }
}
