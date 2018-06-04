@extends('home.layouts.layout')
@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Árbol</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dasboard</a></li>
                <li class="breadcrumb-item active">Árbol</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


            @if(count($categories))
                @foreach($categories as $category)

                @endforeach
            @endif
            @include('home.doccloud.partials.tree', $category)
        </div>
    </div>
        </div>
    </div>



@endsection

@push('styles')
    <link href="/css/treeview1.css" rel="stylesheet">
@endpush


@push('scripts')
    <script src="/js/treeview1.js"></script>
@endpush