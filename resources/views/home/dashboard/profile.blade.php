<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card-two">
                    <header>
                        <div class="avatar">
                            <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker" />
                        </div>
                    </header>
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
                    <p class="text-muted">{{$user->created_at}}</p>
                </div>
            </div>
        </div>
        <hr>


    </div>
</div>