
<div class="tab-pane active" id="home" role="tabpanel">
    <div class="card-body">
        @if(isset($userfilt))
            <div class="header pull-right danger m-r-10"><h3><i class="fa  fa-user"></i> {{$userfilt}}
                <a href="{{route('home')}}" type="button" class="pull-right"><i class="fa fa-remove"></i></a></h3>
            </div>
        @endif
        @if(isset($cat))
            <div class="header pull-right danger m-r-10"><h3><i class="fa fa-cubes"></i> {{$cat}}
                <a href="{{route('home')}}" type="button" class="pull-right"><i class="fa fa-remove"></i></a></h3>
            </div>
        @endif
        @if(isset($tag))
            <div class="header pull-right danger m-r-10"><h3><i class="fa fa-tag"></i> {{$tag}}
                <a href="{{route('home')}}" type="button" class="pull-right"><i class="fa fa-remove"></i></a></h3>
            </div>
        @endif
        @if(isset($ext))
            <div class="header pull-right danger m-r-10"><h3><i class="fa  fa-file-o"></i> {{$ext}}
                <a href="{{route('home')}}" type="button" class="pull-right"><i class="fa fa-remove"></i></a></h3>
            </div>
        @endif

        <div class="profiletimeline">

            @foreach($documentstimeline as $document)
            <div class="sl-item">
                <div class="sl-left "> <img  src="/storage/{{$document->user->profilephoto}}" alt="user" class="img-responsive img-circle" /> </div>
                <div class="sl-right">
                    <div><a href="{{route('filterUser',$document->user_id)}}" id="guide{{$document->id}}" class="link">{{$document->user->name}} {{$document->user->lastname}}</a> <span class="sl-date">{{ $document->created_at->diffForHumans() }}</span>
                        <p>Añadió un archivo de tipo {{$document->extension->description}} en<a href="{{route('filterCat', $document->category_id)}}" style="color: #0b3e6f;"> {{$document->category->name}}</a></p>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 m-b-20">
                                  <h4><b>Título: </b>{{$document->name}}
                                      @if($document->tags)

                                      <div class="pull-right">
                                          <h4>Etiquetas: </h4>
                                      @foreach($document->tags as $tag)
                                              <a href="{{route('filterTag',$tag->id)}}"><span class="badge badge-warning">#{{$tag->name}}</span></a>
                                      @endforeach
                                      </div>

                                      @endif
                                  </h4>
                                @if(isset($document->description))
                                    <p><b>Descripción: </b> {{$document->description}}</p>
                                @endif


                            </div>
                            <div class="col-lg-12">
                                <a href="{{route('filterExt',$document->extension_id)}}"><img class="pull-right" src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="50px" height="50px"/></a>

                            </div>
                         </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-6 m-b-20">
                                <div class="like-comm">
                                    <form action="{{ route('like', $document->id) }}" method="POST" id="formlike{{$document->id}}">
                                        {{ csrf_field() }}
                                        <a href="#" id="link{{$document->id}}" ><i class="fa fa-thumbs-o-up"></i> {{count($document->likes)}}</a>

                                        <input type="hidden" name="id" value="{{$document->id}}">

                                    </form>
                                </div>

                            </div>
                            <div class="col-lg-8">




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach

            <div class="aling-center">{{$documentstimeline->render()}}</div>




        </div>
    </div>
</div>

