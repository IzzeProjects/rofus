@if ($paginator->hasPages())
    <div class="content-wrapper__records-pagination">
        @if (!$paginator->onFirstPage())<a href="{{ $paginator->previousPageUrl() }}" class="records-pagination_item"><</a>@endif
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{ $url }}" class="records-pagination_item pagination_item-active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="records-pagination_item">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        {{--<div class="records-pagination_item-dots">...</div>--}}
        @if ($paginator->hasMorePages())<a href="{{ $paginator->nextPageUrl() }}" class="records-pagination_item">></a>@endif
    </div>
@endif
