@extends('admin.layouts.layout')
@section('header')
    <h1>
        PAGOS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.payment.create') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="{{ route('admin.payment.index') }}"><i class="fa fa-credit-card"></i>Compras</a></li>
        <li class="active"><a href=""><i class="fa fa-plus"></i>Crear</a></li>
    </ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear Compras</h3>
            <a
                    href="{{ route('admin.payment.index') }}"
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

            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="">Categoria</label>
                <select name="category_id" class="form-control select2">
                    <option value=" ">Ninguno</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="">Precio</label>
                <input type="text" name="price" class="form-control"
                       value="{{ old('price') }}"
                       placeholder="Escribe el precio">
                {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('Crear', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection