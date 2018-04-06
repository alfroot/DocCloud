

@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            <li>
                {{$category['name']}}
            @include('admin.category.partials.category', $category)
            </li>
        @endforeach
    </ul>
@endif