@extends('home.layouts.layout')

@section('header')
    <h1>
        Bandeja
        <small>Entrada</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-credit-card"></i>Compras</a></li>
    </ol>
@endsection
@section('content')

    <div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <!-- Left sidebar -->
                    <div class="inbox-leftbar">
                        <a class="btn btn-danger btn-block waves-effect waves-light" href="{{route('createmsgpublic')}}">Nuevo</a>

                        <div class="mail-list mt-4">
                            <a class="list-group-item border-0 {{ request()->is('admin/messages/index') ? 'text-danger' : '' }} " href="{{route('supportpublic')}}"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Bandeja de entrada</b><span class="label label-danger float-right ml-2">{{$nonread[0]->total}}</span></a>
                            <a class="list-group-item border-0 {{ request()->is('admin/messages/out') ? 'text-danger' : '' }}" href="{{route('outmsgpublic')}}"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Bandeja de salida</a>

                       </div>
                    </div>


                    <div class="inbox-rightbar">


                        <div class="">
                            <div class="mt-4">
                                <div class="">
                                    <ul class="message-list">

                                        @foreach($messages as $message)

                                        <li>
                                            <a href="{{route('readmsgpublic' , [$message->id,$message->from] )}}">
                                                <div class="col-mail col-mail">
                                                    <p class="title m-2">&nbsp;<i class="{{ $message->read === 0 ? 'fa fa-square-o'  : 'fa fa-check-square-o' }}"></i>{{$message->user->name}} {{$message->user->lastname}}</p>
                                                </div>
                                                <div class="col-mail col-mail-2">
                                                    <div class="subject">{{$message->subject}} &nbsp;–&nbsp;
                                                        <span class="teaser">{{substr($message->body,0,50)}}</span>
                                                    </div>
                                                    <div class="date">{{ $message->created_at->diffForHumans() }}</div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>

                        </div>


                        <div class="aling-center">{{$messages->render()}}</div>
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



    <script src="/ElaAdmin/js/lib/jquery/jquery.min.js"></script>

    <script src="/ElaAdmin/js/lib/bootstrap//ElaAdmin/js/popper.min.js"></script>
    <script src="/ElaAdmin/js/lib/bootstrap//ElaAdmin/js/bootstrap.min.js"></script>

    <script src="/ElaAdmin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/ElaAdmin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/ElaAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/ElaAdmin/js/custom.min.js"></script>
@endpush