<section class="portfolio-section">
    <div class="container">

        <!-- Heading -->
        <h2 class="portfolio-title">PORTFOLIO</h2>

        <!-- Cards -->
        <div class="row justify-content-center g-3">

            @foreach ($portfolios as $index => $portfolio)
                <div class="col-lg-4 col-md-6 p-card {{ $index >= 3 ? 'd-none' : '' }}">
                    <div class="portfolio-card">
                        <img src="{{ $portfolio->thumbnail ? asset('storage/portfolios/thumbnails/' . $portfolio->thumbnail) : asset('frontend/images/portfolio-img1.png') }}"
                            alt="">
                        <h3>{{ \Illuminate\Support\Str::limit($portfolio->title ?? '', 50) }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($portfolio->sub_title ?? '', 150) }}</p>
                        <a href="#" class="read-more">Read more</a>
                    </div>
                </div>
            @endforeach

        </div>

        @if (count($portfolios) > 3)
            <!-- Center Button -->
            <div class="portfolio-btn-wrap">
                <button class="down-btn" id="load-more-btn">
                    <img src="{{ asset('frontend/images/portfolio-icon.png') }}" alt="">
                </button>
            </div>
        @endif

    </div>

    <script>
        let visibleCount = 3;
        const cards = document.querySelectorAll('.p-card');
        const loadMoreBtn = document.getElementById('load-more-btn');

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                for (let i = visibleCount; i < visibleCount + 3 && i < cards.length; i++) {
                    cards[i].classList.remove('d-none');
                }
                visibleCount += 3;
                if (visibleCount >= cards.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        }
    </script>
</section>
