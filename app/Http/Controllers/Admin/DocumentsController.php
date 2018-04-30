<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use App\Extension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $documents = Document::all();


            return view('admin.documents.index', compact('documents'));

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }



    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $user = Auth::id();

            $this->validate($request,
                ['name' => 'required|min:3'
            ]);

            $request->request->add(['user_id' => $user]);
            $request->request->add(['url' => str_slug($request->name)]);
            $document = Document::create($request->all());

            return redirect()->route('admin.documents.edit', $document);

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }


    }

    public function storedoc(Document $document)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

        $this->validate(request(), [
            'document' => 'required|File|mimes:doc,docx,ods,odt,pdf,ppt,pptx,txt,xls|max:10000'
        ]);


        $document->update([
            'storage'   =>  request()->file('document')->store('documents', 'public'),

        ]);

        $xt = explode('.',$document->storage);
        $ext = $xt[1];
        $extension = Extension::where('name','=', $ext)->get();


        $document->update([
            'extension_id'   => $extension[0]->id
        ]);
        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }

    }
    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $document = Document::find($id);


            return view('admin.documents.show', compact('document'));

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function edit(Document $document)
    {

        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            return view('admin.documents.edit', [
                'document'=> $document,
                'categories' => Category::all()

            ]);



        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }

    }


    public function update(Request $request, Document $document)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required|min:6',
                'category_id' => 'required'

                 ]);

            $document->update($request->all());
            return redirect()->route('admin.documents.index')->with('flash', 'Realizado');

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }

    }


    public function destroy($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $document = Document::find($id);
            $document->delete();

            return redirect()->route('admin.documents.index')->with('flash', 'Documento Borrado');

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }
}
