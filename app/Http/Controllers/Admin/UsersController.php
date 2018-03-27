<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

        $users = User::all();

        return view('admin.users.index', compact('users'));

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $roles = Role::all();

            return view('admin.users.create', compact('roles'));

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {


            $this->validate($request, [
                'name' => 'required|min:3',
                'password'=>'required|min:5',
                'email' => 'required|email',
                'role'  => 'required'
            ]);

            $usuario = new User;
            $rol = Role::findById($request->role);
           // dd($rol->name);
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            $usuario->save();
            $usuario->assignRole($rol->name);

            return redirect()->route('admin.users.index')->with('flash', 'Usuario Creado');

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $user = User::find($id);
            $roles = Role::all();
            return view('admin.users.edit', compact('user','roles'));

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {


            $this->validate($request, [
                'name' => 'required|min:3',
                'password'=>'required|min:5',
                'email' => 'required|email',
                'role'  => 'required'
            ]);

            $usuario = User::find($id);
            $rol = Role::findById($request->role);
            // dd($rol->name);
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            $usuario->save();
            $usuario->syncRoles($rol);
            return redirect()->route('admin.users.index')->with('flash', 'Usuario Editado');

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasrole('SuperAdmin')) {

            $user = User::find($id);
            $user->delete();

            return redirect()->route('admin.users.index')->with('flash', 'Usuario Borrado');

        }else  {
            return redirect('/admin')->with('danger', 'Debes ser SuperAdmin para eso');
        }
    }
}
