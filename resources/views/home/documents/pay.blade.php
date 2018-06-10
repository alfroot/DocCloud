@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Comprar</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/documents/index">Documentos</a></li>
                <li class="breadcrumb-item active">Comprar</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div id="invoice" class="effect2">
                <div id="invoice-top">

                    <div class="clientlogo">
                        <img class="clientlogo" src="/storage/{{$user->profilephoto}}" class=\"media-object\">
                    </div>
                    <div class="invoice-info">
                        <h2>{{$user->name}} {{$user->lastname}}</h2>
                        <p>{{$user->email}}<br>
                            <br>
                        </p></div>
                    <!--End Info-->
                    <div class="title">
                        <h4>Nueva compra</h4>
                        <p>Fecha: {{\Carbon\Carbon::parse(now())}}<br>
                        </p>
                    </div>
                    <!--End Title-->
                </div>
                <!--End InvoiceTop-->



                <div id="invoice-mid">



                    <div id="project">
                        <h2>Descripción de la compra</h2>
                        <p>Compra de documento premium, al comprar este documento obtendrá los derechos de descarga y uso de por vida sobre este documento. Si deseas comprar los
                            mismos derechos sobre la categoria <b>{{$document->category->name}}</b> y asi disfrutar de todos sus documentos <a
                                    href="">Pulsa Aquí.</a></p>
                    </div>

                </div>
                <!--End Invoice Mid-->

                <div id="invoice-bot">

                    <div id="invoice-table">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody><tr class="tabletitle">
                                    <td class="table-item">
                                        <h2>Documento</h2>
                                    </td>
                                    <td class="Hours">
                                        <h2>Categoria</h2>
                                    </td>

                                    <td class="subtotal">
                                        <h2>Tipo</h2>
                                    </td>
                                    <td class="subtotal">
                                        <h2>Precio</h2>
                                    </td>


                                </tr>

                                <tr class="service">
                                    <td class="tableitem">
                                        <p class="itemtext">{{$document->name}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext">{{$document->category->name}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext">{{$document->extension->description}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext">{{$document->price}} €</p>
                                    </td>

                                </tr>


                                <tr class="tabletitle">

                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                        <h2>Total</h2>
                                    </td>
                                    <td class="payment">
                                        <h2>{{$document->price}} €</h2>
                                    </td>
                                </tr>

                                </tbody></table>
                        </div>
                    </div>
                    <!--End Table-->


                    <a href="{{ route('paypalproduct', $document) }}"><img src="/ElaAdmin/images/paypal.png"></a>

                </div>
                <!--End InvoiceBot-->
            </div>
            <!--End Invoice-->
        </div>
    </div>
    <!-- End PAge Content -->
</div>
            </div>
        </div>
    </div>
@endsection