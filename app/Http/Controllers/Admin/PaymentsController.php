<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Document;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{


    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
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
                'price' => 'numeric'
            ]);

            $payment = new Payment($request->all());
            $payment->save();

            return redirect('/admin/payment')->with('flash', 'La Compra ha sido guardada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function show($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')){
            $payment = Payment::find($id);
            return view('admin.payments.show', compact('payment'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Payment::find($id);
            $users = User::all();
            $categories = Category::all();
            $documents = Document::all();
            return view('admin.payments.edit', compact('payment', 'documents', 'users', 'categories'));
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function update(Request $request, $id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Payment::find($id);
            $this->validate($request, [
                'user_id' => 'required',
                'price' => 'numeric'
            ]);

            $payment->user_id = $request->user_id;
            $payment->document_id = $request->document_id;
            $payment->category_id = $request->category_id;
            $payment->price = $request->price;
            $payment->save();

            return redirect('/admin/payment')->with('flash', 'La Compra ha sido editada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function destroy($id)
    {
        if(auth()->user()->hasrole('SuperAdmin','Admin')) {
            $payment = Payment::find($id);
            $payment->delete();
            return redirect()->back()->with('flash', 'Compra Borrada');
        }else{
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }
}
