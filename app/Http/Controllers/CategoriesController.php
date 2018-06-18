<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all()->where('accepted','=','1');
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
        $category->accepted = "0";
        $category->save();

        return redirect('/category')->with('flash', 'La categoria ha sido propuesta, podrás ver si ha sido aceptada en el apartado de categorias propuestas.');

    }

    public function propose()
    {
        $categories = Category::all()->where('user_id','=',auth()->user()->id);
        return view('home.category.proposeCategory', compact('categories'));
    }

    public function getCategory(Request $name )
    {

            if (!empty($name->name)) {

                $category = Category::where('name','like', '%'.$name->name.'%')->get();

                return  $category->toJson();
            };

    }
}
