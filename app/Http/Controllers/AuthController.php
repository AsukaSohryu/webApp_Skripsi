<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function daftar(){

        return view('auth.daftar');
    }

    public function daftarPost(Request $request){

        
    }

    public function masuk(){

        return view('auth.masuk');
    }

    public function masukPost(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'User') {
                return redirect()->route('');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
