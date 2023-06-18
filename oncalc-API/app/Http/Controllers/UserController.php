<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request) {

        $user = new Users;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return $request->input();
    }
}
