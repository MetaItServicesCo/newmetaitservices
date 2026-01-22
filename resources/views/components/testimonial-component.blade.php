<section class="revenue-impact">
    <div class="container text-center">

        <h2 class="impact-title">Real Revenue Impact for Our Clients</h2>

        <div class="impact-image">
            <img src="{{ asset('frontend/images/navbar-logo.png') }}" alt="">
        </div>

        <p class="impact-desc">
            Building a Structured Digital Platform and Product Catalog for Industrial Growth
        </p>

        @if (!empty($testimonials) && $testimonials->count())
            <div class="impact-nav">

                <div class="impact-cards py-5">

                    <!-- Prev -->
                    <button class="nav-btn prev impact-prev">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>

                    <!-- Swiper -->
                    <div class="swiper impactSwiper">
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="impact-card">
                                        <div class="border-wraper">
                                            <div class="starss">
                                                @php
                                                    $rating = (int) ($testimonial->rating ?? 0); // 1–5
                                                @endphp
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $rating)
                                                        <i class="fa-solid fa-star"></i>
                                                    @else
                                                        <i class="fa-regular fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>

                                            <p class="card-desc">
                                                {{ $testimonial->short_description ?? '' }}
                                            </p>
                                        </div>

                                        <div class="d-flex gap-2  align-items-center mt-2">
                                            <h3 class="percent">{{ $testimonial->highlight_percentage ?? '' }}%</h3>
                                            <span class="metric">
                                                {{ $testimonial->highlight_title ?? '' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Next -->
                    <button class="nav-btn next impact-next">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>

                </div>
            </div>
        @else
            <!-- Fallback UI -->
            <p class="text-muted mt-4">
                No testimonials available at the moment.
            </p>
        @endif

    </div>

</section>
