<div class="row mt-5 g-4">
    @forelse ($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6">
            <div class="portfolio-cardd portfolio-item" data-id="{{ $portfolio->id }}">
                <div class="image-wrapper">
                    <img src="{{ $portfolio->thumbnail
                        ? asset('storage/portfolios/thumbnails/'.$portfolio->thumbnail)
                        : asset('frontend/images/blog/portfolio.png') }}">

                    <div class="card-content">
                        <h4>{{ $portfolio->title }}</h4>
                        <p>{{ $portfolio->sub_title }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No portfolios found.</p>
        </div>
    @endforelse
</div>

<!-- PAGINATION -->
@if ($portfolios->hasPages())
    <div class="pagination-wrap mt-4">
        {!! $portfolios->links('vendor.pagination.custom-pagination') !!}
    </div>
@endif
