<div class="tab-pane active" id="home" role="tabpanel">
    <div class="card-body">
        <div class="profiletimeline">
            @foreach($documentstimeline as $document)
            <div class="sl-item">
                <div class="sl-left"> <img src="/ElaAdmin/images/users/avatar-1.jpg" alt="user" class="img-circle" /> </div>
                <div class="sl-right">
                    <div><a href="#" class="link">{{$document->user->name}}</a> <span class="sl-date">{{ $document->created_at->diffForHumans() }}</span>
                        <p>Añadió un archivo de tipo {{$document->extension->description}} en<a href="#" style="color: #0b3e6f;"> {{$document->category->name}}</a></p>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 m-b-20">
                                <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="50px" height="50px"/>
                                <h4 class="">{{$document->name}}</h4>
                                <p>{{$document->description}}</p>
                            </div>
                         </div>
                        <div class="like-comm">
                            <form action="{{ route('like', $document->id) }}" method="POST" id="formlike{{$document->id}}">
                                {{ csrf_field() }}
                            <a href="#" id="link{{$document->id}}" ><i class="fa fa-thumbs-o-up"></i> {{count($document->likes)}}</a>

                            <input type="hidden" name="id" value="{{$document->id}}">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach





        </div>
    </div>
</div>

