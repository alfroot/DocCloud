<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $messages = Message::all()->where('to','=',$user);
        return view('admin.emails.index',compact('messages'));
    }

    public function out()
    {
        $user = Auth::id();
        $messages = Message::all()->where('from','=',$user);
        return view('admin.emails.out',compact('messages'));
    }

    public function read($id)
    {
        $msg = Message::find($id);

        return view('admin.emails.read',compact('msg'));
    }

    public function create()
    {
        return view('admin.emails.new');
    }
}
