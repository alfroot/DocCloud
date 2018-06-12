@extends('admin.layouts.layout')


@section('header')
    <h1>
        Bandeja
        <small>Salida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.payment.index') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-credit-card"></i>Compras</a></li>
    </ol>
@endsection
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('createmsg')}}" class="btn btn-primary btn-block margin-bottom">Nuevo</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="{{ request()->is('admin/messages/index') ? 'active' : '' }}"><a href="{{route('support')}}"><i class="fa fa-inbox"></i> Bandeja de entrada
                                    <span class="label label-primary pull-right">{{$nonread[0]->total}}</span></a></li>
                            <li class="{{ request()->is('admin/messages/out') ? 'active' : '' }}"><a href="{{route('outmsg')}}"><i class="fa fa-envelope-o "></i> Enviados</a></li>

                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Outbox</h3>

                    </div>

                    <div class="box-body">

                        <table id="email-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Leido</th>
                                <th>De</th>
                                <th>Asunto</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($messages as $message)
                                <tr id="filter_global">
                                    <td><div class="icheckbox_flat-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div></td>
                                    <td class="mailbox-star global_filter" id="global_filter"><a href="#"><i class="{{ $message->read === 0 ? 'fa fa-square-o'  : 'fa fa-eye' }}"></i></a></td>

                                    <td id="global_filter" class="mailbox-name global_filter"><a href="{{route('readmsg',[$message->id,$message->to] )}}">Para: {{$message->userto->name}}</a></td>
                                    <td id="global_filter" class="mailbox-subject global_filter"><b></b> {{$message->subject}}
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td id="global_filter" class="mailbox-date global_filter">{{ $message->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        </div></section>

@endsection
@push('styles')

    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')

    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        function filterGlobal () {

            $('#email-table').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn ( i ) {
            $('#email-table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            $('#email-table').DataTable({

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