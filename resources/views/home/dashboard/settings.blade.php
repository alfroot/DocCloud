<div class="tab-pane" id="settings" role="tabpanel">
    <div class="card-body">

        {!! Form::model($user,['action' => ['UsersController@update', $user->id ], 'class' => 'form-horizontal form-material','method' => 'PUT']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="col-md-12">Nombre</label>
                <div class="col-md-12">
                    <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Escribe el nombre "
                            class="form-control form-control-line"
                    >
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                <label class="col-md-12">Apellidos</label>
                <div class="col-md-12">
                    <input
                            type="text"
                            name="lastname"
                            value="{{ old('lastname', $user->lastname) }}"
                            placeholder="Escribe el apellido "
                            class="form-control form-control-line"
                    >
                    {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                    <input
                            type="email"
                            placeholder="Escribe tu email"
                            class="form-control form-control-line"
                            name="email"
                            id="example-email"
                            value="{{ old('email', $user->email) }}"
                    >
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="col-md-12">Contraseña</label>
                <div class="col-md-12">
                    <input
                            type="password"
                            name="password"
                            class="form-control form-control-line"
                            placeholder="Escribe la contraseña"
                    >
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Update Profile</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>