@extends('admin.layouts.layout')

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
            {!! Form::open(['action' => 'Admin\CategoriesController@store', 'method' => 'POST']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control"
                       placeholder="Escribe el nombre de la categoria">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="">Descripción de la categoria</label>
                <textarea name="description" id="editor"
                          class="form-control" rows="10"
                          placeholder="Escribe la descripción de la categoria"></textarea>
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('category_parent_id') ? 'has-error' : '' }}">
                <label for="">Categoría Padre</label>
                <select name="category_parent_id" class="form-control select2">
                    <option value=" ">Ninguna</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('category_parent_id', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('CREAR', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection