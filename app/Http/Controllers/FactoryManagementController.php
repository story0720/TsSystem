<?php

namespace App\Http\Controllers;

use App\Models\FactoryCategory;
use App\Models\FactoryManagement;
use Illuminate\Http\Request;
use Exception;

class FactoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FactoryManagement::orderby('mn_id', 'desc')->get();
        return view("Factory.management.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = FactoryCategory::all();
        return view("Factory.management.create", ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new FactoryManagement();
        $data->ca_id= $request->category;
        $data->mn_Name =$request->Name;
        $data->mn_Contact = $request->Contact;
        $data->mn_Tel1 = $request->Tel1;
        $data->mn_Tel2 = $request->Tel2;
        $data->mn_Fax = $request->Fax;
        $data->mn_Address = $request->Address;
        $data->mn_Memo = $request->Memo;
        $data->save();
        return redirect()->action([FactoryManagementController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactoryManagement  $factoryManagement
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryManagement $factoryManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryManagement  $factoryManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryManagement $factoryManagement,$id)
    {
        $category = FactoryCategory::all();
        $edit=FactoryManagement::find($id);
        return view('Factory.management.edit',['edit'=>$edit,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryManagement  $factoryManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=FactoryManagement::find($id);
        $data->ca_id= $request->category;
        $data->mn_Name =$request->Name;
        $data->mn_Contact = $request->Contact;
        $data->mn_Tel1 = $request->Tel1;
        $data->mn_Tel2 = $request->Tel2;
        $data->mn_Fax = $request->Fax;
        $data->mn_Address = $request->Address;
        $data->mn_Memo = $request->Memo;
        $data->save();
        return redirect()->action([FactoryManagementController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryManagement  $factoryManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            FactoryManagement::find($id)->delete();
            return redirect()->action([FactoryManagementController::class, 'index']);
        }catch (Exception $e) {
            return "刪除失敗";
            //return $e->getMessage();
        }
    }
}
