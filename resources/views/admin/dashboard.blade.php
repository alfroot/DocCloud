@extends('admin.layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-pdf-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Documentos</span>
                    <span class="info-box-number">{{$data[0]}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa fa-sitemap"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">{{$data[2]}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cc-paypal"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pagos</span>
                    <span class="info-box-number">{{$data[1]}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">{{$data[3]}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>



    @if(isset($lastmembers))
    <div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Usuarios registrados en el último mes</h3>

            <div class="box-tools pull-right">
                <span class="label label-danger">{{count($lastmembers)}}</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">

                    @foreach($lastmembers as $member)
                <li>
                    <img src="/storage/{{$member->profilephoto}}" alt="User Image" style="width: 50px; height: 50px;">
                    <p>{{$member->name.' '.$member->lastname}}</p>
                    <span class="users-list-date">{{ $member->created_at->diffForHumans() }}</span>
                </li>
                @endforeach

            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="/admin/users" class="uppercase">Ver Todos</a>
        </div>
        <!-- /.box-footer -->
    </div>
    </div>
    @endif
@endsection
