<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function update(Request $request, $id)
    {


        if (auth()->user()->id == $id) {


            $this->validate($request, [
                'name' => 'required|min:3',
                'lastname' => 'required|min:3',
                'password'=>'required|min:5',
                'email' => 'required|email',
            ]);

            $usuario = User::find($id);

            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            $usuario->save();
            return redirect('/home#settings')->with('flash', 'Usuario Editado');

        }else  {
            return redirect('/home#settings')->with('danger', 'No puedes hacer esa acción');
        }
    }
}
