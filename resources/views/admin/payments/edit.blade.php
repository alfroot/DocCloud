@extends('admin.layouts.layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Compras</h3>
            <a
                    href={{ route('admin.payment.index') }}
                            class="btn btn-primary pull-right"
            >
            Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::model($payment,['action' => ['Admin\PaymentsController@update', $payment->id], 'method' => 'PUT']) !!}

            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="">Usuario </label>
                <select name="user_id" class="form-control select2">
                    <option value=" ">Ninguno</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                                {{ old('user_id', $payment->user_id) == $user->id ? 'selected' : '' }}
                        >{{ $user->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('document_id') ? 'has-error' : '' }}">
                <label for="">Documento</label>
                <select name="document_id" class="form-control select2">
                    <option value=" ">Ninguno</option>
                    @foreach($documents as $document)
                        <option value="{{ $document->id }}"
                                {{ old('document_id', $payment->document_id) == $document->id ? 'selected' : '' }}
                        >{{ $document->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('document_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="">Precio</label>
                <input type="text" name="price" class="form-control"
                       value="{{ old('price', $payment->price) }}"
                       placeholder="Escribe el precio">
                {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
            </div>

            {{ Form::bsSubmit('EDITAR', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection