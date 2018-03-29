<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $documents = Document::all();

            return view('admin.documents.index', compact('documents'));

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $user = Auth::id();

            $this->validate($request, ['title' => 'required|min:3']);

            $request->request->add(['user_id' => $user]);
            $document = Document::create($request->all());

            return redirect()->route('admin.documents.edit', $document);

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }


    }


    public function show($id)
    {
        //
    }


    public function edit(Document $document)
    {

        if (auth()->user()->hasrole('SuperAdmin')) {

            return view('admin.documents.edit', [
                'document'=> $document,
                'categories' => Category::all()

            ]);

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }

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
