<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use App\Pay;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;


class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $payments = Pay::paginate(10);

            return view('/admin/payments/index', compact('payments'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function searchPays(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $this->validate($request, [
                'search' => 'required',
                'termn' => 'numeric',
            ]);

            if($request->termn == 1){
                $paymentsearch = Pay::where('id','=',$request->search)->paginate();
            }else if($request->termn == 2){

                $users =  DB::select( DB::raw("select id from users where name like '%$request->search%'"));
                $in = array_column($users, 'id');

                $paymentsearch = Pay::whereIn('user_id',$in)->limit(2000)->get();


            }


            return view('/admin/payments/index', compact('paymentsearch'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $users = User::all();
            $categories = Category::all();
            $documents = Document::all();
            return view('admin.payments.create', compact('users', 'documents', 'categories'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $this->validate($request, [
                'user_id' => 'required',
                'amount' => 'numeric|required',
                'document_id' => 'required'
            ]);

            $payment = new Pay($request->all());
            $payment->amount = $request->amount;
            $payment->save();



            return redirect('/admin/payment')->with('flash', 'La Compra ha sido guardada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')){
            $payment = Pay::find($id);
            return view('admin.payments.show', compact('payment'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Pay::find($id);
            $users = User::all();

            $documents = Document::all();
            return view('admin.payments.edit', compact('payment', 'documents', 'users'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function update(Request $request, $id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Pay::find($id);
            $this->validate($request, [
                'user_id' => 'required',
                'amount' => 'numeric|required',
                'document_id' => 'required'
            ]);

            $payment->user_id = $request->user_id;
            $payment->document_id = $request->document_id;

            $payment->amount = $request->amount;
            $payment->save();

            return redirect('/admin/payment')->with('flash', 'La Compra ha sido editada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function destroy($id)
    {
        if(auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Pay::find($id);
            $payment->delete();
            return redirect()->back()->with('flash', 'Compra Borrada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


}
