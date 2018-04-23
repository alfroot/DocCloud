<?php

namespace App\Http\Controllers;

use App\Document;
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
        if (auth()->user()) {

            $user = auth()->user();

            $documentstimeline = Document::orderBy('created_at','desc')->limit(5)->get();


            return view('/home/dashboard/dashboard' , compact('user','documentstimeline'));
        }else  {
            return redirect('/admin')->with('danger', 'Debes estar logueado eso');
        }


    }



}
