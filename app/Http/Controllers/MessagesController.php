<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MessagesController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $messages = Message::where('to','=',$user)->orderBy('created_at','desc')->paginate(10);
        $nonread = DB::select( DB::raw("select count(*) as total from messages m where m.to = $user and m.read = 0"));

        return view('home.emails.index',compact('messages','nonread'));

    }

    public function out()
    {
        $user = Auth::id();
        $messages = Message::where('from','=',$user)->orderBy('created_at','desc')->paginate(10);
        $nonread = DB::select( DB::raw("select count(*) as total from messages m where m.to = $user and m.read = 0"));
        return view('home.emails.out',compact('messages','nonread'));
    }

    public function read($idmsg ,$idfrom)
    {
        $msg = Message::find($idmsg);
        $user = Auth::id();
        $messages =  DB::select( DB::raw("select * from messages as m where  m.to in ($idfrom,$user) and m.from in($idfrom,$user) order by created_at desc"));

        $ids = array();
        foreach($messages as $idmsg){
            $ids[] = $idmsg->id;
        }

        $mes = Message::whereIn('id', $ids)->orderBy('id','desc')->paginate(5);

        if($msg->to === $user | $msg->from === $user ) {
            $guide = $msg->id;
            return view('home/emails/read',compact('mes','guide'));
        }
    }

    public function create()

    {
        $users = User::all();

        return view('home.emails.new', compact('users'));
    }



    public function store(Request $request)
    {


        $this->validate($request, [

            'to' => 'required',
            'body'=>'required|min:3',
            'subject' => 'required|min:3',

        ]);
        $newmessage = New Message;

        $newmessage->from = Auth::id();
        $newmessage->to = $request->to;
        $newmessage->body = $request->body;
        $newmessage->subject = $request->subject;
        $newmessage->read = false;
        $newmessage->save();


        return redirect('/home/messages/index')->with('flash', 'E-mail Enviado');
    }

    public function readed(Request $id)
    {
        $email = Message::find($id->id);
        $user = Auth::id();
        if($user === $email->to){

            $email->read = true;
            $email->save();
        }

    }
}
