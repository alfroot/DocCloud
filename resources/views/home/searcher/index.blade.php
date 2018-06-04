@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Encuentra</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dasboard</a></li>
                <li class="breadcrumb-item active">Encuentra</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuarios</h4>
                    <div class="card-content">
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">

                                </div>

                                <input id="user" class="tdl-new form-control" placeholder="Encuenta a un usuario..." type="text">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="content" >
                <div class="card-title">
                    <h4>Usuarios</h4>
                </div>
                <div id="userresult" class="recent-comment">


                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Documentos</h4>
                    <div class="card-content">
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">

                                </div>
                                <input id="document" class="tdl-new form-control" placeholder="Encuentra un documento..." type="text">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card" id="content1" >
                <div class="card-title">
                    <h4>Documentos</h4>
                </div>
                <div id="documentresult" class="recent-comment">


                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categorias</h4>
                    <div class="card-content">
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">

                                </div>
                                <input id="category" class="tdl-new form-control" placeholder="Encuentra una categoria..." type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="content2">
                <div class="card-title">
                    <h4>Categorias</h4>
                </div>
                <div id="categoryresult" class="recent-comment">


                </div>
            </div>

        </div>

    </div>


@endsection

@push('styles')

@endpush


@push('scripts')

    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>

        $("#content").hide();
        $("#content1").hide();
        $("#content2").hide();

        $(document).ready(function(){

            $("#user").keyup(function(){

                var user = $("#user").val();
                $.ajax({
                    type: 'POST',

                    url: 'http://doccloud.dev/search/users/',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "users": user

                    },
                    beforeSend: function() {

                    },
                    success: function(data) {

                        return data;

                    },
                    error: function() {

                    },
                    complete: function(data) {
                        //alert('complete');





                        if(user.length == 0){

                            $("#content").hide();
                        }else {

                            $("#content").show();
                            var ul = $("#userresult");
                            ul.empty();

                            for (var j = 0; j  < data.responseJSON.length  ; j++) {
                                ul.append("<div class=\"media\">" +
                                    "                        <div class=\"media-left\">" +
                                    "                            <a href=\"#\"><img alt=\"...\" src=\"/storage/"+ data.responseJSON[j].profilephoto +"\" class=\"media-object\"></a>" +
                                    "                        </div>" +
                                    "                        <div class=\"media-body\">" +
                                    "                            <h4 class=\"media-heading\">"+ data.responseJSON[j].name +' '+ data.responseJSON[j].lastname +"</h4>" +
                                    "                            " +
                                    "                        </div>" +
                                    "                    </div>")
                            }
                        }



                    }
                });
            });

        });

        $(document).ready(function(){

            $("#document").keyup(function(){

                var document = $("#document").val();
                $.ajax({
                    type: 'POST',

                    url: 'http://doccloud.dev/search/documents/',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "documents": document

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

                        if(document.length == 0){

                            $("#content1").hide();
                        }else {

                            $("#content1").show();
                            var ul = $("#documentresult");
                            ul.empty();



                            for (var j = 0; j < data.responseJSON.length; j++) {
                                var fecha = data.responseJSON[j].created_at;

                                var formattedDate = new Date(fecha);
                                var m =  formattedDate.getMonth();
                                var y = formattedDate.getFullYear();
                                var pago = data.responseJSON[j].premium;

                                if(pago == 1){
                                    var imagepay = "<img class=\"pull-right\" src=\"/images/finance.png\">";
                                }else {
                                    imagepay = '';
                                }

                                ul.append("<div class=\"media\">" +
                                    "                        <div class=\"media-left\">" +
                                    "                            <a href=\"/show/document/"+data.responseJSON[j].id+"\"><img src=\"/ElaAdmin/images/typesdoc/"+data.responseJSON[j].extension.name+".png\" class=\"media-object\"></a>" +
                                    "                        </div>" +

                                    "                        <div class=\"media-body\">" +
                                    "                            <a href=\"/show/document/"+data.responseJSON[j].id+"\"><h4 class=\"media-heading\">" + data.responseJSON[j].name + ""+imagepay+"</h4></a>" +
                                    "                            <p>" + data.responseJSON[j].description.substr(0,50) +'..'+ "</p>" +
                                    "                            <p class=\"\">" + m+'/' + y + "</p>" +
                                    "                        </div>" +
                                    "                    </div>")
                            }

                        }

                    }
                });
            });

        });

        $(document).ready(function(){

            $("#category").keyup(function(){

                var category = $("#category").val();
                $.ajax({
                    type: 'POST',

                    url: 'http://doccloud.dev/search/categories/',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "categories": category

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

                        if(category.length == 0){

                            $("#content2").hide();
                        }else {

                            $("#content2").show();

                            var ul = $("#categoryresult");
                            ul.empty();

                            for (var j = 0; j < data.responseJSON.length; j++) {
                                ul.append("<div class=\"media\">" +
                                    "                        <div class=\"media-left\">" +
                                    "                            <a href=\"#\"></a>" +
                                    "                        </div>" +
                                    "                        <div class=\"media-body\">" +
                                    "                            <h4 class=\"media-heading\">" + data.responseJSON[j].name + "</h4>" +
                                    "                            <p>" + data.responseJSON[j].description.substr(0,50) +'..'+ "</p>" +
                                    "                        </div>" +
                                    "                    </div>")
                            }

                        }

                    }
                });
            });

        });

    </script>
@endpush