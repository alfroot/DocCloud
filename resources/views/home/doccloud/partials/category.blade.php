

@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            @if($category['accepted'])
            <li>
                {{$category['name']}}

                @if(!empty($category['documents']))
                   @foreach($category['documents'] as $document)
                        @if(!empty($document->storage))
                        <div>

                            <a href="{{route('showdoc',$document->id)}}" class="m-1 font-weight-light color-dark">{{$document->name}}
                            <img src="/ElaAdmin/images/typesdoc/{{$document->extension->name}}.png" class="radius" width="20px" height="20px">
                            @if($document->premium == 1)
                                <span class="badge badge-light font-weight-bold">Premium</span>
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