<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('home.searcher.index');
    }

    public function getUsers(Request $users)
    {
        if(!empty($users->users)) {

            $usrs = User::where('name', 'like', '%' . $users->users . '%')->get();


            return $usrs->toJson();
        }
    }
}
