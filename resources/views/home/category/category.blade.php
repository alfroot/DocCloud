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
                    <h4>Proponer Categoria</h4>

                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label>Nombre de la categoria</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               value="{{ old('name') }}"
                                               placeholder="Escribe el nombre de la categoria"
                                        >
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>

                                    <div class="form-group {{ $errors->has('category_parent_id') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            <label>Seleccione la categoria padre</label>
                                            <select class="form-control"
                                                    name="category_parent_id"
                                            >
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                    >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('category_parent_id', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label>Descripción de la categoria</label>
                                        <textarea class="textarea_editor form-control"
                                                  rows="15" name="description"
                                                  placeholder="Escribe la descripción de la categoria"
                                                  style="height:100px">{{ old('description') }}</textarea>
                                    </div>
                                    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                    <button type="submit" class="btn btn-info float-right">Proponer</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
