@props(['tags' => null , 'href' => null ])

<ul class="listing-meta d-flex justify-content-center align-items-center">
    <li>
        @foreach($tags as $tag)

            <a href="{{ $href }}/?tag={{ $tag }}" class="listing-cat-link">{{ $tag }}</a>

            @if(!$loop->last)
                ,
            @endif

        @endforeach
    </li>
</ul>
