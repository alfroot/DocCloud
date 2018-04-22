<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-xs-6 b-r"> <strong>Nombre</strong>
                <br>
                <p class="text-muted">{{$user->name}}</p>
            </div>
            <div class="col-md-3 col-xs-6 b-r"> <strong>Apellidos</strong>
                <br>
                <p class="text-muted">{{$user->lastname}}</p>
            </div>
            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                <br>
                <p class="text-muted">{{$user->email}}</p>
            </div>
            <div class="col-md-3 col-xs-6"> <strong>Usuario Desde:</strong>
                <br>
                <p class="text-muted">{{$user->created_at}}</p>
            </div>
        </div>
        <hr>

        <h4 class="font-medium m-t-30">Skill Set</h4>
        <hr>
        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
        </div>
        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
        </div>
        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
        <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
        </div>
        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
        <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
        </div>
    </div>
</div>