<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index()
    {
        return view('home.searcher.index');
    }

    public function getUsers(Request $users)
    {
        if(!empty($users->users)) {



            $usrs = User::where('name',  'like', '%' . $users->users . '%')->orWhere('lastname',  'like', '%' . $users->users . '%')->limit(15)->get();
            return new JsonResponse($usrs);
        }
    }

    public function getDocuments(Request $documents)
    {
        if(!empty($documents->documents)) {

            $doc = Document::where('name', 'like', '%' . $documents->documents . '%')->orWhere('description',  'like', '%' . $documents->documents . '%')->limit(15)->with('extension')->get();


            return $doc->toJson();
        }
    }

    public function getCategories(Request $categories)
    {
        if(!empty($categories->categories)) {

            $cat = Category::where('name', 'like', '%' . $categories->categories . '%')->orWhere('description',  'like', '%' . $categories->categories . '%')->limit(15)->get();


            return $cat->toJson();
        }
    }
}
