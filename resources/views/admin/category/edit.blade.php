@extends('admin.layouts.layout')
@section('header')
<h1>Categorias</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class=""><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
    <li class="active"><a href=""><i class="fa fa-pencil"></i>Editar</a></li>
</ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear Categorias</h3>
            <a
                    href={{ route('admin.category.index') }}
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::model($category,['action' => ['Admin\CategoriesController@update', $category->id], 'method' => 'PUT']) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $category->name) }}"
                       placeholder="Escribe el nombre de la categoria">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="">Descripción de la categoria</label>
                <textarea name="description" id="editor"
                          class="form-control" rows="10"
                          placeholder="Escribe la descripción de la categoria">{{ old('description', $category->description) }}</textarea>
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('category_parent_id') ? 'has-error' : '' }}">
                <label for="">Categoría Padre</label>
                <select name="category_parent_id" class="form-control select2">
                    <option value=" ">Ninguna</option>
                    @foreach($categories as $category2)
                        <option value="{{ $category2->id }}"
                                {{ old('category_parent_id', $category->category_parent_id) == $category2->id ? 'selected' : '' }}
                        >{{ $category2->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('category_parent_id', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('EDITAR', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection