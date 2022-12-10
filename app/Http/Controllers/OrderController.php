<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processing;
use App\Models\FactoryManagement;
use App\Models\Order;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::all();
        return view('Order.index',['order'=>$order]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processing=Processing::all();
        $factoryManagement=FactoryManagement::all();
        return view('Order.create',['processing'=>$processing,'factoryManagement'=>$factoryManagement]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=new order();
        $order->mn_id=$request->TradeName;
        $order->pr_id=$request->CategoryName;
        $order->serialnumber=$request->SerialNumber;
        $order->materialdate=$request->Materialdate;
        $order->shipdate=$request->Shipdate;
        $order->estimatedquantity=$request->Estimatedquantity;        
        $order->unitprice=$request->Unitprice;
        $order->count=$request->Count;
        $order->memo=$request->Memo;

        $order->save();
        return redirect()->action([OrderController::class, 'index']);
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
        $order=Order::find($id);
        $processing=Processing::all();
        $factoryManagement=FactoryManagement::all();
        return View('Order.edit',['order'=>$order,'processing'=>$processing,'factoryManagement'=>$factoryManagement]);
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
        Order::destroy($id);
        return redirect()->action([OrderController::class, 'index']);
    }
}
