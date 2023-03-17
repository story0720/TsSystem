<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consume\Consumable;
use App\Models\Consume;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;

class ConsumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Consume::orderby('id', 'desc')->get();
        return view('Consume.consumables.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Consume.consumables.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Consumable $request)
    {
        // dd($request->all());
        try{
            $data = new Consume();
            $data->co_standardName = $request->standardname;
            $data->co_memo = $request->memo;
            $tags = explode(',', $request->specification);
            $data->save();
            foreach ($tags as $item => $key) {
                $model = Tag::firstorCreate(['name' => $key]);
                $data->tags()->attach($model->id);
            }
            return redirect()->action([ConsumeController::class, 'index']);
        }catch(Exception $x){
            return "儲存失敗"+$x;
        }
       
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
        $edit = Consume::find($id);
        return view('Consume.consumables.edit', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Consumable $request, $id)
    {
        dd($request->all());
        $data = Consume::find($id);
        $data->co_standardName = $request->standardname;
        $data->co_standard = $request->standard;
        $data->co_memo = $request->memo;
        $data->save();
        return redirect()->action([ConsumeController::class, 'index']);
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
            Consume::find($id)->delete();
            return redirect()->action([ConsumeController::class, 'index']);
        } catch (Exception $e) {
            //return "刪除失敗";
            return $e->getMessage();
        }
    }
    //耗材庫存管理
    public function inventory()
    {
        return view('Consume.consumables.inventory');
    }
}
