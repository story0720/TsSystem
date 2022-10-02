<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags=TAg::all();
        return view('tag.index',['tags'=>$tags]);
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
