<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        // dd($admin->password);
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                session()->put('admin_id', $admin->id);
                return redirect()->route('companies.index');
            }
        }
        return redirect()->back();
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('auth.index');
    }
}
