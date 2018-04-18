@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            <li>
                <a href="{{ route('doccloud.pages') }}">{{$category['name']}}</a>
                @include('pages.category-partials.category', $category)
            </li>
        @endforeach
    </ul>
@endif