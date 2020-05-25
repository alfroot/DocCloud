<?php

namespace App\Http\Controllers;

use App\Document;
use App\Extension;
use App\Pay;
use App\Tag;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;

class DocumentsController extends Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'Spanish');
        $this->middleware('auth');
    }


    public function index()
    {

        $documents = Document::all()->where('user_id', '=', Auth::id());

        $user = User::find(Auth::id());

        $docpays = array();
        foreach ($user->payments as $pay){
            $docpays[] = $pay->document_id;
        }
        $documentspay = Document::whereIn('id', $docpays)->get();


        return view('home.documents.index',compact('documents','documentspay'));
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
        if (Auth::id() === $document->user_id){

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
            return redirect('/home')->with('danger', 'Whopppps¡');
        }

    }



    public function edit(Document $document)
    {

        if (Auth::id() === $document->user_id){

            return view('home.documents.edit', [
                'document' => $document,
                'tags' => Tag::all()


            ]);
        }else{
            return redirect('/home')->with('danger', 'Whopppps¡');
        }

    }

    public function downloadFile(Document $document)
    {
        $actualuser = Auth::id();

        $payOk = Pay::where('document_id','=',$document->id)->where('user_id','=',$actualuser)->get();
      if(!isset($document->storage)){
          return redirect('/documents/index')->with('flash', 'Aun no hay archivo subido');
      }

        if( $actualuser == $document->user_id || count($payOk) > 0 || $document->premium == 0) {

            return response()->download(public_path('/storage/'.$document->storage));

        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
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

            $document->syncTags($request->tags);
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
        if($document->premium === 1){

            return redirect()->route('documents.index')->with('flash', 'No puedes borrar un documento monetizado');
        }else{

            $document->delete();
            return redirect()->route('documents.index')->with('danger', 'Documento borrado');
        }

    }


}
