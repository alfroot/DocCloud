<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class DocCloudController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('home.doccloud.index', compact('categories'));


    }



}
