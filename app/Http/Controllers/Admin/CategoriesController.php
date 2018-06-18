<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $categories = Category::whereNotNull('category_parent_id')->get();


            $categoriesAp= Category::all()->where('accepted','=','0');


            return view('admin.category.index', compact('categories', 'categoriesAp'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function getCategoriesPersistence(Request $name  )
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            if (!empty($name->name)) {

                $category = Category::find($name->id);
                $childs = self::child_categories($category);
                $notpermited = self::array_flatten($childs);
                $permited = Category::whereNotIn('id', $notpermited)->where('id', '<>', $name->id)->where('name','like', '%'.$name->name.'%')->get();

           return  $permited->toJson();

            };

        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }




    public function getCategory(Request $name )
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            if (!empty($name->name)) {

            $childs = Category::where('name','like', '%'.$name->name.'%')->get();


            return  $childs->toJson();
        };
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }



    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $categories = Category::all();
            return view('admin.category.create', compact('categories'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required |min:3',
                'category_parent_id' => 'required'
            ]);

            $category = new Category($request->all());
            $category->user_id = auth()->user()->id;
            $category->accepted = $request->accepted;
            $category->save();

            return redirect('/admin/category')->with('flash', 'La Categoria ha sido guardada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $category = Category::find($id);
            return view('admin.category.show', compact('category'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function showTree()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $categories = Category::all();
            return view('admin.category.tree', compact('categories'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $category = Category::find($id);
            $categories = Category::all();
            return view('admin.category.edit', compact('category', 'categories'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function update(Request $request ,$id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $category = Category::find($id);
            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required |min:3'
            ]);

            $category->name = $request->name;
            $category->description = $request->description;
            $category->category_parent_id = $request->category_parent_id;
            $category->user_id = auth()->user()->id;
            $category->accepted = $request->accepted;
            $category->save();


            return redirect('/admin/category')->with('flash', 'La Categoria ha sido actualizada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function array_flatten($array)
    {
        if (!is_array($array)) {
            return false;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }


    public function child_categories($category)
    {

      $data= [];

         if(!empty($category['children'])) {

               foreach ($category['children'] as $children ) {

                   $data[] = [
                       'id' => $children->id,

                       'children' => self::child_categories($children),
                   ];
               }
         }

    return $data;
    }


    public function destroy($id)
    {
        if (auth()->user()->hasrole('SuperAdmin', 'Admin')) {
            $category = Category::find($id);

            if ($category->id === 1) {
                return redirect('/admin/category')->with('danger', 'La categoria raiz no es borrable');
            }





            $category->delete();
            return redirect('/admin/category')->with('danger', 'Categoria Borrada');
        }else{
            return redirect('/admin/category')->with('danger', 'No tienes permisos');
        }

    }
}
