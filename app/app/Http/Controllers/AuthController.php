<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function daftar(){

        return view('auth.daftar');
    }

    public function daftarPost(Request $request){

        // Validate input
        $validated = $request->validate([
            'email' => 'required|email|unique:user,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'foto' => 'required|image|mimes:jpg,jpeg,png,svg',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'BOD' => 'required|date',
            'whatsapp' => 'required|string',
            'notelp' => 'required|string',
        ],[
            'email.unique' => "Email sudah terdaftar. Silahkan gunakan email lain atau masuk pada akun anda.",
            'foto.mimes' => "Mohon masukan format foto yang sesuai."
        ]);

        // Handle foto
        if ($request->hasFile('foto')) {
            $fotoUser = $request->file('foto');
            $fotoUserName = $fotoUser->getClientOriginalName();
            $fotoUser->move('uploadedImages/userProfile', $fotoUserName);

            
        } else {
            // Handle case where no file is uploaded
            return back()->withErrors(['foto' => 'Foto tidak boleh kosong.']);
        }

        // If validation fails, it will automatically return back with the errors.
        
        try {
            $otp = Str::random(6);
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
                'otp' => $otp
            ]);

            // If creation is successful, redirect to the login page with success message.
            return redirect()->route('masuk')->with('success', 'Akun berhasil dibuat. OTP anda adalah '.$otp);

        } catch (\Exception $e) {
            // Handle any errors during user creation (e.g., database issues)
            return back()->withErrors(['error' => 'Terjadi kesalahan. Gagal membuat akun.']);
        }
    }

    public function checkEmailDaftar(Request $request){

        $email = $request->input('email');
    
        // Check if the email already exists in the database
        $exists = User::where('email', $email)->exists();
        
        // Return response as JSON
        return response()->json([
            'isUnique' => !$exists  // If email exists, return false, else true
        ]);
    }

    public function checkFotoDaftar(Request $request){

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,gif,svg|max:2048', // Validate image file
        ]);

        return response()->json([
            'valid' => true
        ]);
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

    public function forgotPass(){

        return view('auth.reset-password');
    }

    public function checkEmail(Request $request)
    {
        // Validate email input
        $credentials = $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exists in the database
        $user = User::where('email', $request->email)->first();

        // If the user is not found, return with an error
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email Tidak Terdaftar!',
            ]);
        }

        // If the user exists, redirect to the OTP verification page
        return redirect()->route('cek-otp', ['email' => $request->email]);
    }

    public function checkOtp($email){

        return view('auth.reset-password-otp',
            ['email' => $email]
        );
    }

    public function postOtp(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->otp == $request->otp) {
            // OTP verified, show success message using SweetAlert
            return redirect()->route('change-pass', ['email' => $request->email])
                            ->with('status', 'OTP Terverifikasi, Lanjutkan Pengubahan Kata Sandi');
        }

        // OTP is invalid or expired
        return back()->withErrors(['otp' => 'OTP yang Anda Masukan Salah!']);
    }

    public function changePass($email){

        return view('auth.reset-password-final',
            ['email' => $email]
        );
    }

    public function postPass(Request $request){

        // Validate the input fields
        $request->validate([
            'password' => 'required|string|min:8',
            'passwordConf' => 'required|string|min:8|same:password', // Ensure password confirmation matches
        ]);

        // dd('tes');
        $otp = Str::random(6);
        // Get the user by email (assuming email is passed with the request)
        $user = User::where('email', $request->email)->first();

        // If the user is not found, return an error message
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar']);
        }

        // Update the user's password
        $update = $user->update([
            'password' => Hash::make($request->password), // Hash the new password
            'otp' => $otp,
        ]);

        // Check if the update was successful
        if ($update) {
            return back()->with('success', 'Kata Sandi Anda Berhasil Diubah! Berikut OTP Baru Anda: '.$otp);
        } else {
            return back()->withErrors(['error' => 'Terjadi kesalahan, gagal memperbarui kata sandi.']);
        }
    }

}
