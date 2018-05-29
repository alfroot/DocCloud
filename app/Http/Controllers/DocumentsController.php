<?php

namespace App\Http\Controllers;

use App\Document;
use App\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;

class DocumentsController extends Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'Spanish');
    }

    public function index()
    {
        $documents = Document::all()->where('user_id','=', Auth::id());



        return view('home.documents.index',compact('documents'));
    }


    public function create()
    {
        return view('home.documents.create');
    }


    public function store(Request $request)
    {


            $user = Auth::id();

            $this->validate($request,
                ['name' => 'required|min:3'
                ]);

            $request->request->add(['user_id' => $user]);
            $request->request->add(['url' => str_slug($request->name)]);
            $document = Document::create($request->all());

            return redirect()->route('documents.edit', $document);


    }

    public function storedoc(Document $document)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin','User')) {

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



    public function edit(Document $document)
    {
        return view('home.documents.edit', [
            'document'=> $document


        ]);

    }

    public function downloadFile(Document $document)
    {
        $actualuser = Auth::id();


        if( $actualuser === $document->user_id) {

            return response()->download(public_path('/storage/'.$document->storage));

        }else{
            return back('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function update(Request $request, Document $document)
    {

        if($document->category_id){

            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required|min:6',
                'premium' => 'required',
            ]);


            $request->request->add(['url' => str_slug($request->name)]);
            $document->update($request->only('name','description','premium'));
            return redirect()->route('docindex')->with('flash', 'Realizado');

        }else{

            $this->validate($request, [
                'name' => 'required|min:3',
                'description' => 'required|min:6',
                'category_id' => 'required',
                'premium' => 'required',
            ]);

            $request->request->add(['url' => str_slug($request->name)]);
            $document->update($request->all());
            return redirect()->route('docindex')->with('flash', 'Realizado');

        }

    }

    public function destroyFile($id)
    {
        $document = Document::find($id);
        Storage::disk('public')->delete($document->storage);
        $document->update([
            'storage'   =>  null,
            'extension_id' => null

        ]);
        return redirect()->route('documents.edit', $document)->with('flash', 'Documento Borrado');
    }

    public function show($id)
    {
        $document = Document::find($id);
        return view('home.documents.show', compact('document'));

    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect()->route('documents.index')->with('flash', 'Documento Borrado');
    }


}
