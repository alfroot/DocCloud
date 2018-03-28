<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $documents = Document::all();

            return view('admin.users.index', compact('documents'));

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
