<?php

namespace App\Http\Controllers;

use App\Models\profilesekola;
use Illuminate\Http\Request;

class ProfilesekolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profilesekola  $profilesekola
     * @return \Illuminate\Http\Response
     */
    public function show(profilesekola $profilesekola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profilesekola  $profilesekola
     * @return \Illuminate\Http\Response
     */
    public function edit(profilesekola $profilesekola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profilesekola  $profilesekola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profilesekola $profilesekola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profilesekola  $profilesekola
     * @return \Illuminate\Http\Response
     */
    public function destroy(profilesekola $profilesekola)
    {
        //
    }
}
