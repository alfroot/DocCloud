<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function doccloud()
    {
        $documents = Document::all();
        return view('pages/home', compact('documents'));
    }

    public function documents()
    {
        $documents = Document::all();
        return view('pages/documents', compact('documents'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('pages/categories', compact('categories'));
    }
}
