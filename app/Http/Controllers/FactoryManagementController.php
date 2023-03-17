<?php

namespace App\Http\Controllers;

use App\Http\Requests\Factory\ManagementRequest;
use App\Models\Consume;
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
    public function store(ManagementRequest $request)
    {
        $data = new FactoryManagement();
        $data->ca_id = $request->category;
        $data->mn_Name = $request->name;
        $data->mn_Contact = $request->contact;
        $data->mn_Tel1 = $request->tel1;
        $data->mn_Tel2 = $request->tel2;
        $data->mn_Fax = $request->fax;
        $data->mn_Address = $request->address;
        $data->mn_Memo = $request->memo;
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
    public function edit(request $factoryManagement, $id)
    {
        $category = FactoryCategory::all();
        $edit = FactoryManagement::find($id);
        return view('Factory.management.edit', ['edit' => $edit, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryManagement  $factoryManagement
     * @return \Illuminate\Http\Response
     */
    public function update(ManagementRequest $request, $id)
    {
        $data = FactoryManagement::find($id);
        $data->ca_id = $request->category;
        $data->mn_Name = $request->name;
        $data->mn_Contact = $request->contact;
        $data->mn_Tel1 = $request->tel1;
        $data->mn_Tel2 = $request->tel2;
        $data->mn_Fax = $request->fax;
        $data->mn_Address = $request->address;
        $data->mn_Memo = $request->memo;
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
            $result=FactoryManagement::find($id)->delete();           
            if ($result) {
                $data = ['icon' => 'success', 'title' => '刪除成功!'];
                return response()->json($data, 200);
            } else {
                $data = ['icon' => 'warning', 'title' => '刪除失敗', 'text' => '可能有其他筆資料有關聯請再次檢查'];
                return response()->json($data);
            }
        } catch (Exception $e) {
            $data = ['icon' => 'error', 'title' => '刪除失敗', 'text' => '可能有其他筆資料有關聯請再次檢查'];
            return response()->json($data);
        }
    }
}
