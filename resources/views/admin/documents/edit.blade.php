@extends('admin.layouts.layout')

@section('header')
    <h1>
        Documentos
        <small>Editar Documento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.documents.index') }}"><i class="fa fa-file-pdf-o"></i> Documentos</a></li>
        <li class="active"><a href=""><i class="fa fa-pencil"></i>Editar</a></li>
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
                            <label for="">Descripción del documento</label>
                            <textarea name="description" id="editor"
                                      class="form-control" rows="5"
                                      placeholder="Escribe una descripción para el Documento">{{ old('description', $document->description) }}</textarea>
                            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        </div>
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


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                        </div>
                    </div>
                    </div>
                </div>
            {!! Form::close() !!}
                @if (!empty($document->storage))
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-body">

                                    <form action="{{ route('admin.documents.destroy', $document) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <div class="col-md-2 align-content-center">
                                            <button class="btn btn-danger btn-xs" style="position: absolute">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <img src="/images/if_document_1055071.png" class="img-bordered"  width="150" height="150">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(empty($document->storage))
                    <div class="form-goup col-md-4">
                        <div class="dropzone"></div>
                    </div>
                @endif
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
            acceptedFiles: 'application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.spreadsheet,application/vnd.oasis.opendocument.text,application/msword,text/plain,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/vnd.ms-excel,',
            maxFilesize: 10,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'extension' : ''
            },
            dictDefaultMessage:
            '<div class="align-content-center">'+
            '<img src="/ElaAdmin/images/typesdoc/doc.png" class="img-thumbnail" style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/docx.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/ods.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/odt.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/pdf.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/ppt.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/pptx.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/txt.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
            '<img src="/ElaAdmin/images/typesdoc/xls.png" class="img-thumbnail"  style="margin-right: 2% ; margin-top: 2%" width="50" height="50">' +
                '</div>' +
            '<br><br><p>Arrastra aquí tu documento</p>'
        });
        /*myDropzone.on('error', function(file, res) {
            var msg = res.errors.document[0];
            $('.dz-error-message:last > span').text(msg);
        });*/
        Dropzone.autoDiscover = false;
    </script>

@endpush