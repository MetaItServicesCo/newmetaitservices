<section class="services-offer">
    <div class="container">

        <h2 class="section-offer">SERVICES WE <span>OFFER</span> </h2>
        <p class="section-desc">
            We provide complete digital solutions to grow your business online.
        </p>

        @if (!empty($offers) && $offers->count())
            <div class="swiper myCardSwiper">
                <div class="swiper-wrapper">
                    @foreach ($offers as $offer)
                        <div class="swiper-slide">
                            <a href="" class="text-decoration-none">
                                <div class="card-box">
                                    <img src="{{ $offer->icon ? asset('storage/' . $offer->icon) : asset('frontend/images/offer-icon.png') }}"
                                        alt="">

                                    <h4> {{ $offer->title ?? '' }} </h4>
                                    <p>{{ \Illuminate\Support\Str::limit($offer->short_description ?? '', 150) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        @endif
    </div>
</section>
