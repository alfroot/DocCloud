@extends('home.layouts.layout')
@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Monedero</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/money/index">Monedero</a></li>

            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Recibido en los últimos 12 meses</h4>
                </div>
            </div>
            <div class="panel-body"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                <canvas id="mycanvas" height="531" style="display: block; width: 1062px; height: 531px;" width="1062"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 id="tot"></h2>
                    <p class="m-b-0">Monedero</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
                url: "http://doccloud.dev/money/totals/",
                method: "GET",
                success: function(data) {

                    var player = [];
                    var score = [];


                    for(var i in data) {
                        player.push(data[i].mes + ' '+ data[i].year);
                        score.push(data[i].total);
                        score.push(data[i].num)

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
                url: "http://doccloud.dev/money/total/",
                method: "GET",
                success: function(data) {

                  if(data[0].total == null) {
                      $('#tot').append('0€');
                  }else {
                      $('#tot').append(data[0].total + '€');
                  }

                },
                error: function(data) {

                }
            });
        });
    </script>
@endpush


