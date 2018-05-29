<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Pay;
use Illuminate\Http\Request;

class DocCloudController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $payments = Pay::all()->where('user_id','=',auth()->user()->id);
        return view('home.doccloud.index', compact('categories','payments'));


    }


    public function show($id)
    {
        $document = Document::find($id);
        return view('home.doccloud.show', compact('document'));
    }

}
