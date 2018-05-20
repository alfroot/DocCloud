

@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            @if($category['accepted'])
            <li>
                {{$category['name']}}
                @if(!empty($category['documents']))
                   @foreach($category['documents'] as $document)
                        <p class="m-1 font-weight-light color-dark">{{$document->name}}
                            <span class="badge badge-info font-weight-bold">{{isset($document->extension->name) ? $document->extension->name : ''}}</span>
                            @if($document->premium == 1)
                                <img src="/images/if_money_36203.png" alt="">
                            @endif
                        </p>
                    @endforeach
                @endif
                @include('home.doccloud.partials.category', $category)
            </li>
            @endif
        @endforeach
    </ul>
@endif