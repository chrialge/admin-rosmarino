@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between mb-4">
        <div class="d-flex justify-content-between flex-fill d-sm-none align-items-center">

            <p style="font-weight: 600; color: hsl(228, 85%, 63%); margin: 0;">
                {{ 'Pagina ' . $paginator->currentPage() }}
            </p>

            <div class="pagination_new">
                {{-- Previous Page Link --}}


                @if ($paginator->onFirstPage())
                @else
                    <a class="btn_page" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <i class="ri-arrow-left-circle-fill"></i>
                    </a>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="btn_page" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">
                        <i class="ri-arrow-right-circle-fill"></i>
                    </a>
                @else
                @endif
            </div>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p style="font-weight: 600; color: hsl(228, 85%, 63%); margin: 0;">
                    {{ 'Pagina ' . $paginator->currentPage() }}
                </p>
            </div>

            <div>
                <div class="pagination_new">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    @else
                        <a class="btn_page" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">
                            <i class="ri-arrow-left-circle-fill"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <div data-tooltip="Pagina {{ $page }}"
                                class="pagination__dot pagination__dot--active"></div>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <div data-tooltip="Pagina {{ $page }}"
                                        class="pagination__dot pagination__dot--active"></div>
                                @else
                                    <a href="{{ $url }}" data-tooltip="Pagina {{ $page }}"
                                        class="pagination__dot"></a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a class="btn_page" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">
                            <i class="ri-arrow-right-circle-fill"></i>
                        </a>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
