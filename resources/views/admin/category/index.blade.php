@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Categorias</h3>
            <a
                    href="/admin/category/create"
                    class="btn btn-primary pull-right"
            >
                Crear Categoria
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="box-body">
            @if(count($categories))
            <table id="category-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>CATEGORIA</th>
                    <th>DESCRIPCION</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="/admin/category/{{ $category->id }}" target="_blank" class="btn btn-xs btn-default">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-xs btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            {!! Form::open(['action' => ['Admin\CategoriesController@destroy',$category->id], 'method' => 'delete', 'class' => 'pull-right']) !!}
                            <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Seguro que quiere eliminar esta categoria?')">
                                <i class="fa fa-times"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

@endsection