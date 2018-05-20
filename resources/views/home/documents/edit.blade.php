@extends('home.layouts.layout')




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
                                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="col-sm-4 control-label">Titulo</label>
                                <div class="col-sm-12">
                                    <input class="form-control input-rounded" name="name" value="{{ old('name', $document->name) }}" type="text"> {!! $errors->first('name', '<div class="alert alert-danger">:message</div>') !!}

                            </div>
                        </div>
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <div class="col-sm-12">
                                    <textarea name="description" id="editor"
                                              class="form-control"  style="resize: both; overflow: auto; height: 150px;"
                                              placeholder="Escribe una descripción para el Documento">{{ old('description', $document->description) }}</textarea>
                                    {!! $errors->first('description', '<div class="alert alert-danger">:message</div>') !!}
                                </div>
                                <br>

                                <div id="content" class="col-sm-12 border">
                                    <h6 class="box-title">Monetizar <img src="/images/if_money_36203.png" alt=""></h6>
                                    <select name="premium">

                                        <option value="1" {{ $document->premium == 1 ? 'selected' : '' }} >Si</option>
                                        <option value="0"  {{ $document->premium == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <br>
                                    <br>
                                </div>
                                <br>

                                <div class="input-group">
                                    <div class="col-sm-12">

                                        @if(isset($document->category->name))
                                            <div class="control-label pull-right">Categoria actual: <p class="color-primary">{{$document->category->name}}</p></div>
                                        @endif
                                        <div>
                                        <label for="dad">Buscador de categorias</label>
                                        <input placeholder="Introduce la categoria" id="dad" class="form-control input-rounded">
                                        {!! $errors->first('category_id', '<div class="alert alert-danger">:message</div>') !!}
                                        </div>
                                    </div>
                                    <br>


                                    <div id="content" class="col-sm-12" style="display: none">
                                        <div class="box box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Categorías Sugeridas</h3>
                                            </div>
                                            <div class="box-body">
                                                <div id="showcat" class="col" style="resize: both; overflow: auto; height: 150px;">

                                                </div>
                                                <br>
                                                <br>
                                                <label for="select">Selecciona la categoria</label>
                                                <select  id="childs" name="category_id" class="form-control select2">

                                                    @if(isset($document->category))
                                                        <option value="{{$document->category->id}}">{{$document->category->name}}</option>
                                                    @endif
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
                      <br>
                      <hr>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                      </div>
                    </div>
            </div>

    </form>
    @if (!empty($document->storage))

        <div class="col-md-12 pull-right">

            <div class="card p-30">
                <div class="card-title"><h4>Sustituir documento</h4></div>
                <div class="media">
                    <form action="{{ route('destroyfile', $document) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <div class="">
                            <button class="btn btn-danger btn-xs" style="position: absolute">
                                <i class="fa fa-remove"></i>
                            </button>
                            <div>
                                <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="75px" height="75px"/>
                                <b>{{$document->url}}.{{$document->extension->name}}</b>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    @endif
        </div>
        @if(empty($document->storage))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Dropzone</h4>
                            <h6 class="card-subtitle"></h6>
                            <div class="form-goup col-md-12">
                                <div class="dropzone"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif




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

                    url: 'http://doccloud.dev/category/getcats/',
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

                        for (var j = 0; j  < data.responseJSON.length  ; j++) {
                            $("#showcat").append("<b class=\"\"> " + data.responseJSON[j].name + "</b><br>");

                            ul.append("<option id=\"more\"  value=\""+data.responseJSON[j].id+"\"> " + data.responseJSON[j].name + "</option><br>");
                        }



                    }
                });
            });

        });




    </script>
@endpush