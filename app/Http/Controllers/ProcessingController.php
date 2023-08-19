<?php

namespace App\Http\Controllers;

use App\Http\Requests\Processing as RequestsProcessing;
use App\Models\Processing;
use App\Models\Prtag;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Processing::orderby('id', 'desc')->get();
        return view('Processing.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Processing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsProcessing $request)
    {
        // dd($request->all());
        $data = new Processing();
        $data->pr_categoryname = $request->categoryname;
        $data->pr_memo = $request->memo;
        $data->save();
        // dd($request->processingCreate);
        $tags = explode(',', $request->processingCreate);
        foreach ($tags as $item) {
            $explode = explode('-', $item);
            $model = Prtag::firstorCreate(['pr_standard' => $explode[0], 'pr_price' => $explode[1]]);
            $data->prtags()->attach($model->id);
        }
        return redirect()->action([ProcessingController::class, 'index']);
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
        $edit = Processing::find($id);
        return view('Processing.edit', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsProcessing $request, $id)
    {
        // dd($request->all());
        $data = Processing::find($id);
        $data->pr_categoryname = $request->categoryname;
        $data->pr_memo = $request->memo;
        $data->save();
        $tags = explode(',', $request->processingCreate);
        $tagIds = [];
        foreach ($tags as $item) {
            $explode = explode('-', $item);
            $prtag = Prtag::updateOrCreate(['pr_standard' => $explode[0], 'pr_price' => $explode[1]]);
            $tagIds[] = $prtag->id;
        }
        $data->prtags()->sync($tagIds);
        return redirect()->action([ProcessingController::class, 'index']);
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
            $data = Processing::findOrFail($id);
            $data->prtags()->delete();
            $data->delete();
            $response = ['icon' => 'success', 'title' => '刪除成功!'];
            return response()->json($response);
        } catch (Exception $e) {
            $response = ['icon' => 'error', 'title' => '刪除失敗', 'text' => '可能有其他筆資料有關聯請再次檢查'];
            return response()->json($response);
        }
    }
}
