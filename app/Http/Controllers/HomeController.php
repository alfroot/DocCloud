<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Extension;
use App\Like;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = auth()->user();
            $documentstimeline = Document::whereNotNull('storage')->orderBy('created_at','desc')->paginate(15);
            return view('/home/dashboard/dashboard' , compact('user','documentstimeline'));

    }

    public function like(Request $request)
    {


            $this->validate($request, [
                'id' => 'required',

            ]);

            $match = Like::where('document_id', '=', $request->id)->where('user_id', '=', auth()->user()->id)->count();

            if($match == 0) {
                $like = new Like;
                $like->user_id = auth()->user()->id;
                $like->document_id = $request->id;
                $like->save();
                return redirect('/home#guide'.$request->id);
            }

        return redirect('/home#guide'.$request->id);

    }


    public function settings()
    {
        return redirect('/home#settings');
    }

    public function filterCat($idcat)
    {
        $user = auth()->user();
        $documentstimeline = Document::where('category_id','=',$idcat)->whereNotNull('storage')->orderBy('created_at','desc')->paginate(15);
        $filter = Category::where('id','=',$idcat)->get();
        $cat = $filter[0]->name;
        return view('/home/dashboard/dashboard' , compact('user','documentstimeline','cat'));

    }

    public function filterTag($idtag)
    {
        $user = auth()->user();

        $idslines =  DB::select( DB::raw("select d.id as id from documents d 
                                                                left join document_tags dt on d.id = dt.document_id
                                                                join tags t on t.id = dt.tag_id
                                                                where dt.tag_id = $idtag"));
        $ids = array();
        foreach($idslines as $idmsg){
            $ids[] = $idmsg->id;
        }

        $documentstimeline = Document::whereIn('id', $ids)->whereNotNull('storage')->orderBy('created_at','desc')->paginate(15);
        $filter = Tag::where('id','=',$idtag)->get();
        $tag = $filter[0]->name;

        return view('/home/dashboard/dashboard' , compact('user','documentstimeline','tag'));

    }

    public function filterUser($iduser)
    {
        $user = auth()->user();
        $documentstimeline = Document::where('user_id','=',$iduser)->whereNotNull('storage')->orderBy('created_at','desc')->paginate(15);
        $filter = User::where('id','=',$iduser)->get();
        $userfilt = $filter[0]->name.' '.$filter[0]->lastname;
        return view('/home/dashboard/dashboard' , compact('user','documentstimeline','userfilt'));
    }

    public function filterExt($idext)
    {
        $user = auth()->user();
        $documentstimeline = Document::where('extension_id','=',$idext)->whereNotNull('storage')->orderBy('created_at','desc')->paginate(15);
        $filter = Extension::where('id','=',$idext)->get();
        $ext = $filter[0]->description;
        return view('/home/dashboard/dashboard' , compact('user','documentstimeline','ext'));
    }
}
