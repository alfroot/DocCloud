@extends('admin.layouts.layout')

@section('header')
    <h1>
        DOCUMENTOS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa  fa-file-pdf-o"></i>Documentos</a></li>
    </ol>
@endsection
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado de Documentos</h3>
        <div class="align-center">
            <br>
        <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">

            Crear Documento
        </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(count($documents) && isset($documents))
        <table id="documents-table" class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Propietario</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Extensión</th>
                <th>Modalidad</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr id="filter_global">
                    <td class="global_filter" id="global_filter">{{$document->id}}</td>
                    <td class="global_filter" id="global_filter">{{isset($document->user->name) ? $document->user->name : '' }}</td>
                    <td class="global_filter" id="global_filter">{{isset($document->name) ? $document->name : '' }}</td>
                    <td class="global_filter" id="global_filter">{{isset($document->description) ? $document->description : '' }}</td>
                    <td class="global_filter" id="global_filter">{{isset($document->category->name) ? $document->category->name : ''}}</td>
                    @if(isset($document->extension->name))
                        <td class="global_filter" id="global_filter">{{$document->extension->name}}
                            <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="20px" height="20px">
                        </td>
                    @else
                        <td class="global_filter" id="global_filter">No hay archivo</td>
                    @endif
                    <td>
                        @if($document->premium === 0)
                            <p>Público</p>
                         @else
                        <p>Premium</p>
                            @endif
                    </td>
                    <td>@foreach($document->tags as $tag)
                            <span class="badge badge-warning">#{{$tag->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="align-content-center">
                            <form action="{{route('admin.documents.destroy', $document->id)}}" method="POST" class="align-content-center">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <a href="{{route('admin.documents.show', $document->id)}}"  class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.documents.edit', $document)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar el documento?"
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

            $('#documents-table').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn ( i ) {
            $('#documents-table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            $('#documents-table').DataTable({

                'paging'      : true,
                "pageLength": 10,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,


                language: {
                    url: '/adminlte/bower_components/Spanish.json'
                }
            });

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );
        } );
    </script>

@endpush