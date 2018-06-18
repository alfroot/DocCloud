@if(isset($category))

 @if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            @if($category['accepted'])
            <li>
                {{$category['name']}}
                <div><i class="fa fa-paypal primary">&nbsp;</i><a href="{{route('showdoc',$data =[0, $category->id,$category->id])}}">Comprar categoria.</a></div>

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

@endif
@endif