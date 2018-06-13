<?php

namespace App\Http\Controllers;

use App\Document;
use App\Like;
use App\User;
use Illuminate\Http\Request;

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

            $documentstimeline = Document::whereNotNull('storage')->orderBy('created_at','asc')->paginate();


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


}
