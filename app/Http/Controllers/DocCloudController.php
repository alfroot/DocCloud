<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Pay;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocCloudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tree($idcat)
    {
        $all = Category::all();
        $payments = Pay::all()->where('user_id','=',auth()->user()->id);
        if($idcat == 0){
            return view('home.doccloud.index', compact('all','payments'));
        }else{

            $category = Category::find($idcat);
            $childs = self::child_categories($category);
            $cat1 = Category::find($idcat);
            if($childs){
                $notpermited = self::array_flatten($childs);
                $categories = Category::whereIn('id', $notpermited)->orderBy('id')->get();
                return view('home.doccloud.index', compact('categories','payments','cat1'));
            }else{
                $categories = Category::where('id', $idcat)->orderBy('id')->get();
                return view('home.doccloud.index', compact('categories','payments','cat1'));
            }
        }
    }

    public function array_flatten($array)
    {
        if (!is_array($array)) {
            return false;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function child_categories($category)
    {

        $data= [];

        if(!empty($category['children'])) {
            foreach ($category['children'] as $children ) {
                $data[] = [
                    'id' => $children->id,
                    'children' => self::child_categories($children),
                ];
            }
        }
        return $data;
    }

    public function showOrPay($docu ,$category, $salecategory)
    {

        $iduser = Auth()->user()->id;
        $user = User::find($iduser);
        $document = Document::find($docu);

        if ($salecategory == 0){


            $payOk = Pay::where('user_id', '=', $iduser)->where('document_id', '=', $docu)->get();

            if ($document->premium == 1){
                if (count($payOk) > 0 || $document->user_id == $iduser) {
                    return view('home.documents.show', compact('document'));
                } else {
                    return view('home.documents.pay', compact('document','user'));
                }
            }else{
                return view('home.documents.show', compact('document'));
            }
        }else {
            $categori = Category::find($category);

            $childs = self::child_categories($categori);
            $alldocOfcat = self::array_flatten($childs);

            $alldocOfcat[] = $categori->id;


            $docuspay = Document::whereIn('category_id', $alldocOfcat)->where('user_id','<>',$iduser)->orderBy('id')->get();
            $collection = $docuspay->keyBy('id');
            foreach ($docuspay as $docus){
                $payexist = Pay::where('user_id', '=', $iduser)->where('document_id', '=', $docus->id)->get();

                if ($docus->user_id == $iduser || count($payexist) > 0){
                    $collection->forget($docus->id);
                }
            }


            $total = array();

            foreach ($collection as $doc){
                if($doc->user_id != $iduser){
                    $total[]=$doc->price;
                }

            }
            $save = array_sum($total);
           $total = (round(array_sum($total)-(array_sum($total)*0.30),2));
            session()->put('documentstopay', $collection);
            $docuspay = $collection;

                    return view('home.documents.pay', compact('categori','user','total','docuspay','save'));

        }

    }



    public function getinfoheader()
    {
        $iduser = Auth::id();
        $user = User::find($iduser);
        $nonread = DB::select( DB::raw("select count(*) as total from messages as m where m.to = $user->id and m.read = 0"));
        $info=array();
        $photo = $user->profilephoto;
        $noread = $nonread[0]->total;
        $info[]=$photo;
        $info[]=$noread;
        return  $info;

    }



}
