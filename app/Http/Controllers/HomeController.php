<?php

namespace App\Http\Controllers;

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


            return view('/home/dashboard/dashboard' , compact('user'));
        }else  {
            return redirect('/admin')->with('danger', 'Debes estar logueado eso');
        }


    }


}
