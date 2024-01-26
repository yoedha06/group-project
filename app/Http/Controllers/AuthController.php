<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();


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

        return to_route('dashboard');
    }



    public function register()
    {
        return view('Auth.register');
    }

    public function doRegister(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'role' => 'required|in:admin,user', // Menambahkan validasi untuk role
    ]);

    // Simpan user baru ke dalam database dengan role yang dipilih
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role' => $data['role'], // Menggunakan role yang dipilih pada formulir
    ]);

    // Login user setelah berhasil mendaftar
    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Registration successful! Welcome to our application.');
}

}




