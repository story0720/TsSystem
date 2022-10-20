<?php

namespace App\Http\Controllers;

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
        $consume = Consume::all();
        $category = FactoryCategory::all();      //耗材廠商代號(1或2)
        return view('Consume.restock.create', ['consume' => $consume, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restock::FirstOrCreate([
            'factorycategory_id'=>$request->CaName,              //廠商種類
            'consume_id'=>$request->CoName,                      //耗材名稱
            're_date'=>$request->Date,                           //進貨日期
            're_quantity'=>$request->Quantity,                   //進貨數量
            're_unitprice'=>$request->UnitPrice,                 //進貨單價
            're_count'=>$request->Count,                         //小計
            're_memo'=>$request->Memo,                           //備註
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
