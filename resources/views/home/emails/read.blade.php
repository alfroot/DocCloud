@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Conversación</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/messages/index">E-mail</a></li>
                <li class="breadcrumb-item active">Conversación</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

    @if(isset($mes))

        <input type="hidden" value="{{$guide}}" id="msgid">
        <div class="m-t-5">
            <br>
        <div class="aling-center">{{$mes->render()}}</div>
            <br>
        @if(isset($mes))

            <a href="{{route('outmsgpublic')}}" class="btn btn-primary active"><i class="fa fa-reply"></i> Volver a Enviados</a>
            <a href="{{route('supportpublic')}}" class="btn btn-primary active"><i class="fa fa-reply"></i> Volver a Bandeja de entrada</a>

        @endif

        </div>
        <div class="content align-center">
        @foreach($mes as $msg)
       <div class="row col-md-12">
        <div class="col-lg-12">
        <div class="card  col-lg-8 {{$msg->from === Auth::user()->id ? 'pull-right'  : 'pull-left' }} " id="{{$msg->id}}">
            <div class="card-body">



                        <div class="box-header with-border ">
                            <h3 class="box-title"><img style="width: 20px; height: 20px;" src="/images/{{$msg->from === Auth::user()->id ? 'out.svg'  : 'in.svg' }}">
                                <img  src="/storage/{{$msg->user->profilephoto}}" class="rounded-circle pull-right" style="width: 50px; height: 50px;"></h3>

                        </div>

                        <div class="box-body no-padding">
                        <div class="mailbox-read-info">


                            <h5>De: <b>{{$msg->user->name}} {{$msg->user->lastname}}</b> {{$msg->user->email}}
                                <h5>Para: <b>{{$msg->userto->name}} {{$msg->userto->lastname}}</b> {{$msg->userto->email}}
                                    <span>{{ $msg->created_at->diffForHumans() }}</span>
                                    <span class="mailbox-read-time pull-right">{{$msg->created_at}}</span></h5>
                                <h9 class="pull-right"><b>Asunto: </b> {{$msg->subject}}</h9>
                                <br>

                        </div>

                        <div class="mailbox-read-message">
                            <p>{{$msg->body}}</p>
                        </div>

                        <div class="box-footer">

                        <div class="pull-left">

                        </div>

                    </div>

                        </div>



            </div>
        </div>
        </div>
       </div>
        @endforeach
        </div>
    @endif



@endsection
@push('scripts')


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
                    url: 'http://doccloud.dev/messages/readed/',
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

@endpush