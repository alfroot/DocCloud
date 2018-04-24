<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all()->where('aceptada','=','si');
        return view('home.category.category', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required |min:3',
            'category_parent_id' => 'required'
        ]);

        $category = new Category($request->all());
        $category->user_id = auth()->user()->id;
        $category->aceptada = "no";
        $category->save();

        return redirect('/category')->with('flash', 'La Categoria ha sido guardada');

    }

    public function propuestas()
    {
        $categories = Category::all()->where('user_id','=',auth()->user()->id);
        return view('home.category.propuestasCategory', compact('categories'));
    }
}
