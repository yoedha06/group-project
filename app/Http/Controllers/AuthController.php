<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }


    public function doLogin(Request $request)
{
    // Validate the user's input
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect to the intended URL or the default dashboard route
        return to_route('dashboard');
    } else {
        return back()->withErrors([
            'email' => 'Wrong email or password',
        ]);
    }
}
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->regenerate();

    return to_route('login');
}
        }
