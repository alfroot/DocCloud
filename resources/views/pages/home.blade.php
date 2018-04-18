@extends('layouts.layout')

@section('banner')
    <!-- Banner -->
    @include('layouts.compontents.banner')
@endsection

@section('content')
    <!-- One -->
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2 style="margin-bottom: 25px;">Ultimos documentos</h2>
            <p>Echales un vistazo</p>
        </header>
        <div class="container">
            <div class="row">
                @foreach($documents as $document)
                    <div class="4u">
                        <section class="special box">
                            <i class="icon fa-download major"></i>
                            <h3>{{ $document->name }}</h3>
                            <a href="{{ route('payment.show', $document->id) }}">Comprar</a>
                        </section>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection