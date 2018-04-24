@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Categorias</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Categorias</li>
                <li class="breadcrumb-item active">Categorias Propuestas</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <!-- /# row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Categorias Propuestas</h4>

                </div>
                <div class="card-body">
                    @if(count($categories))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Aceptada</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->name }}</th>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ $category->aceptada}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <h1>No has propuesto categorias aun</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection