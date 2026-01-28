<!-- PAGINATION -->
<div class="pagination-wrap">
    {{-- Previous Button --}}
    @if ($paginator->onFirstPage())
        <button class="page-btn disabled" disabled>‹</button>
    @else
        <button class="page-btn" data-page="{{ $paginator->currentPage() - 1 }}">‹</button>
    @endif

    {{-- Page Numbers --}}
    @php
        $lastPage = $paginator->lastPage();
        $currentPage = $paginator->currentPage();
        $window = 2; // Show 2 pages on each side of current page
    @endphp

    @if ($lastPage <= 7)
        {{-- Show all pages if 7 or fewer --}}
        @for ($page = 1; $page <= $lastPage; $page++)
            @if ($page == $currentPage)
                <button class="page-btn active" data-page="{{ $page }}" disabled>{{ $page }}</button>
            @else
                <button class="page-btn" data-page="{{ $page }}">{{ $page }}</button>
            @endif
        @endfor
    @else
        {{-- Show first page --}}
        @if ($currentPage > $window + 2)
            <button class="page-btn" data-page="1">1</button>
            <span class="page-ellipsis">…</span>
        @endif

        {{-- Show pages around current page --}}
        @for ($page = max(1, $currentPage - $window); $page <= min($lastPage, $currentPage + $window); $page++)
            @if ($page == $currentPage)
                <button class="page-btn active" data-page="{{ $page }}" disabled>{{ $page }}</button>
            @else
                <button class="page-btn" data-page="{{ $page }}">{{ $page }}</button>
            @endif
        @endfor

        {{-- Show last page --}}
        @if ($currentPage < $lastPage - $window - 1)
            <span class="page-ellipsis">…</span>
            <button class="page-btn" data-page="{{ $lastPage }}">{{ $lastPage }}</button>
        @endif
    @endif

    {{-- Next Button --}}
    @if ($paginator->hasMorePages())
        <button class="page-btn" data-page="{{ $paginator->currentPage() + 1 }}">›</button>
    @else
        <button class="page-btn disabled" disabled>›</button>
    @endif
</div>
