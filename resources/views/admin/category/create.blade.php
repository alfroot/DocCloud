@extends('admin.layouts.layout')
@section('header')
    <h1>Categorias</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class=""><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
        <li class="active"><a href=""><i class="fa fa-plus"></i>Crear</a></li>
    </ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear Categorias</h3>
            <a
                    href={{ route('admin.category.index') }}
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::open(['action' => 'Admin\CategoriesController@store', 'method' => 'POST']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}"
                       placeholder="Escribe el nombre de la categoria">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="">Descripción de la categoria</label>
                <textarea name="description" id="editor"
                          class="form-control" rows="10"
                          placeholder="Escribe la descripción de la categoria">{{ old('description') }}</textarea>
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>

            <label for="">Buscador de categoría padre</label>
            <input placeholder="Introduce la categoria" id="dad" class="form-group">
            {!! $errors->first('category_parent_id', '<span class="help-block">:message</span>') !!}


            <div id="content" class="form-group col-md-12" style="display: none">
                <div class="box box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categoría padre   </h3>
                    </div>
                    <div class="box-body"  >
                        <div id="showcat" class="row"></div>
                        <select  id="childs" name="category_parent_id" class="form-control select2">
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group {{ $errors->has('accepted') ? 'has-error' : '' }}">
                <label for="">Aceptar</label>
                <select name="accepted" class="form-control select2">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                {!! $errors->first('accepted', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('Crear', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@push('scripts')
    <script>


        $(document).ready(function(){

            $("#dad").keyup(function(){

                var dad = $("#dad").val();
                $.ajax({
                    type: 'POST',

                    url: '/admin/category/getcats/',
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

                        for (var j = 0; j  < data.responseJSON.length ; j++) {
                            $("#showcat").append("<h6 class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\" type=\"radio\"> " + data.responseJSON[j].name + "</h6>");

                            ul.append("<option id=\"more\" value=\""+data.responseJSON[j].id+"\"> " + data.responseJSON[j].name + "</option><br>");
                        }



                    }
                });
            });

        });




    </script>

@endpush