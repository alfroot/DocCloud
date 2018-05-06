@extends('home.layouts.layout')

@section('header')
    <h1>
        Documentos
        <small>Editar Documento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('documents.index') }}"><i class="fa fa-file-pdf-o"></i> Documentos</a></li>
        <li class="active"><a href=""><i class="fa fa-pencil"></i>Editar</a></li>
    </ol>
@endsection


@section('content')
    <div class="container-fluid">
    <form action="{{ route('documents.update' ,$document ) }}" method="POST">

        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
            <div class="col-lg-12">

          <div class="card">
              <div class="card-title"><h4>Editar documento</h4></div>
            <div class="card-body">
            <div class="horizontal-form-elements">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label class="col-sm-4 control-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-rounded" name="name" value="{{ old('name', $document->name) }}" type="text"> {!! $errors->first('name', '<div class="alert alert-danger">:message</div>') !!}

                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Descripción</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="editor"
                                              class="small-textarea" rows="6" cols="40"
                                              placeholder="Escribe una descripción para el Documento">{{ old('description', $document->description) }}</textarea>
                                    {!! $errors->first('description', '<div class="alert alert-danger">:message</div>') !!}
                                </div>
                            </div>

                        </div>
                        <!-- /# column -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-10">

                                    @if (!empty($document->storage))
                                        <form action="{{ route('documents.destroy', $document) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <div class="">
                                                <button class="btn btn-danger btn-xs" style="position: absolute">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                                <img src="/images/if_document_1055071.png" class="img-bordered"  width="80" height="80">

                                        </form>
                                </div>
                                    @endif
                                    </div>
                            <br>
                            <div class="input-group">
                                <div class="col-sm-10">

                                    <label for="">Buscador de categorias</label>


                                    <input placeholder="Introduce la categoria" id="dad" class="form-control input-rounded">
                                    {!! $errors->first('category_id', '<div class="alert alert-danger">:message</div>') !!}
                                    </div>
                                    <br>
                                    <div id="content" class="col-sm-10" style="display: none">
                                        <div class="box box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Categorías Sugeridas</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="showcat" class="col">

                                                </div>
                                                <select  id="childs" name="category_id" class="form-control select2">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            </div>

                        </div>
                    </div>
        </div>
                    </div>
        </div>
        </div>
        </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dropzone</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="form-goup col-md-4">
                        <div class="dropzone"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
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
            acceptedFiles: 'application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.spreadsheet,application/vnd.oasis.opendocument.text,application/msword,text/plain,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/vnd.ms-excel,',
            maxFilesize: 10,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'extension' : ''
            },
            dictDefaultMessage:
            '<div class="align-content-center">'+
            '<img src="/ElaAdmin/images/typesdoc/doc.png" class="" style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/docx.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/ods.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/odt.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/pdf.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/ppt.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/pptx.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/txt.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '<img src="/ElaAdmin/images/typesdoc/xls.png" class=""  style="margin-right: 2% ; margin-top: 2%" width="35" height="35">' +
            '</div>' +
            '<br><br><p>Arrastra aquí tu documento</p>'
        });
       
        Dropzone.autoDiscover = false;
    </script>
    <script>


        $(document).ready(function(){

            $("#dad").keyup(function(){

                var dad = $("#dad").val();
                $.ajax({
                    type: 'POST',

                    url: 'http://doccloud.dev/admin/category/getcats/',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": dad

                    },
                    beforeSend: function() {
                        //alert('Fetching....');
                    },
                    success: function(data) {

                        return data;

                    },
                    error: function() {
                        //alert('Error');
                    },
                    complete: function(data) {
                        //alert('complete');


                        var ul = $("#childs");

                        $("#content").show();
                        $("#showcat").empty();
                        ul.empty();

                        for (var j = 0; j  < 8 ; j++) {
                            $("#showcat").append("<p class=\"\" type=\"radio\"> " + data.responseJSON[j].name + "</p>");

                            ul.append("<option id=\"more\"  value=\""+data.responseJSON[j].id+"\"> " + data.responseJSON[j].name + "</option><br>");
                        }



                    }
                });
            });

        });




    </script>
@endpush