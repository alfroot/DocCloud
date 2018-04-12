<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
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

            $this->validate($request,
                ['name' => 'required|min:3'
            ]);

            $request->request->add(['user_id' => $user]);
            $request->request->add(['url' => str_slug($request->name)]);
            $document = Document::create($request->all());

            return redirect()->route('admin.documents.edit', $document);

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }


    }

    public function storedoc(Document $document)
    {
        $this->validate(request(), [
            'document' => 'required|File'
        ]);




        $document->update([
            'storage'   =>  request()->file('document')->store('documents', 'public')

        ]);




    }
    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $document = Document::find($id);


            return redirect('/storage/'.$document->storage) ;

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
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


    public function update(Request $request, Document $document)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required|min:6',
                'category_id' => 'required'

                 ]);

            $document->update($request->all());
            return redirect()->route('admin.documents.index')->with('flash', 'Realizado');

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }

    }


    public function destroy($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $document = Document::find($id);
            $document->delete();

            return redirect()->route('admin.documents.index')->with('flash', 'Documento Borrado');

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }
}
