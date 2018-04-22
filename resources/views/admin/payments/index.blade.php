@extends('admin.layouts.layout')


@section('header')
    <h1>
        PAGOS
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.payment.index') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-credit-card"></i>Compras</a></li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Compras</h3>
            <div class="align-center">
                <br>
            <a href="{{ route('admin.payment.create') }}"
             class="btn btn-primary">
                Crear Compra

            </a>
            </div>
        </div>
        <div class="box-body">
            @if(count($payments))
                <table id="payments-table" class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Documento</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr id="filter_global">
                            <td class="global_filter" id="global_filter">{{$payment->id}}</td>
                            <td class="global_filter" id="global_filter">{{$payment->user->name}}</td>
                            <td class="global_filter" id="global_filter">{{ is_null($payment->document_id)? '-': $payment->document->name}}</td>
                            <td class="global_filter" id="global_filter">{{ is_null($payment->category_id)? '-': $payment->category->name}}</td>
                            <td>
                                {!! Form::open(['action' => ['Admin\PaymentsController@destroy',$payment->id], 'method' => 'delete', 'class' => 'align-content-center']) !!}
                                <a href="{{ route('admin.payment.show', $payment->id) }}"  class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.payment.edit', $payment->id) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                 <button class="confirm btn btn-xs btn-danger" type="submit" data-text="¿Desa eliminar esta compra?"
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
        function filterGlobal () {

            $('#payments-table').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn ( i ) {
            $('#payments-table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            $('#payments-table').DataTable({
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
            $('#payments-table').DataTable();

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );
        } );
    </script>

@endpush