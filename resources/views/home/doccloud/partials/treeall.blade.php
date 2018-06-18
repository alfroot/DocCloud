
@if(isset($all))
 @if (count($all) > 1)
    <ul id="tree1">

        @foreach ($all as $category)


            @if(empty($category->category_parent_id))
                <li>
                    {{$category->name}}  <div><i class="fa fa-paypal primary">&nbsp;</i><a href="{{route('showdoc',$data =[0, $category->id,$category->id])}}">Comprar categoria.</a></div>
                    @include('home.doccloud.partials.category', $category)
                </li>
            @endif


        @endforeach

    </ul>
@endif

 @if(count($all) == 0)
    @include('home.doccloud.partials.category-none')
    @endif
@endif







