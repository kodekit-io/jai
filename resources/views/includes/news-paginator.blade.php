@if ($paginator->hasPages())
    <ul class="uk-pagination uk-pagination-left uk-margin-large-bottom">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="page-item uk-disabled"><span><i class="uk-icon-arrow-left"></i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span><i class="uk-icon-arrow-left"></i></span></a></li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="page-item uk-disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item uk-active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="uk-icon-arrow-right"></i></a></li>
        @else
            <li class="page-item uk-disabled"><span class="page-link"><i class="uk-icon-arrow-right"></i></span></li>
        @endif
    </ul>
@endif
