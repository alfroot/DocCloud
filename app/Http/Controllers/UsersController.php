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

    public function storeProfileUser(User $user)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin','User')) {

            $this->validate(request(), [
                'user' => 'required|File|mimes:jpg,jpeg,png|max:10000'
            ]);


            $user->update([
                'profilephoto'   =>  request()->file('user')->store('profiles', 'public'),

            ]);

            $user->save();


        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }

    }
}
