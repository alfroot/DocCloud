@extends('admin.layouts.layout')
@section('header')
    <h1>Categorias</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class=""><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
        <li class="active"><a href=""><i class="fa fa-eye"></i>Ver</a></li>
    </ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <a href={{ route('admin.category.index') }} class="btn btn-primary btn-sm float-left">VOLVER</a>
        </div>
        <div class="box-body">
            <h1 align="center">Nombre: {{ $category->name }}</h1>
            <h3 align="center">Descripcion: {{ $category->description }}</h3>
            @if(is_null($category->parent))
                <h3 align="center">Es categoria padre</h3>
            @else
                <h3 align="center">Categoria padre: {{ $category->parent->name }}</h3>
            @endif
        </div>
    </div>

@endsection