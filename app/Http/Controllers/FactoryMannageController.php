<?php

namespace App\Http\Controllers;

use App\Models\FactoryMannage;
use Illuminate\Http\Request;
class FactoryMannageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('FactoryMannage.index');
        return view("FactoryMannage.index");
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
     * @param  \App\Models\FactoryMannage  $factoryMannage
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryMannage $factoryMannage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryMannage  $factoryMannage
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryMannage $factoryMannage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryMannage  $factoryMannage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactoryMannage $factoryMannage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryMannage  $factoryMannage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactoryMannage $factoryMannage)
    {
        //
    }
}
