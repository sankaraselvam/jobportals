@if ($paginator->hasPages())
    <ul class="pagination mt-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled me-auto"><span class="page-link b-radius-none">Prev</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">Prev</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled me-auto"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next</a></li>
        @else
            <li class="disabled"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next</a></li>
        @endif
    </ul>
@endif