<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        return view('home.money.index');
    }

    public function totals()
    {
        $iduser = Auth::id();
        $documents_user = Document::where('user_id', '=',$iduser)->get();
        $ids = array();
        foreach ($documents_user as $doc){
            $ids[]= $doc->id;
        }
        if(empty($ids)){

            $total =  DB::select( DB::raw("select round((SUM(amount)/100)*70,2) as total, MONTHNAME(created_at) AS mes ,YEAR(created_at) AS year FROM pays WHERE document_id in (0) group by MONTH(created_at),YEAR(created_at) ORDER BY(created_at)"));
        }else{
            $total =  DB::select( DB::raw("select round((SUM(amount)/100)*70,2) as total, MONTHNAME(created_at) AS mes ,YEAR(created_at) AS year FROM pays WHERE document_id in (".implode(",",$ids).") group by MONTH(created_at) ,YEAR(created_at) ORDER BY(created_at)"));

        }


        return $total;

    }

    public function totalrevenue()
    {
        $iduser = Auth::id();
        $documents_user = Document::where('user_id', '=',$iduser)->get();
        $ids = array();
        foreach ($documents_user as $doc){
            $ids[]= $doc->id;
        }
        if(empty($ids)){
        $total =  DB::select( DB::raw("select round((SUM(amount)/100)*70,2) as total from pays WHERE document_id in (0)"));
        }else {
            $total =  DB::select( DB::raw("select round((SUM(amount)/100)*70,2) as total from pays WHERE document_id in (".implode(",",$ids).")"));

        }
        return $total;

    }
}

