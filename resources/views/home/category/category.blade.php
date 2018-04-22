@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Categorias</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Categorias</li>
                <li class="breadcrumb-item active">Proponer Categorias</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <!-- /# row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Basic Elements</h4>

                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input type="text" class="form-control" value="Some text value...">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="example-email" class="form-control" type="email" placeholder="Email" name="example-email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" value="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Text area</label>
                                        <textarea class="form-control" rows="3" placeholder="Text input"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Readonly</label>
                                        <input class="form-control" type="text" value="Readonly value" readonly="">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Disabled</label>
                                        <input class="form-control" type="text" value="Disabled value" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>Static control</label>
                                        <p class="form-control-static">email@example.com</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Helping text</label>
                                        <input class="form-control" type="text" placeholder="Helping text">
                                        <span class="help-block">
														<small>A block of help text that breaks onto a new line and may extend beyond one line.</small>
													</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Input Select</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Multiple Select</label>
                                        <select multiple class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Horizontal Form Elements</h4>

                </div>
                <div class="card-body">
                    <div class="horizontal-form-elements">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Text Input</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="Some text value...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" value="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Text Area</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" placeholder="Text input"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Readonly</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="Readonly value" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Disabled</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="Disabled value" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <!-- /# column -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Static Control</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static">email@example.com</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Helping text</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Helping text">
                                            <span class="help-block">
																<small>A block of help text that breaks onto a new line and may extend beyond one line.</small>
															</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Input Select</label>
                                        <div class="col-sm-10">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Multiple Select</label>
                                        <div class="col-sm-10">
                                            <select multiple class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# column -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
@endsection
