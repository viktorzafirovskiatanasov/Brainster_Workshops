<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    //
    public function login(){
        return view('user.login');
    }

    // 1 Using manual validation
    // public function customValidate(Request $request){
    //     $username = $request->input('username');
    //     $password = $request->input('password');
    //     // dd($request->except('_token'));
    //     if(!$this->checkLength($username, 6) || !$this->hasNumber($username)){
    //         return redirect()->route('login.error');
    //     }
    //     if(!$this->checkLength($password, 8) || !$this->hasNumber($password) || !$this->hasCapitalLetter($password)){
    //         return redirect()->route('login.error');
    //     }
    //     return redirect()->route('login.success');
    // }

    // 2 Using validation from default Request
    // public function customValidate(Request $request){


    //     // $username = $request->input('username');
    //     // $password = $request->input('password');
    //     // dd($request->except('_token'));

    //     $request->validate([
    //         'username' => 'required|min:6|regex:/[0-9]+/',
    //         'password' => 'required|min:8|regex:/[A-Z]+/'
    //     ]);
    //     $request->validate([
    //         'username' => ['required', 'min:6', 'regex:/[0-9]+/'],
    //         'password' => 'required|min:8|regex:/[A-Z]+/'
    //     ]);
       
    //     return redirect()->route('login.success');
    // }


    // 3 Using validation custom made request
    public function customValidate(LoginRequest $request){
        $username = $request->input('username');
        $request->session()->put('username', $username);
        $request->session()->put('logged_in', true);
        return redirect()->route('login.success');
    }
    
    public function success(Request $request){
        // $username = 'johnDoe';


        $username1 = $request->session()->get('username');
        $login1 = $request->session()->get('logged_in');

        // $username2 = session('username');
        // $login2 = session('logged_in');


        // dd($username1, $login1, $username2, $login2);
        return view('user.success', ['username' => $username1]);
    }

    public function error(){
        return view('user.error');
    }

    // private function checkLength(string $string, int $length): bool{
    //     return strlen($string) >= $length;
    // }

    // private function hasCapitalLetter(string $string): bool{
    //     return preg_match('/[A-Z]+/', $string);
    // }

    // private function hasNumber(string $string): bool{
    //     return preg_match('/[0-9]+/', $string);
    // }

    public function session(Request $request){
        $data = $request->session()->all();
        dd($data);
    }

    public function clear(Request $request){
        $request->session()->flush();
        // dd(session('key'));
    }
}
