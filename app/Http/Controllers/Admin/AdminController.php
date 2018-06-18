<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use App\Pay;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $lastmembersids =  DB::select( DB::raw("SELECT id as id FROM users where date(created_at)>date(date_sub(NOW(), INTERVAL 30 DAY))  ORDER BY created_at DESC LIMIT 30"));
            $ids = array();
            foreach($lastmembersids as $id){
                $ids[] = $id->id;
            }

            $lastmembers = User::whereIn('id', $ids)->orderBy('created_at','desc')->get();

            $documents = Document::all()->count();
            $pays = Pay::all()->count();
            $categories = Category::all()->count();
            $users = User::all()->count();
            $data = array();
            $data[0] = $documents;
            $data[1] = $pays;
            $data[2] = $categories;
            $data[3] = $users;
        return view('admin.dashboard',compact('lastmembers','data'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }
}
