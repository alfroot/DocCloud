@extends('admin.layouts.layout')
@section('header')
    <h1>
        CATEGORÍAS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Categorías pendintes de aprobar</h3>
        </div>

        <div class="box-body">
            @if(count($categoriesAp))
                <table id="category-table1" class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Autor</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categoriesAp as $category)
                        <tr id="filter_global1">
                            <td class="global_filter " id="global_filter">{{$category->id}}</td>
                            <td class="global_filter" id="global_filter">{{$category->name}}</td>
                            <td class="global_filter" id="global_filter">{{$category->description}}</td>
                            <td class="global_filter" id="global_filter">{{$category->user->name}}</td>
                            <td>
                                <div class="align-content-center">

                                    {!! Form::open(['action' => ['Admin\CategoriesController@destroy',$category->id], 'method' => 'delete', 'class' => 'align-content-center']) !!}
                                    <a href="{{ route('admin.category.show', $category->id) }}"  class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-xs btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar la categoria? Esto eliminará también sus documentos asociados"
                                            data-confirm-button="Eliminar"
                                            data-cancel-button="Whoops no">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de CategorÍas</h3>
            <div class="align-center">
                <br>
                <a href="/admin/category/create"class="btn btn-primary" >
                    Crear Categoría
                </a>
            </div>
        </div>

        <div class="box-body">
            @if(count($categories))
            <table id="category-table" class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category->accepted)
                    <tr id="filter_global">
                        <td class="global_filter " id="global_filter">{{$category->id}}</td>
                        <td class="global_filter" id="global_filter">{{$category->name}}</td>
                        <td class="global_filter" id="global_filter">{{$category->description}}</td>
                        <td>
                            <div class="align-content-center">

                            {!! Form::open(['action' => ['Admin\CategoriesController@destroy',$category->id], 'method' => 'delete', 'class' => 'align-content-center']) !!}
                                <a href="{{ route('admin.category.show', $category->id) }}"  class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar la categoria? Esto eliminará también sus documentos asociados"
                                    data-confirm-button="Eliminar"
                                    data-cancel-button="Whoops no">
                                <i class="fa fa-times"></i>
                            </button>
                            {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endif
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
        function filterGlobal () {

            $('#category-table').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn ( i ) {
            $('#category-table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            $('#category-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'hover'        :true,

                language: {
                    url: '/adminlte/bower_components/Spanish.json'
                }
            });
            $('#category-table').DataTable();

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );
        } );
    </script>
    <script>
        function filterGlobal () {

            $('#category-table1').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn ( i ) {
            $('#category-table1').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            $('#category-table1').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'hover'        :true,

                language: {
                    url: '/adminlte/bower_components/Spanish.json'
                }
            });
            $('#category-table').DataTable();

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );
        } );
    </script>



@endpush