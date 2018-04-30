<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
        return view('admin.dashboard');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }
}
