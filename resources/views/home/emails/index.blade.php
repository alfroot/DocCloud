@extends('home.layouts.layout')


@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Bandeja de entrada</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/messages/index">E-mail</a></li>
                <li class="breadcrumb-item active">Bandeja de entrada</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">

    <div class="col-12">
        <div class="card m-10">
            <div class="card-body">
                <div class="card-content">
                    <!-- Left sidebar -->
                    <div class="inbox-leftbar">
                        <a class="btn btn-danger btn-block waves-effect waves-light" href="{{route('createmsgpublic')}}">Nuevo</a>
                        <h3>Bandeja de entrada</h3>
                        <div class="mail-list mt-4">
                            <a class="list-group-item  {{ request()->is('messages/index') ? '' : '' }}" href="{{route('supportpublic')}}"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i>Bandeja de entrada <span class="label label-danger float-right ml-2">{{$nonread[0]->total}}</span></a>
                            <a class="list-group-item  {{ request()->is('messages/out') ? 'font-bold' : '' }}" href="{{route('outmsgpublic')}}"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Bandeja de salida</a>

                       </div>
                    </div>
                    <div class="aling-center danger">{{$messages->render()}}</div>

                    <div class="inbox-rightbar">


                        <div class="">
                            <div class="mt-4">
                                <div class="">
                                    <ul class="message-list">

                                        @foreach($messages as $message)

                                        <li>

                                            <a href="{{route('readmsgpublic' , [$message->id,$message->from] )}}">
                                                <div class="col-mail col-mail">
                                                    <img  src="/storage/{{$message->user->profilephoto}}" class="rounded-circle" style="width: 30px; height: 30px;">

                                                    <p class="title m-2">&nbsp;<i class="{{ $message->read === 0 ? 'fa  fa-envelope-o'  : 'fa fa-eye' }}"></i>&nbsp; {{$message->user->name}} {{$message->user->lastname}}</p>
                                                </div>
                                                <div class="col-mail col-mail-2">
                                                    <div class="subject">{{$message->subject}} &nbsp;–&nbsp;
                                                        <span class="teaser">{{substr($message->body,0,50)}}</span>
                                                    </div>
                                                    <span class=" pull-right">{{ $message->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>

                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>



    @endsection

@push('styles')


@endpush
@push('scripts')



@endpush