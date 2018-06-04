@extends('home.layouts.layout')


@section('content')
    <div class="row">
        <div class="col-10">
            <div class="card">

                <iframe src = "/ViewerJS/?title={{$document->name}}#../storage/{{$document->storage}}" width=auto height='800' allowfullscreen webkitallowfullscreen></iframe>
                {{--<iframe src="http://docs.google.com/gview?url=http://www.alfonsopozo.es/f1hVwAsaG49QWITKKa7mPVwglFEq67UBjiDzCXb9.ppt&embedded=true" style="width:1000px; height:800px;" frameborder="0"></iframe>--}}

            </div>
        </div>
    </div>

@endsection

@push('styles')

@endpush


@push('scripts')

@endpush