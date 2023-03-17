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
        //  dd($request->all());
        $data = new Processing();
        $data->pr_categoryname = $request->categoryname;
        $data->pr_memo = $request->memo;
        $data->save();
        // dd($request->processingCreate);
        $tags = explode(',', $request->processingCreate);
        foreach ($tags as $item) {    
            $explode=explode('-', $item);
            $model=Prtag::firstorCreate(['pr_standard'=>$explode[0],'pr_price'=>$explode[1]]);
            $data->Prtags()->attach($model->id);
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
        $data = Processing::find($id);
        $data->pr_categoryname = $request->categoryname;
        // $data->pr_standard = $request->standard;
        $data->pr_memo = $request->memo;
        $data->save();

        $tags = explode(',', $request->processingEdit   );
        foreach ($tags as $item) {    
            $explode=explode('-', $item);
            $model=Prtag::firstorCreate(['pr_standard'=>$explode[0],'pr_price'=>$explode[1]]);
            $data->Prtags()->sync($model->id);
        }
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
            Processing::find($id)->delete();
            return redirect()->action([ProcessingController::class, 'index']);
        } catch (Exception $e) {
            //return "刪除失敗";
            return $e->getMessage();
        }
    }
}
