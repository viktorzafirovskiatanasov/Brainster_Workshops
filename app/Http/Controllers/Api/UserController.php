<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $users = User::with('role')->where('name', 'LIKE', "%{$request->get('search')}%")->get();
            return response()->json(['success' => true, 'users' => $users]);
            // return response()->json($users);
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($user){
            return response()->json(['success' => true, 'message' => 'User: ' . $user->name . ' created successfuly']);
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // return response()->json(['message' => 'test']);
        $name = $user->name;
        if($user->delete()){
            return response()->json(['success' => true, 'message' => 'User: ' . $name . ' deleted successfuly']);
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong']);
    }
}
