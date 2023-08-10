<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;


class UserController extends Controller
{
    //
    function signupUser(Request $req) {

        $user = new User();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();

        $token = sha1(time());
        // Redis::set('token:' . $token, $user->id);

        return [
            'user' => $user,
            'token' => $token,
        ];

        // $token = $user->createToken('main')->plainTextToken;
    
    }

    function signUserIn(Request $req) {


        $email = $req->input('email');
        $password = $req->input('password');

        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            // return 'Invalid email or password';
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Str::random(60);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

}

