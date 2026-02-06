@if ($paginator->hasPages())
    <div class="pagination-wrap">

        {{-- PREVIOUS --}}
        @if ($paginator->onFirstPage())
            <button class="page-btn" disabled>‹</button>
        @else
            <button class="page-btn"
                data-page="{{ $paginator->currentPage() - 1 }}"
                data-url="{{ $paginator->previousPageUrl() }}">
                ‹
            </button>
        @endif

        {{-- PAGE NUMBERS --}}
        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();

            $start = max(1, $current - 1);
            $end   = min($last, $current + 1);
        @endphp

        {{-- FIRST PAGE --}}
        @if ($start > 1)
            <button class="page-btn" data-page="1" data-url="{{ $paginator->url(1) }}">1</button>
            @if ($start > 2)
                <span>…</span>
            @endif
        @endif

        {{-- MIDDLE PAGES --}}
        @for ($page = $start; $page <= $end; $page++)
            <button
                class="page-btn {{ $page == $current ? 'active' : '' }}"
                data-page="{{ $page }}"
                data-url="{{ $paginator->url($page) }}">
                {{ $page }}
            </button>
        @endfor

        {{-- LAST PAGE --}}
        @if ($end < $last)
            @if ($end < $last - 1)
                <span>…</span>
            @endif
            <button class="page-btn" data-page="{{ $last }}" data-url="{{ $paginator->url($last) }}">
                {{ $last }}
            </button>
        @endif

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <button class="page-btn"
                data-page="{{ $paginator->currentPage() + 1 }}"
                data-url="{{ $paginator->nextPageUrl() }}">
                ›
            </button>
        @else
            <button class="page-btn" disabled>›</button>
        @endif

    </div>
@endif
