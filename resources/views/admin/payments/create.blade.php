@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear Compras</h3>
            <a
                    href={{ route('admin.payment.index') }}
                            class="btn btn-primary pull-right"
            >
            Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::open(['action' => ['Admin\PaymentsController@store'], 'method' => 'POST']) !!}

            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="">Usuario </label>
                <select name="user_id" class="form-control select2">
                    <option value=" ">Ninguno</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}
                        >{{ $user->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('document_id') ? 'has-error' : '' }}">
                <label for="">Documento</label>
                <select name="document_id" class="form-control select2">
                    <option value=" ">Ninguno</option>
                    @foreach($documents as $document)
                        <option value="{{ $document->id }}"
                                {{ old('document_id') == $document->id ? 'selected' : '' }}
                        >{{ $document->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('document_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="">Precio</label>
                <input type="text" name="price" class="form-control"
                       value="{{ old('price') }}"
                       placeholder="Escribe el precio">
                {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('CREAR', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection