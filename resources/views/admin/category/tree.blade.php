@extends('admin.layouts.layout')
@section('header')
    <h1>Categorias</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class=""><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
        <li class="active"><a href=""><i class="fa fa-sitemap"></i>Árbol</a></li>
    </ol>
@endsection
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Árbol</h3>


        </div>
        <div class="box-body">
            @if(count($categories))
                @foreach($categories as $category)

                   @endforeach
            @endif
                @include('admin.category.partials.tree', $category)
        </div>
    </div>
@endsection

@push('styles')
    <link href="/css/treeview.css" rel="stylesheet">
@endpush


@push('scripts')
     <script src="/js/treeview.js"></script>
@endpush