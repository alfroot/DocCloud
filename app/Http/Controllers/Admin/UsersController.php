<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

        $users = User::all();

        return view('admin.users.index', compact('users'));

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }

    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $roles = Role::all();

            return view('admin.users.create', compact('roles'));

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {


            $this->validate($request, [
                'name' => 'required|min:3',
                'lastname' => 'required|min:3',
                'password'=>'required|min:5',
                'email' => 'required|email',
                'role'  => 'required'
            ]);

            $usuario = new User;
            $rol = Role::findById($request->role);
           // dd($rol->name);
            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            $usuario->save();
            $usuario->assignRole($rol->name);

            return redirect()->route('admin.users.index')->with('flash', 'Usuario Creado');

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }

    }



    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $user = User::find($id);
            $roles = Role::all();
            return view('admin.users.edit', compact('user','roles'));

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function update(Request $request, $id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {


            $this->validate($request, [
                'name' => 'required|min:3',
                'lastname' => 'required|min:3',
                'password'=>'required|min:5',
                'email' => 'required|email',
                'role'  => 'required'
            ]);

            $usuario = User::find($id);
            $rol = Role::findById($request->role);
            // dd($rol->name);
            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            $usuario->save();
            $usuario->syncRoles($rol);
            return redirect()->route('admin.users.index')->with('flash', 'Usuario Editado');

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }


    public function destroy($id)
    {
        if (auth()->user()->hasrole('SuperAdmin','Admin')) {

            $user = User::find($id);
            $user->delete();

            return redirect()->route('admin.users.index')->with('flash', 'Usuario Borrado');

        }else  {
            return redirect('/home')->with('danger', 'No tienes permisos');
        }
    }
}
