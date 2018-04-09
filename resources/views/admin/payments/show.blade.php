
@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de la compra</h3>
            <a
                    href="{{ route('admin.payment.index') }}"
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Precio</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ is_null($payment->document_id)? '-': $payment->document->name}}</td>
                    <td>{{ is_null($payment->category_id)? '-': $payment->category->name}}</td>
                    <td>{{$payment->user->name}}</td>
                    <td>{{ $payment->price }}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.payment.edit', $payment->id) }}" class="btn btn-success pull-left">EDITAR</a>
        </div>
    </div>

@endsection
