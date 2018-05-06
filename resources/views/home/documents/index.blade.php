@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    @php(\Jenssegers\Date\Date::setLocale('es'))
    <div class="card">
        <div class="card-title">
            <h4>Mis documentos</h4>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>

                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Fecha de creacion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                    <tr>

                        <td>{{$document->name}}</td>
                        <td>{{$document->description}}</td>
                        <td>{{isset($document->category->name) ? $document->category->name : ''}}</td>
                        <td><span class="badge badge-warning">{{isset($document->extension->name) ? $document->extension->name : ''}}</span></td>
                        <td>{{Jenssegers\Date\Date::make($document->created_at)->format(' d\ F Y H:i')}}</td>

                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

