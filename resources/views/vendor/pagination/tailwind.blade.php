<style>
    .ro-paginate {
        display: flex;
        margin-bottom: 20px;
    }
    .ro-paginate a{
        color: rgb(116,116,116);
        display: inline-block;
        text-decoration: none;
    }
    .ro-paginate a:hover{
        background-color: rgb(248,248,248);
        transition: all 100ms linear;
    }
    .ro-paginate span{
        color: rgb(116,116,116);
        display: inline-block;
    }
</style>
@if ($paginator->hasPages())
    <nav class="ro-pagination" role="navigation" aria-label="Pagination Navigation">
        <div style="display: flex; width: 100%; flex-wrap: wrap;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <a style="width: 55px; height: 55px; margin-right: 5px;" href="{{ $paginator->previousPageUrl() }}" rel="prev" class="border border-gray-300" aria-label="{{ __('pagination.previous') }}">
                    <svg style="width:40px; margin-left: 4px; height: 100%;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span style="width: 55px; text-align: center; height: 100%; line-height: 53px; margin-right: 5px;" class="border border-gray-300 cursor-default">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span style="width: 55px; height: 100%; text-align: center; margin-right: 5px; background-color: rgb(248,248,248); line-height: 53px;" class="border border-gray-300 cursor-default">{{ $page }}</span>
                            </span>
                        @else
                            <a style="width: 55px; text-align: center; line-height: 53px; margin-right: 5px;" href="{{ $url }}" class="border border-gray-300" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a style="width: 55px;" href="{{ $paginator->nextPageUrl() }}" rel="next" class="border border-gray-300" aria-label="{{ __('pagination.next') }}">
                    <svg style="width:40px; margin-left: 8px; height: 100%;" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
            @endif
        </div>
    </nav>
@endif
