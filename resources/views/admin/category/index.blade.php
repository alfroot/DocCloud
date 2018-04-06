@extends('admin.layouts.layout')

@section('content')



    <div class="box box-default collapsed-box">

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
                            <a href="{{ route('admin.category.show', $category->id) }}"  class="btn btn-xs btn-default">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-xs btn-info">
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



    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Arbol</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.category.partials.tree', $category)
        </div>
    </div>





@endsection

@push('styles')

    <link href="/css/treeview.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


@endpush

@push('scripts')

    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#category-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

    <script src="/js/treeview.js"></script>








@endpush