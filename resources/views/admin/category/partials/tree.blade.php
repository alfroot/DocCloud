
@if (count($categories) > 0)
    <ul id="tree1">

        @foreach ($categories as $category)
            @if(empty($category->category_parent_id))
                <li>
                    {{ $category->name }}
                @include('admin.category.partials.category', $category)
                </li>
            @endif
        @endforeach

    </ul>
@else
    @include('admin.category.partials.category-none')
@endif








