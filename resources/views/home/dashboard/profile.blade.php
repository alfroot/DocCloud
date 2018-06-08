<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <div class="card-two">
                    <header>


                        <div class="avatar">
                            <img class="" src="/storage/{{$user->profilephoto}}"  />
                        </div>


                    </header>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title center">Foto</h4>
                            <h6 class="card-subtitle"></h6>
                            <div class="form-goup col-md-12">
                                <div class="dropzone"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-6 col-xs-6 b-r"> <strong>Nombre</strong>
                    <br>
                    <p class="text-muted">{{$user->name}}</p>
                </div>
                <div class="col-md-6 col-xs-6 b-r"> <strong>Apellidos</strong>
                    <br>
                    <p class="text-muted">{{$user->lastname}}</p>
                </div>
                <div class="col-md-6 col-xs-6 b-r"> <strong>Email</strong>
                    <br>
                    <p class="text-muted">{{$user->email}}</p>
                </div>
                <div class="col-md-6 col-xs-6"> <strong>Usuario Desde:</strong>
                    <br>
                    <p class="text-muted">{{$user->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">

        </div>

    </div>
</div>

@push('scripts')



@endpush