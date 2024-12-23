<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function daftar(){

        return view('auth.daftar');
    }

    public function daftarPost(Request $request){

        // dd($request->all());

        // Handle fotoHewan
        $fotoUser = $request->file('foto');
        $fotoUserName = uniqid() . '.' . $fotoUser->getClientOriginalExtension();
        $fotoUser->storeAs('user-photos', $fotoUserName, 'public');

        // Validate input
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'BOD' => 'required',
            'whatsapp' => 'required',
            'notelp' => 'required',
        ]);

        // Create user
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'address' => $request->alamat,
            'job' => $request->pekerjaan,
            'birth_date' => $request->BOD,
            'whatsapp_number' => $request->whatsapp,
            'phone_number' => $request->notelp,
            'photo' => $fotoUserName,
        ]);

        return redirect()->route('masuk')->with('success', 'Akun berhasil dibuat.');
    }

    public function masuk(){

        return view('auth.masuk');
    }

    public function masukPost(Request $request){
        
        // dd('tes');

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
                return redirect()->route('home'); 
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
