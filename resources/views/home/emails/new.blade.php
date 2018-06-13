@extends('home.layouts.layout')


@section('header')
    <h1>
        Bandeja
        <small>Salida</small>
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

                                <h3>Redactar</h3>
                                <div class="mail-list mt-4">
                                    <a class="list-group-item  {{ request()->is('messages/index') ? '' : '' }}" href="{{route('supportpublic')}}"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i>Bandeja de entrada </a>
                                    <a class="list-group-item  {{ request()->is('messages/out') ? 'font-bold' : '' }}" href="{{route('outmsgpublic')}}"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Bandeja de salida</a>

                                </div>
                            </div>

                        <div class="inbox-rightbar">

                            <div class="" role="toolbar">



                            </div>

                            <div class="mt-4">

                                {!! Form::open(['action' => ['MessagesController@store'], 'method' => 'POST']) !!}
                                    <div class="form-group">
                                        <select name="to" id=""
                                                class="form-control select2"
                                                data-placeholder="To:"
                                                style="width: 100%;">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" >{{ $user->name }} {{ $user->lastname }}</option>
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

                                    <div class="form-group m-b-0">
                                        <div class="text-right">

                                            <button type="submit" class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                            <!-- end card-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush
@push('scripts')

@endpush