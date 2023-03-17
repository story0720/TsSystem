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
        $data = FactoryCategory::orderBy('ca_id', 'asc')->get();
        return view("Factory.category.index", ['category' => $data]);
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
        $data = new FactoryCategory();
        $data->ca_Name = $request->Name;
        $data->ca_Memo = $request->Memo;
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
    public function edit(FactoryCategory $factoryCategory, $id)
    {
        $edit = FactoryCategory::find($id);
        return view("Factory.category.edit", ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryCategory  $factoryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Category $request, $id)
    {
        $data = FactoryCategory::find($id);
        $data->ca_Name = $request->Name;
        $data->ca_Memo = $request->Memo;
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
            $result = FactoryCategory::find($id)->delete();
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
