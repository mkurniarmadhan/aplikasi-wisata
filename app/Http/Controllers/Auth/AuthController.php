<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login()
    {

        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (!Auth::user()->is_admin) return to_route('homepage.index');


            return to_route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function register()
    {

        return view('auth.register');
    }
    public function doRegister(Request $request)
    {


        $credentials = $request->validate([
            'namaLengkap' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required'],
            'alamat' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $u =    User::create($credentials);


        Auth::login($u);

        return to_route('homepage.index');
    }

    public function logout()
    {

        Auth::logout();

        return to_route('homepage.index');
    }
}
