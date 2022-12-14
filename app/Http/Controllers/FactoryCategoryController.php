<?php

namespace App\Http\Controllers;

use App\Http\Requests\Factory\Category;
use App\Models\FactoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Exception;

class FactoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=FactoryCategory::orderBy('ca_id')->get();
        return view("Factory.category.index",['category'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Factory.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $request)
    {
        $data=new FactoryCategory();
        $data->ca_Name=$request->name;
        $data->ca_Memo=$request->memo;
        $data->save();
        return redirect()->action([FactoryCategoryController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactoryCategory  $factoryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryCategory $factoryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryCategory  $factoryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryCategory $factoryCategory,$id)
    {
        $edit=FactoryCategory::find($id);
        return view("Factory.category.edit",['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryCategory  $factoryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Category $request,$id)
    {
        $data=FactoryCategory::find($id);
        $data->ca_Name=$request->name;
        $data->ca_Memo=$request->memo;
        $data->save();
        return redirect()->action([FactoryCategoryController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryCategory  $factoryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            FactoryCategory::find($id)->delete();
            return redirect()->action([FactoryCategoryController::class, 'index']);
        }catch (Exception $e) {
            return "????????????????????????????????????????????????????????????";
            //return $e->getMessage();
        }
    }
}
