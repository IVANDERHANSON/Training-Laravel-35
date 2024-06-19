<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    function getRegister() {
        return view('register');
    }

    function getLogin() {
        return view('login');
    }

    function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        $credentials = ([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Cookie::queue('name', 'admin');
            $message = auth()->user()->name.' telah melakukan login!';
            Log::info($message);
            return redirect('/home');
        }
        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        Cookie::expire('name');
    
        return redirect('/home');
    }
}
