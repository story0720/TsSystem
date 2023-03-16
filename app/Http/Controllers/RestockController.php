<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consume\Restock as ConsumeRestock;
use App\Models\Consume;
use App\Models\FactoryCategory;
use App\Models\Restock;
use Illuminate\Http\Request;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Restock::orderby('id', 'desc')->get();
        return view('Consume.restock.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consume = Consume::all();               //耗材名稱
        $category = FactoryCategory::all();      //耗材廠商代號(1或2)
        return view('Consume.restock.create', ['consume' => $consume, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumeRestock $request)
    {
        // dd($request->all());
        Restock::FirstOrCreate([
            'factorycategory_id' => $request->caname,              //廠商種類
            'consume_id' => $request->coname,                      //耗材名稱
            'specification' => $request->specification,            //耗材規格
            're_date' => $request->date,                           //進貨日期
            're_quantity' => $request->quantity,                   //進貨數量
            're_unitprice' => $request->unitprice,                 //進貨單價
            're_count' => $request->count,                         //小計
            're_memo' => $request->memo,                           //備註
        ]);
        return redirect()->action([RestockController::class, 'index']);
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
        $consume = Consume::all();               //耗材名稱
        $category = FactoryCategory::all();      //耗材廠商代號(1或2)
        $edit = Restock::find($id);
        // dd($edit);
        return view('Consume.restock.edit', ['edit' => $edit, 'consume' => $consume, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsumeRestock $request, $id)
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
    //查詢廠商的耗材規格
    public function Gettag(Request $request)
    {
        $data = Consume::find($request->id)->Tags;
        return response()->json($data);
    }
}
