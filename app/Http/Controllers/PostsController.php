<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{
    //

    public function create(){
        return view('create');
    }

    public function show(Request $request){
        $data = $request->except('_token');
        $now = Carbon::now();
        $date = $now->toDateTimeString();
        return view('show', ['data' => $data, 'date' => $date]);
    }

    // public function test(string $a, int $b): bool {
    //     return $a + $b;
    // }
}
