<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $categories = Category::all();

            return view('admin.category.index', compact('categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }


    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $categories = Category::all();
            return view('admin.category.create', compact('categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }


    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required |min:3',
            ]);

            $category = new Category($request->all());
            $category->user_id = auth()->user()->id;
            $category->aceptada = "no";
            $category->save();

            return redirect('/admin/category')->with('flash', 'La Categoria ha sido guardada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);
            return view('admin.category.show', compact('category'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    public function showTree()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $categories = Category::all();
            return view('admin.category.tree', compact('categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);
            $categories = Category::all();
            return view('admin.category.edit', compact('category', 'categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);
            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required |min:3'
            ]);

            $category->name = $request->name;
            $category->description = $request->description;
            $category->category_parent_id = $request->category_parent_id;
            $category->user_id = auth()->user()->id;
            $category->aceptada = "no";
            $category->save();

            return redirect('/admin/category')->with('flash', 'La Categoria ha sido actualizada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }


    public function destroy($id)
    {
        if(auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);

            if($category->id === 1){
                return redirect()->back()->with('danger', 'La categoria raiz no es borrable');
            }
            $category->delete();

            return redirect()->back()->with('flash', 'Categoria Borrada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }

    }
}
