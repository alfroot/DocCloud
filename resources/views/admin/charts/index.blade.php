@extends('admin.layouts.layout')


@section('header')
    <h1>
        Gráficos
        <small>Utiles</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href=""><i class="fa fa-area-chart"></i>Gráficos</a></li>
    </ol>
@endsection
@section('content')

    <div class="box box-dark">
        <div class="box-header with-border">
            <h3 class="box-title">Ingresos Anuales</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="mycanvas" style="height: 250px; width: 789px;" width="789" height="250"></canvas>
            </div>
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-eur"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number" id="number"></span>

                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped rounded" style="width: 100%"></div>
                    </div>

                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number" id="users"></span>

                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 70%"></div>
                    </div>

                    <span class="info-box-text">DocCloud</span>
                    <span class="info-box-number" id="doc"></span>

                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 30%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-dark">
        <div class="box-header with-border">
            <h3 class="box-title">Usuarios Registrados</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="mycanvas2" style="height: 250px; width: 789px;" width="789" height="250"></canvas>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-dark">
        <div class="box-header with-border">
            <h3 class="box-title">Documentos por Categorias</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="mycanvas1" style="height: 800px; width: 600px;"></canvas>
            </div>
        </div>
        <!-- /.box-body -->
    </div>






    @include ('footer')
@endsection

@push('styles')


@endpush

@push('scripts')



    <script src="/adminlte/bower_components/chart.js/dist/Chart.js"></script>
    <script src="/adminlte/bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="/adminlte/bower_components/chart.js/dist/Chart.bundle.js"></script>
    <script src="/adminlte/bower_components/chart.js/dist/Chart.bundle.min.js"></script>



    <script>


        $(document).ready(function(){

            $.ajax({
                url: "http://doccloud.dev/admin/charts/totals/",
                method: "GET",
                success: function(data) {

                   var total =  data[0].total.toFixed(2);
                    var users =  data[0].users.toFixed(2);
                    var doc =  data[0].doc.toFixed(2);

                    $("#number").append("<p>"+total +' €'+"</p>");
                    $("#users").append("<p>"+users +' €'+"</p>");
                    $("#doc").append("<p>"+doc +' €'+"</p>");


                },
                error: function(data) {

                }
            });

            $.ajax({
                url: "http://doccloud.dev/admin/charts/pays/",
                method: "GET",
                success: function(data) {

                    var player = [];
                    var score = [];


                    for(var i in data) {
                        player.push(data[i].mes + ' '+ data[i].year);
                        score.push(data[i].total);

                    }

                    var chartdata = {
                        labels: player,
                        datasets : [
                            {
                                label: '€',
                                backgroundColor: 'rgba(55, 72, 80, 1)',
                                borderColor: 'rgba(26, 34, 38, 1)',
                                hoverBackgroundColor: 'rgba(26, 34, 38, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: score,
                            }
                        ]
                    };

                    var ctx = $("#mycanvas");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata
                    });
                },
                error: function(data) {

                }
            });
        });
    </script>

    <script>


        $(document).ready(function(){
            $.ajax({
                url: "http://doccloud.dev/admin/charts/doccat/",
                method: "GET",
                success: function(data) {

                    var player = [];
                    var score = [];


                    Chart.defaults.global.legend.display = false;
                    Chart.defaults.global.legend.position = 'left';


                    for(var i in data) {
                        player.push(data[i].name);
                        score.push(data[i].total);
                    }

                    var chartdata = {
                        labels: player,
                        datasets : [
                            {
                                label: 'Documentos',
                                backgroundColor: 'rgba(55, 72, 80, 1)',
                                borderColor: 'rgba(26, 34, 38, 1)',
                                hoverBackgroundColor: 'rgba(26, 34, 38, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: score,

                            }
                        ]

                    };

                    var ctx = $("#mycanvas1");

                    var barGraph = new Chart(ctx, {
                        type: 'polarArea',
                        data: chartdata
                    });
                },
                error: function(data) {

                }
            });
        });
    </script>


    <script>


        $(document).ready(function(){
            $.ajax({
                url: "http://doccloud.dev/admin/charts/users/",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var player = [];
                    var score = [];

                    for(var i in data) {
                        player.push(data[i].mes + ' '+ data[i].year);
                        score.push(data[i].total);
                    }

                    var chartdata = {
                        labels: player,
                        datasets : [
                            {
                                label: 'Usuarios',
                                backgroundColor: 'rgba(0, 0, 0, 0)',
                                borderColor: 'rgba(26, 34, 38, 1)',
                                hoverBackgroundColor: 'rgba(26, 34, 38, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: score
                            }
                        ]
                    };

                    var ctx = $("#mycanvas2");

                    var barGraph = new Chart(ctx, {
                        type: 'line',
                        data: chartdata
                    });
                },
                error: function(data) {

                }
            });
        });
    </script>






@endpush