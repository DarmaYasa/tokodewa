<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showForm()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request  $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->user('admin')->id,
            'password' => 'nullable|confirmed',
            'old_password' => 'required_with:password,',
            'address' => 'required',
            'telp' => 'required'
        ]);

        $user = $request->user('admin');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->telp = $request->telp;

        if($request->filled('password')) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->withInput()->with('error', 'Password lama tidak benar');
            }
        }

        Auth::guard('admin')->logout();
        return redirect(route('admin.login'))->with('success', 'Sukses update profile, silahkan login kembali');
        // return redirect()->back()->with('success', 'Sukses update profile');
    }


}
