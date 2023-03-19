<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consume\Restock as ConsumeRestock;
use App\Models\Consume;
use App\Models\FactoryCategory;
use App\Models\Restock;
use App\Models\FactoryManagement;
use Exception;
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
        $consume = Consume::all();                        //耗材名稱
        $FactoryManagement = FactoryManagement::all();    //耗材廠商名稱
        $factorycategory = factorycategory::all();      //耗材廠商種類
        return view('Consume.restock.create', ['consume' => $consume, 'FactoryManagement' => $FactoryManagement, 'factorycategory' => $factorycategory]);
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
            'mn_id' => $request->Factoryname,                      //廠商名稱id
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
        $consume = Consume::all();                        //耗材名稱
        $FactoryManagement = FactoryManagement::all();    //耗材廠商名稱
        $factorycategory = factorycategory::all();      //耗材廠商種類
        $edit = Restock::find($id);
        return view('Consume.restock.edit', ['edit' => $edit, 'consume' => $consume, 'category' => $factorycategory, 'factorycategory' => $factorycategory]);
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
        // dd($request->all());
        $data = Restock::find($id);
        $data->factorycategory_id = $request->caname;              //廠商種類
        $data->consume_id = $request->coname;                      //耗材名稱
        $data->mn_id = $request->Factoryname;                      //廠商名稱id
        $data->specification = $request->specification;            //耗材規格
        $data->re_date = $request->date;                           //進貨日期
        $data->re_quantity = $request->quantity;                   //進貨數量
        $data->re_unitprice = $request->unitprice;                 //進貨單價
        $data->re_count = $request->count;                         //小計
        $data->re_memo = $request->memo;                           //備註
        $data->save();

        return redirect()->action([RestockController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Restock::find($id)->delete();
            if ($data) {
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
    //查詢廠商的耗材規格
    public function Gettag(Request $request)
    {
        $data = Consume::find($request->id)->Tags;
        return response()->json($data);
    }
    //查詢廠商種類底下的名稱
    public function GetFactoryname(Request $request)
    {
        $data = FactoryManagement::where('ca_id', $request->id)->get();
        return response()->json($data);
    }
}
