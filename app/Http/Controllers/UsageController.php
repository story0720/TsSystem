<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consume\Restock;
use App\Http\Requests\Consume\Usage as ConsumeUsage;
use Illuminate\Http\Request;
use App\Models\Consume;
use App\Models\Restock as ModelsRestock;
use App\Models\Usage;
use Exception;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Usage::all();
        return view('Consume.usage.index', ['data' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_number = ModelsRestock::select('restock_order_number', 'id')->get();
        $data = Consume::orderby('id', 'desc')->get();
        return view('Consume.usage.create', ['data' => $data, 'order_number' => $order_number]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumeUsage $request)
    {
        //dd($request->all());
        $data = new Usage();
        $data->co_id = $request->coname;
        $data->tag_id = $request->specification;
        $data->quantity = $request->quantity;
        $data->receiver = $request->receiver;
        $data->memo = $request->memo;
        $data->getdate = now();
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
        try {
            $data = Usage::find($id)->delete();
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
    //給單號取得予耗材名稱、規格等資料
    public function GeData($id)
    {
        dd($id);
        // $data = ModelsRestock::select('id', 'restock_order_number')->where('id', $request->$id)->get();
        // return response()->json($request);
        return 123;
    }
}
