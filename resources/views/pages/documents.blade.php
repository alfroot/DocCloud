@extends('layouts.layout')


@section('content')
    <!-- One -->
    <section id="one" class="wrapper style1 ">
        <header class="major">
            <h2>Ipsum feugiat consequat</h2>
            <p>Tempus adipiscing commodo ut aliquam blandit</p>
        </header>
        <div class="container">
            <div class="row">
                @foreach($documents as $document)
                    <div class="4u float-left" style="width: 25%;">
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