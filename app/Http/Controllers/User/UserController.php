<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUpdateProfile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'password' => 'nullable|confirmed',
            'old_password' => 'required_with:password',
            'address' => 'required',
            'telp' => 'required'
        ]);

        $user = $request->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->telp = $request->telp;

        if($request->filled('password')) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'Password lama tidak benar')->withInput();
            }
        }
        Auth::logout();
        return redirect(route('login'))->with('success', 'Sukses update profile');
    }
}
