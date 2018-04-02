@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary float-left">VOLVER</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $document->name }}</td>
                                <td>{{ $document->category->name }}</td>
                                <td>25€</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-success float-right">COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection