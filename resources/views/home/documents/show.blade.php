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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <iframe src = "/ViewerJS/?title={{$document->name}}#../storage/{{$document->storage}}" width=auto height='800' allowfullscreen webkitallowfullscreen></iframe>
                {{--<iframe src="http://docs.google.com/gview?url=http://www.alfonsopozo.es/f1hVwAsaG49QWITKKa7mPVwglFEq67UBjiDzCXb9.ppt&embedded=true" style="width:1000px; height:800px;" frameborder="0"></iframe>--}}
            </div>
        </div>
    </div>


@endsection
