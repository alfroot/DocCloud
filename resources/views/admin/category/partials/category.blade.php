

@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            @if($category['aceptada'] == 'si')
            <li>
                {{$category['name']}}
                @include('admin.category.partials.category', $category)
            </li>
            @endif
        @endforeach
    </ul>
@endif