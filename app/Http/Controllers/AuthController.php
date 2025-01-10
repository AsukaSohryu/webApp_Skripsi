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

        // Handle foto
        if ($request->hasFile('foto')) {
            $fotoUser = $request->file('foto');
            $fotoUserName = $fotoUser->getClientOriginalName();
            $fotoUser->move('uploadedImages/userProfile', $fotoUserName);

            
        } else {
            // Handle case where no file is uploaded
            return back()->withErrors(['foto' => 'Foto tidak boleh kosong.']);
        }

        // Validate input
        $validated = $request->validate([
            'email' => 'required|email|unique:user,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'BOD' => 'required|date|before:today',
            'whatsapp' => 'required|string',
            'notelp' => 'required|string',
        ]);

        // If validation fails, it will automatically return back with the errors.
        
        try {
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

            // If creation is successful, redirect to the login page with success message.
            return redirect()->route('masuk')->with('success', 'Akun berhasil dibuat.');

        } catch (\Exception $e) {
            // Handle any errors during user creation (e.g., database issues)
            return back()->withErrors(['error' => 'Terjadi kesalahan. Gagal membuat akun.']);
        }
    }

    public function masuk(){

        return view('auth.masuk');
    }

    public function masukPost(Request $request){

        // Validate the input fields
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
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

        // Check if email exists in the database
        $user = User::where('email', $request->email)->first();
        
        // Return specific error messages based on the cause
        if ($user && !hash::check($request->password, $user->password)) {
            // Password does not match
            return back()->withErrors([
                'password' => 'The provided password does not match our records.',
            ]);
        } elseif (!$user) {
            // Email does not exist
            return back()->withErrors([
                'email' => 'The provided email address does not match our records.',
            ]);
        }
        // Default error if email and password don't match
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
