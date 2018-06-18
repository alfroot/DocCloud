@extends('admin.layouts.layout')
@section('header')
    <h1>
        USUARIOS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-users"></i>Usuarios</a></li>
    </ol>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="box-header">
            <h3 class="box-title">Listado de Usuarios</h3>
                <div class="">
                    <br>
                    <a href="{{route('admin.users.create')}}"
                        class="btn btn-primary">
                        Crear Usuario
                    </a>
                </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(count($users))
            <table id="users-table" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr id="filter_global">
                        <td class="global_filter" id="global_filter">{{$user->id}}</td>
                        <td class="global_filter" id="global_filter">{{$user->name}}</td>
                        <td class="global_filter" id="global_filter">{{$user->lastname}}</td>
                        <td class="global_filter" id="global_filter">{{$user->email}}</td>
                        <td class="global_filter" id="global_filter">{{$user->getRoleNames()[0]}}</td>


                        <td>
                            <div class="align-content-center">
                            <form action="{{route('admin.users.destroy', $user->id)}}"
                                  method="POST" style="display: inline">
                            <a href="" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar al usuario?, esto eliminará también los mensajes asociados a este usuario, sus documentos siempre se conservarán."
                                        data-confirm-button="Eliminar"
                                        data-cancel-button="Whoops no">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.box-body -->
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

                    $('#users-table').DataTable().search(
                        $('#global_filter').val(),
                        $('#global_regex').prop('checked'),
                        $('#global_smart').prop('checked')
                    ).draw();
                }

                function filterColumn ( i ) {
                    $('#users-table').DataTable().column( i ).search(
                        $('#col'+i+'_filter').val(),
                        $('#col'+i+'_regex').prop('checked'),
                        $('#col'+i+'_smart').prop('checked')
                    ).draw();
                }

                $(document).ready(function() {
                    $('#users-table').DataTable({
                        'paging'      : true,
                        'lengthChange': false,
                        'searching'   : true,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : false,


                        language: {
                            url: '/adminlte/bower_components/Spanish.json'
                        }
                    });
                    $('#users-table').DataTable();

                    $('input.global_filter').on( 'keyup click', function () {
                        filterGlobal();
                    } );

                    $('input.column_filter').on( 'keyup click', function () {
                        filterColumn( $(this).parents('tr').attr('data-column') );
                    } );
                } );
            </script>



@endpush