@extends('home.layouts.layout')


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
            <div class="card" id="content">
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
                                <input class="tdl-new form-control" placeholder="Type here" type="text">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="col-lg-6">

                    <!-- /# card -->
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
                                <input class="tdl-new form-control" placeholder="Type here" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="col-lg-6">

                    <!-- /# card -->
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


                        var ul = $("#userresult");

                        $("#contentt").show();
                        $("#showcat").empty();
                        ul.empty();

                        for (var j = 0; j  < data.responseJSON.length  ; j++) {
                            //$("#showcat").append("<b class=\"\"> " + data.responseJSON[j].name + "</b><br>");

                            //ul.append("<option id=\"more\"  value=\""+data.responseJSON[j].id+"\"> " + data.responseJSON[j].name + "</option><br>");
                            ul.append("<div class=\"media\">" +
                                "                        <div class=\"media-left\">" +
                                "                            <a href=\"#\"><img alt=\"...\" src=\"/ElaAdmin/images/avatar/1.jpg\" class=\"media-object\"></a>" +
                                "                        </div>" +
                                "                        <div class=\"media-body\">" +
                                "                            <h4 class=\"media-heading\">"+ data.responseJSON[j].name +' '+ data.responseJSON[j].lastname +"</h4>" +
                                "                            <p>Cras sit amet nibh libero, in gravida nulla. </p>" +
                                "                            <p class=\"comment-date\">October 21, 2018</p>" +
                                "                        </div>" +
                                "                    </div>")
                        }



                    }
                });
            });

        });




    </script>
@endpush