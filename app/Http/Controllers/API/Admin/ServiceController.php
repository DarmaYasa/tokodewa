<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
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
        $services = Service::with('user')->get();

        return response($services);
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
        $service->load('user');
        return response($service, 201);
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
        $service->load('user');
        return response($service);
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
        $service->load('user');
        return response($service, 201);
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

        return response(null, 204);
    }
}
