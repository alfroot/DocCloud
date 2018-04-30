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

            $documentstimeline = Document::orderBy('created_at','desc')->limit(10)->get();


            return view('/home/dashboard/dashboard' , compact('user','documentstimeline'));


    }

    public function like(Request $request)
    {


            $this->validate($request, [
                'id' => 'required',

            ]);

            $match = Like::where('document_id', '==', $request->id)->where('user_id', '==', auth()->user()->id);

            if (empty($match) ){
                $like = new Like;
                $like->user_id = auth()->user()->id;
                $like->document_id = $request->id;
                $like->value = 1;
                $like->save();

                return back();
            }

            return false;


    }


}
