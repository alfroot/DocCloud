@extends('admin.layouts.layout')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Usuario</h3>
            <a
                    href=""
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::model($user,['action' => ['Admin\UsersController@update', $user->id ],'method' => 'PUT']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre del usuario</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $user->name) }}"
                       placeholder="Escribe el nombre del usuario">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="">Email del usuario</label>
                <input type="text" name="email" class="form-control"
                       value="{{ old('name', $user->email) }}"
                       placeholder="Escribe el email del usuario">
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="">Password del usuario</label>
                <input type="password" name="password" class="form-control"

                       placeholder="Escribe el password del usuario">

                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="">Rol</label>
                <select name="role" class="form-control select2">
                    <option value=" ">Ninguna</option>
                    @foreach($roles as $rol)
                        @if($user->getRoleNames()[0] == $rol->name)
                            <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>
                        @else
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endif
                    @endforeach
                </select>
                {!! $errors->first('role', '<span class="help-block">:message</span>') !!}
            </div>
            {{ Form::bsSubmit('Editar', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection