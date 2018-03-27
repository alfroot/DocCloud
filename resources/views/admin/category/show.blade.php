@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <a href={{ route('admin.category.index') }} class="btn btn-primary btn-sm float-left">VOLVER</a>
        </div>
        <div class="box-body">
            <h1 align="center">Nombre: {{ $category->name }}</h1>
            <h3 align="center">Descripcion: {{ $category->description }}</h3>
            @if(is_null($category->category_parent_id))
                <h3 align="center">Es categoria padre</h3>
            @else
                <h3 align="center">Categoria padre: {{ $category->category_parent_id }}</h3>
            @endif
        </div>
    </div>

@endsection