@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Documentos</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/documents/index">Documentos</a></li>
                <li class="breadcrumb-item active">Ver Documento</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-2">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><a href="/documents/download/{{$document->id}}"><i class="fa fa-download f-s-40 color-primary"></i></a></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 id="tot"></h2>
                    <p class="m-b-0">Descargar</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-lg-12">
            <div class="card">
                <iframe src = "/ViewerJS/?title={{$document->name}}#../storage/{{$document->storage}}" width=auto height='800'  webkitallowfullscreen></iframe>

            </div>
        </div>
    </div>

    <div class="row col-md-12">
        <div class="col-lg-12">
            <div class="card">
                <iframe src="http://docs.google.com/gview?url=alfonsopozo.es/storage/{{$document->storage}}&embedded=true" style="width:1000px; height:800px;" frameborder="0"></iframe>

            </div>
        </div>
    </div>


@endsection
