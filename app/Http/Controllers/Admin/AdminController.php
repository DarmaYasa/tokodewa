<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminId = Auth::guard('admin')->user()->id;
        $admins = Admin::where('id', '!=', $adminId)->get();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
            'address' => 'required',
            'telp' => 'required',
        ]);

        $admin = Admin::create($validated);

        return redirect(route('admin.admins.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        abort(404);
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:8',
            'address' => 'required',
            'telp' => 'required',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->telp = $request->telp;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return redirect(route('admin.admins.index'))->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
            return redirect(route('admin.admins.index'))->with('success', 'Data berhasil dihapus');
        } catch (\Throwable$th) {
            return redirect(route('admin.admins.index'))->with('error', $th->getMessage());
        }
    }
}
