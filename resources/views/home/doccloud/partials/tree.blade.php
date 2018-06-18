@if(isset($categories) && isset($cat1))
    <div class="header pull-right danger m-r-10"><h3></i> {{$cat1->name}}
            <a href="{{route('treepub',0)}}" type="button" class="pull-right"><i class="fa fa-remove" style="color: #0b58a2"></i></a></h3>
    </div>

   <ul id="tree1">
       <div><i class="fa fa-paypal primary">&nbsp;</i><a href="{{route('showdoc',$data =[0, $cat1->id,$cat1->id])}}"> Comprar categoria</a></div>
        <div class="border"><p>Documentos hijos</p>

        @if(!empty($cat1['documents']))
            @foreach($cat1['documents'] as $document)
                @if(!empty($document->storage))
                    <div>

                        <a href="{{route('showdoc',$data =[$document->id, $document->category->id,0])}}" class="m-1 font-weight-light color-dark">&nbsp;&nbsp;&nbsp;&nbsp;{{$document->name}}
                            <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="20px" height="20px">
                            @if($document->premium == 1)
                                <span class="badge badge-light font-weight-bold">Premium</span>
                                @if($document->user->id == \Illuminate\Support\Facades\Auth::id())
                                    <i class="fa fa-user"></i>
                                    <i class="fa fa-unlock"></i>
                                @endif
                                @foreach($payments as $pay)


                                    @if($pay->document_id == $document->id)
                                        <i class="fa fa-unlock"></i>

                                    @endif


                                @endforeach
                            @endif
                        </a>
                    </div>
                @endif
            @endforeach
        @endif
        </div>
        @foreach ($categories as $category)


            @if($category->category_parent_id == $cat1->id)
                <li>
                    {{$category->name}}
                    <div><i class="fa fa-paypal primary">&nbsp;</i><a href="{{route('showdoc',$data =[0, $category->id,$category->id])}}">Comprar categoria</a></div>
                    @if(!empty($category['documents']))
                        @foreach($category['documents'] as $document)
                            @if(!empty($document->storage))
                                <div>

                                    <a href="{{route('showdoc',$data =[$document->id, $document->category->id,0])}}" class="m-1 font-weight-light color-dark">&nbsp;&nbsp;&nbsp;&nbsp;{{$document->name}}
                                        <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="20px" height="20px">
                                        @if($document->premium == 1)
                                            <span class="badge badge-light font-weight-bold">Premium</span>
                                            @if($document->user->id == \Illuminate\Support\Facades\Auth::id())
                                                <i class="fa fa-user"></i>
                                                <i class="fa fa-unlock"></i>
                                            @endif
                                            @foreach($payments as $pay)


                                                @if($pay->document_id == $document->id)
                                                    <i class="fa fa-unlock"></i>

                                                @endif


                                            @endforeach
                                        @endif
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @include('home.doccloud.partials.category', $category)
                </li>
            @endif


        @endforeach

    </ul>


@if(count($categories) == 0)
    @include('home.doccloud.partials.category-none')
@endif


@endif





