@extends('admin.layouts.layout')

@section('header')
    <h1>
        Documentos
        <small>Editar Documento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.documents.index') }}"><i class="fa fa-list"></i> Documentos</a></li>
        <li class="active">Editar</li>
    </ol>
@endsection

@section('content')

    <div class="row">

        <form action="{{ route('admin.documents.update' ,$document ) }}" method="POST">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="">Título del documento</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name', $document->name) }}"
                                   placeholder="Escribe el título de la publicación">
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="">Descripcion del documento</label>
                            <textarea name="description" id="editor"
                                      class="form-control" rows="5"
                                      placeholder="Escribe una descripcion para el Documento">{{ old('description', $document->description) }}</textarea>
                            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label for="">Categorías</label>
                            <select name="category_id" class="form-control select2">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    {{ old('category_id', $document->category_id) == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        </div>

                        @if(empty($document->storage))
                        <div class="form-goup">
                            <div class="dropzone"></div>
                        </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>

        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/documents/{{ $document->id }}/documents',
            paramName: 'document',
            acceptedFiles: 'application/pdf,image/*',
            maxFilesize: 3,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastra aquí tu archivo para subirlo'
        });
        /*myDropzone.on('error', function(file, res) {
            var msg = res.errors.document[0];
            $('.dz-error-message:last > span').text(msg);
        });*/
        Dropzone.autoDiscover = false;
    </script>

@endpush