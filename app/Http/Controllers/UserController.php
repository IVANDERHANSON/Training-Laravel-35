<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required']
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return 'Register success.';
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return 'The provided credentials are incorrect.';
        }
     
        return $user->createToken($user->email)->plainTextToken;
    }
}
