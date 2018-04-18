@extends('layouts.layout')

@section('content')
    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Árbol</h3>
        </div>
        <div class="box-body">
            @if(count($categories))
                @foreach($categories as $category)

                @endforeach
            @endif
            @include('pages.category-partials.tree', $category)
        </div>
    </div>
@endsection

@push('styles')
    <link href="/css/treeview.css" rel="stylesheet">
@endpush


@push('scripts')
    <script src="/js/treeview.js"></script>
@endpush