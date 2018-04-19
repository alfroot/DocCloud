@extends('admin.layouts.layout')
@section('header')
    <h1>Categorias</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
    </ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a
                        href="/admin/category/create"
                        class="btn btn-primary center"
                >
                    Crear Categoria
                    <i class="fa col-lg-pull-2"></i>
                </a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
            <h3 class="box-title">Listado de Categorias</h3>
        </div>
        <div class="box-body">
            @if(count($categories))
            <table id="category-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{ route('admin.category.show', $category->id) }}"  class="btn btn-xs btn-default">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-xs btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            {!! Form::open(['action' => ['Admin\CategoriesController@destroy',$category->id], 'method' => 'delete', 'class' => 'pull-right']) !!}

                            <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar la categoria? Esto eliminará también sus documentos asociados"
                                    data-confirm-button="Eliminar"
                                    data-cancel-button="Whoops no">
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

@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')

    <script src="/adminlte/bower_components/bootstrap/js/jquery.confirm.js"></script>
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(".confirm").confirm();
    </script>

    <script>
        $(function () {
            $('#category-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                language: {
                url: '/adminlte/bower_components/Spanish.json'
            }
        })
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            // other options
        });
    </script>
@endpush