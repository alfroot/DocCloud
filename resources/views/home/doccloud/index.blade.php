@extends('home.layouts.layout')


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