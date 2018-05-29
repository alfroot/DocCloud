@extends('home.layouts.layout')


@section('content')
    <div class="row">
        <div class="col-10">
            <div class="card">
                @if($document->premium == false)
                <iframe src = "/ViewerJS/?title={{$document->name}}#../storage/{{$document->storage}}" width=auto height='800' allowfullscreen webkitallowfullscreen></iframe>
                {{--<iframe src="http://docs.google.com/gview?url=http://www.alfonsopozo.es/f1hVwAsaG49QWITKKa7mPVwglFEq67UBjiDzCXb9.ppt&embedded=true" style="width:1000px; height:800px;" frameborder="0"></iframe>--}}
                @else
                    <div class="container-fluid">
                        <!-- Start Page Content -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="invoice" class="effect2">
                                    <div id="invoice-top">
                                        <div class="invoice-logo"></div>
                                        <div class="invoice-info">
                                            <h2>john doe</h2>
                                            <p> hello@Zebramin.com <br> +8801629599859
                                            </p>
                                        </div>
                                        <!--End Info-->
                                        <div class="title">
                                            <h4>Invoice #1069</h4>
                                            <p>Issued: February 15, 2018<br> Payment Due: February 27, 2018
                                            </p>
                                        </div>
                                        <!--End Title-->
                                    </div>
                                    <!--End InvoiceTop-->



                                    <div id="invoice-mid">

                                        <div class="clientlogo"></div>
                                        <div class="invoice-info">
                                            <h2>Client Name</h2>
                                            <p>mariam@gmail.com<br> 555-555-5555
                                                <br>
                                            </p></div>

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
                                                            <p class="itemtext">5€</p>
                                                        </td>

                                                    </tr>


                                                    <tr class="tabletitle">

                                                        <td></td>
                                                        <td></td>
                                                        <td class="Rate">
                                                            <h2>Total</h2>
                                                        </td>
                                                        <td class="payment">
                                                            <h2>5€</h2>
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
                @endif
            </div>
        </div>
    </div>



@endsection

@push('styles')

@endpush


@push('scripts')

@endpush