<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $redirect = 'admin.services.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.services.create', compact('users'));
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
            'user_id' => 'nullable',
            'date' => 'required',
            'name' => 'required_if:user_id,null',
            'address' => 'required_if:user_id,null',
            'telp' => 'required_if:user_id,null',
            'product' => 'required',
            'type' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);

        $service = Service::create($validated);
        return redirect(route($this->redirect))->with('succeess', 'Sukses menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //if($service->user == null) abort(404);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //if($service->user == null) abort(404);
        $users = User::all();
        return view('admin.services.edit', compact('service', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'user_id' => 'nullable',
            'date' => 'required',
            'name' => 'required_if:user_id,null',
            'address' => 'required_if:user_id,null',
            'telp' => 'required_if:user_id,null',
            'product' => 'required',
            'type' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);

        $service->update($validated);
        return redirect(route($this->redirect))->with('succeess', 'Sukses mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect(route($this->redirect))->with('succeess', 'Sukses mengedit data');
    }

    public function print(Service $service)
    {
        //if($service->user == null) abort(404);
        return view('admin.services.print', compact('service'));
    }
}
