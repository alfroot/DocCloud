@extends('admin.layouts.layout')
@section('header')
<h1>Categorias</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class=""><a href="{{ route('admin.category.index') }}"><i class="fa fa-tags"></i>Categorias</a></li>
    <li class="active"><a href=""><i class="fa fa-pencil"></i>Editar</a></li>
</ol>
@endsection
@section('content')

    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">Editar Categoria</h3>
            <a
                    href={{ route('admin.category.index') }}
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::model($category,['action' => ['Admin\CategoriesController@update', $category->id], 'method' => 'PUT']) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $category->name) }}"
                       placeholder="Escribe el nombre de la categoria">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="">Descripción de la categoria</label>
                <textarea name="description" id="editor"
                          class="form-control" rows="10"
                          placeholder="Escribe la descripción de la categoria">{{ old('description', $category->description) }}</textarea>
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="box-header with-border">
                <h6 class="box-comment">Padre actual: </h6> <b>{{$category->parent->name}}</b>

            </div>
            <br>




            <label for="">Buscador</label>
            <input placeholder="Introduce la categoria" id="dad" class="form-group">



            <div id="content" class="form-group col-md-12" style="display: none">
                <div class="box box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categorías</h3>
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
                <select name="accepted" class="">
                    <option value="1" {{ old('accepted', $category->accepted) == 'si' ? 'selected' : '' }}>Si</option>
                    <option value="0" {{ old('accepted', $category->accepted) == 'no' ? 'selected' : '' }}>No</option>
                </select>
                {!! $errors->first('accepted', '<span class="help-block">:message</span>') !!}
            </div>

        {{ Form::bsSubmit('Editar', ['class'=>'btn btn-primary']) }}
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

                url: 'http://doccloud.dev/admin/category/getcatsper/',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": dad,
                    "id" : "{{$category->id}}"
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