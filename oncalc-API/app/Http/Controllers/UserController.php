<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request) {

        $user = new User;
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));

        if(User::where('name', '=', $request->input('name'))->exists()) {

            return response()->json([
                'message' => 'Username already exists!'
            ]);
        }
            $user->save();
            return $request->input();

    }

    function login(Request $request) {

        $user = User::where('name', $request->name)->first();


        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Check your password and username and try again!'
            ]);
        }

        return $user;

    }
}
