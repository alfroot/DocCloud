@extends('admin.layouts.layout')
@section('header')
    <h1>
        {{$document->name}}
        <small>{{substr($document->description,0,100)}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.documents.index') }}"><i class="fa  fa-file-pdf-o"></i>Documentos</a></li>
        <li class="active"><a href=""><i class="fa  fa-eye"></i>Ver</a></li>
    </ol>
@endsection
@section('content')


        <iframe src = "/ViewerJS/?title={{$document->name}}#../storage/{{$document->storage}}" width='1000' height='800' allowfullscreen webkitallowfullscreen style="text-align:center;"></iframe>
        <iframe src="http://docs.google.com/gview?url=http://www.alfonsopozo.es/f1hVwAsaG49QWITKKa7mPVwglFEq67UBjiDzCXb9.ppt&embedded=true" style="width:1000px; height:800px;" frameborder="0"></iframe>
@endsection