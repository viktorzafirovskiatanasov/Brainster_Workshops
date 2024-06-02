<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function red()
    {
        return view('ex1.red');
    }

    public function green()
    {
        return view('ex1.green');
    }

    public function blue()
    {
        return view('ex1.blue');
    }  
    
    // public function dynamicMethod($color)
    // {
    //     return 'on blue';
    // } 
}
