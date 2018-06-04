<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Pay;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocCloudController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $payments = Pay::all()->where('user_id','=',auth()->user()->id);
        return view('home.doccloud.index', compact('categories','payments'));


    }



    public function showOrPay($id)
    {

        $iduser = Auth()->user()->id;
        $user = User::find($iduser);
        $document = Document::find($id);

        $payOk = Pay::where('user_id', '=', $iduser)->where('document_id', '=', $id)->get();

        if ($document->premium == 1){
            if (count($payOk) > 0) {

                return view('home.documents.show', compact('document'));

            } else {
                return view('home.documents.pay', compact('document','user'));
            }
        }else{
            return view('home.documents.show', compact('document'));
        }
    }

}
