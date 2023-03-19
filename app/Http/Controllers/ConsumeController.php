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
        try {
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
        } catch (Exception $x) {
            return "儲存失敗" + $x;
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
        // dd($request->all());
        // $data = Consume::find($id);
        // $data->co_standardName = $request->standardname;
        // $data->co_memo = $request->memo;
        // $data->save();
        // $tags = explode(',', $request->specification);
        // // dd($tags);
        // foreach ($tags as $item => $key) {
        //     $model = Tag::UpdateorCreate(['name' => $key]);
        //     $data->tags()->sync($model->id);
        // }
        $data = Consume::find($id);
        $data->co_standardName = $request->standardname;
        $data->co_memo = $request->memo;
        $data->save();
        $tags = array_unique(explode(',', $request->specification)); // 去除重复元素
        $tagIds = [];
        foreach ($tags as $item) {
            $model = Tag::updateOrCreate(['name' => $item]);
            $tagIds[] = $model->id;
        }
        $data->tags()->sync($tagIds);
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
            $data=Consume::find($id);
            $data->tags()->delete();
            $data->delete();           
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
    //耗材庫存管理
    public function inventory()
    {
        return view('Consume.consumables.inventory');
    }
}
