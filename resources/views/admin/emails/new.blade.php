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
                <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Enviar</a>

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
                            <li class="{{ request()->is('admin/messages/index') ? 'active' : '' }}"><a href="{{route('support')}}"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right">12</span></a></li>
                            <li class="{{ request()->is('admin/messages/out') ? 'active' : '' }}"><a href="{{route('outmsg')}}"><i class="fa fa-envelope-o "></i> Sent</a></li>

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
                        <h3 class="box-title">Nuevo E-mail</h3>
                    </div>
                    <!-- /.box-header -->

                        {!! Form::open(['action' => ['Admin\MessagesController@store'], 'method' => 'POST']) !!}

                    <div class="box-body">
                        <div class="form-group">

                            <select name="to" id=""
                                    class="form-control select2"
                                    data-placeholder="To:"
                                    style="width: 100%;">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" >{{ $user->name }} {{ $user->lastname }} {{ $user->id }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('user', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Subject:" name="subject" value="{{ old('subject')}}">

                            {!! $errors->first('subject', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="body">
                    {{ old('body')}}
                    </textarea>
                            {!! $errors->first('body', '<span class="help-block">:message</span>') !!}

                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        </section>

@endsection
@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush
@push('scripts')
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/adminlte/bower_components/ower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
    <script>
        CKEDITOR
        $('.select2').select2({
            tags: false

        });
    </script>
    <script>
        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });

            //Handle starring for glyphicon and font awesome
            $(".mailbox-star").click(function (e) {
                e.preventDefault();
                //detect type
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");

                //Switch states
                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }

                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
            });
        });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte/dist/js/demo.js"></script>
@endpush