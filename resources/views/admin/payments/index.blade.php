@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Compras</h3>
            <a
                    href="{{ route('admin.payment.create') }}"
                    class="btn btn-primary pull-right"
            >
                Crear Compra
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="box-body">
            @if(count($payments))
                <table id="category-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>PRODUCTO</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->user->name}}</td>
                            <td>{{$payment->document->name}}</td>
                            <td>
                                <a href="{{ route('admin.payment.show', $payment->id) }}"  class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.payment.edit', $payment->id) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['action' => ['Admin\PaymentsController@destroy',$payment->id], 'method' => 'delete', 'class' => 'pull-right']) !!}
                                <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿Seguro que quiere eliminar esta compra?')">
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
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endpush