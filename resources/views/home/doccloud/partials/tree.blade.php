
@if (count($categories) > 0)
    <ul id="tree1">

        @foreach ($categories as $category)
            @if(empty($category->category_parent_id))
                <li>
                    DocCloud
                    @include('home.doccloud.partials.category', $category)
                </li>
            @endif
        @endforeach

    </ul>
@else
    @include('home.doccloud.partials.category-none')
@endif








