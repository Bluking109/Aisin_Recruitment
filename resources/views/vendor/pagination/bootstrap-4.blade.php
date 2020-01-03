@if ($paginator->hasPages())
    <div class="pagination" role="navigation">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="prev disabled"><a><i class="la la-long-arrow-left"></i> Prev</a></li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="la la-long-arrow-left"></i> Prev</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}">Next <i class="la la-long-arrow-right"></i></a></li>
            @else
                <li class="next disabled"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
