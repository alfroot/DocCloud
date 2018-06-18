@extends('admin.layouts.layout')


@section('header')
    <h1>
        Leer
        <small>E-mail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.payment.index') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-credit-card"></i>Compras</a></li>
    </ol>
@endsection
@section('content')

    @if(isset($mes))
        <input type="hidden" value="{{$guide}}" id="msgid">
        <div class="aling-center">{{$mes->render()}}</div>
        <div class="content margin-r-5">
        @foreach($mes as $msg)
<div class="row" id="{{$msg->id}}">
<div class="col-md-8 {{$msg->from === Auth::user()->id ? 'pull-left'  : 'pull-right' }}">

    <div class="box {{$msg->from === Auth::user()->id ? 'box-primary'  : 'box-danger' }}">
        <div class="box-header with-border ">


            <h3 class="box-title"><img  src="/storage/{{$msg->user->profilephoto}}" class="img-circle pull-right" style="width: 50px; height: 50px;"><i class="{{$msg->from === Auth::user()->id ? 'fa fa-arrow-right'  : 'fa fa-arrow-left' }}"></i></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-read-info">


                <h5>De: <b>{{$msg->user->name}} {{$msg->user->lastname}}</b> {{$msg->user->email}}
                    <h5>Para: <b>{{$msg->userto->name}} {{$msg->userto->lastname}}</b> {{$msg->userto->email}}
                        <span>{{ $msg->created_at->diffForHumans() }}</span>
                        <span class="mailbox-read-time pull-right">{{$msg->created_at}}</span></h5>
                    <h9 class="pull-right"><b>Asunto: </b> {{$msg->subject}}</h9>
                    <br>

            </div>
            <!-- /.mailbox-read-info -->


            <div class="mailbox-read-message">
                <p>{{$msg->body}}</p>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
      <p></p>
        <div class="box-footer">

            <div class="pull-left">
                @if(isset($msg))
                    @if($msg->from === Auth::user()->id)
                        <a href="{{route('outmsg')}}" class="btn btn-default"><i class="fa fa-reply"></i> Volver a Enviados</a>
                    @else
                        <a href="{{route('support')}}" class="btn btn-default"><i class="fa fa-reply"></i> Volver a Bandeja de entrada</a>
                    @endif
                @endif
            </div>

        </div>
        <!-- /.box-footer -->
    </div>
    <!-- /. box -->
</div>
</div>
    @endforeach
        </div>

    @endif
   <div>



@endsection
@push('scripts')
    <script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
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

    <script>
        $(document).ready(function(){

            $('body').animate({
                scrollTop:  290
            }, 2000);
        });
        $(document).ready(function(){
               var id = $("#msgid").val();
                $.ajax({
                    type: 'POST',
                    url: 'http://doccloud.dev/admin/messages/readed/',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id

                    },
                    beforeSend: function() {
                        //alert('Fetching....');
                    },
                    success: function(data) {

                        return data;

                    },
                    error: function() {
                        //alert('Error');
                    },
                    complete: function(data) {
                        //alert('complete');
                      console.log('leido');
                    }
                });
            });
   </script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte/dist/js/demo.js"></script>
@endpush