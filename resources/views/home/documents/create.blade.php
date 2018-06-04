@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Documentos</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/documents/index">Documentos</a></li>
                <li class="breadcrumb-item active">Subir</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')

<form action="{{ route('documents.store','#create') }}" method="POST">
    {{ csrf_field() }}
    <div class="card">
    <div class="card-title">
        <h4>Nuevo Documento</h4>

    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>

                <div class="form-group">
                    <p class="text-muted m-b-15 f-s-12"></p>
                    <input name="name" class="form-control input-rounded" placeholder="Titulo" type="text">
                </div>

            </form>
        </div>
    </div>
    </div>
</form>
@endsection

@push('scripts')

@endpush