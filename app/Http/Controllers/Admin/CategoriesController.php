<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $categories = Category::all();

            return view('admin.category.index', compact('categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $categories = Category::all();
            return view('admin.category.create', compact('categories'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required |min:3',
            ]);

            $category = new Category($request->all());
            $category->save();

            return redirect('/admin/category')->with('flash', 'La Categoria ha sido guardada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
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
        if (auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);
            return view('admin.category.show', compact('category'));
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $category->save();

            return redirect('/admin/category')->with('flash', 'La Categoria ha sido actualizada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->hasrole('SuperAdmin')) {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('flash', 'Categoria Borrada');
        }else{
            return redirect()->back()->with('danger', 'No tienes permisos');
        }

    }
}
