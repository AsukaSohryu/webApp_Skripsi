<?php

namespace App\Http\Controllers\frontEnd\profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        // dd($user);

        return view('frontEnd.pages.profile.detailProfile', [
            'user' => $user
        ]);
    }

    public function editShow(){

        $user = Auth::user();

        return view('frontEnd.pages.profile.editProfile',[
            'user' => $user
        ]);
    }

    public function editPost(Request $request){

        if($request->photo == null){

            $update = User::where('user_id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'whatsapp_number' => $request->whatsapp_number,
                'phone_number' => $request->phone_number,
                'job' => $request->job,
            ]);

            return redirect()->route('detail-profil')->with('success', 'Profile berhasil diubah');
        }
        else{
            // dd($request->id);

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,svg',
            ]);

            $profile_pic = $request->file('photo');
            $profile_pic_name = uniqid() . '.' . $profile_pic->getClientOriginalExtension();
            $path = $profile_pic->storeAs('profile', $profile_pic_name, 'public');


            $update = User::where('user_id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'whatsapp_number' => $request->whatsapp_number,
                'phone_number' => $request->phone_number,
                'job' => $request->job,
                'photo' => $profile_pic_name
            ]);

            return redirect()->route('detail-profil')->with('success', 'Profile berhasil diubah');
        }
    }

    public function editPasswordShow(){

        $user = Auth::user();

        return view('frontEnd.pages.profile.editPassword',[
            'user' => $user
        ]);
    }

    public function editPasswordPost(Request $request){

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password saat ini salah.');
        }

        // Update the user's password
        $update = User::where('user_id', $user->user_id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        if($update){
            return redirect()->route('detail-profil')->with('success', 'Password berhasil diubah.');
        }
        else{
            return redirect()->route('detail-profil')->with('error', 'Password gagal diubah.');
        }
    }
}
