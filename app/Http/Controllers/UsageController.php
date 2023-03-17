<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consume\Usage as ConsumeUsage;
use Illuminate\Http\Request;
use App\Models\Consume;
use App\Models\Usage;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=Usage::all();
        return view('Consume.usage.index',['data'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Consume::orderby('id', 'desc')->get();
        return view('Consume.usage.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumeUsage $request)
    {
        // dd($request->all());
        $data=new Usage();
        $data->co_id=$request->standardname;
        $data->tag_id=$request->specification;
        $data->quantity=$request->quantity;
        $data->receiver=$request->receiver;
        $data->memo=$request->memo;
        $data->getdate=now();
        $data->save();
        return redirect()->action([UsageController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsumeUsage $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
