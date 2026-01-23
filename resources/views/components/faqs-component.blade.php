<section class="faq-section">
    <div class="container">
        <div class="row align-items-start">

            <!-- LEFT -->
            <div class="col-lg-5 faq-left">
                <h2 class="faq-title">Frequently Asked Questions</h2>
                <p class="faq-desc">
                    Find answers to the most commonly asked questions about our
                    platform, features, pricing, and support. Our team is always
                    ready to help you. Find answers to the most commonly asked questions about our
                    platform, features, pricing, and support. Our team is always
                    ready to help you. Find answers to the most commonly asked questions about our
                    platform, features, pricing, and support. Our team is always
                    ready to help you. Find answers to the most commonly asked questions about our
                    platform, features, pricing, and support. Our team is always
                    ready to help you.
                </p>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-7">

                @foreach ($faqs as $index => $faq)
                    <div class="faq-item {{ $index >= 5 ? 'd-none' : '' }}">
                        <div class="faq-header">
                            <h5>{{ $faq->question }}</h5>
                            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
                        </div>
                        <div class="faq-content">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach

                @if (count($faqs) > 5)
                    <div class="faq-btn-wrap">
                        <button class="show-more-btn" id="show-more-faqs">Show More</button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

<script>
    let visibleFaqCount = 5;
    const faqItems = document.querySelectorAll('.faq-item');
    const showMoreBtn = document.getElementById('show-more-faqs');

    if (showMoreBtn) {
        showMoreBtn.addEventListener('click', function() {
            for (let i = visibleFaqCount; i < visibleFaqCount + 4 && i < faqItems.length; i++) {
                faqItems[i].classList.remove('d-none');
            }
            visibleFaqCount += 4;
            if (visibleFaqCount >= faqItems.length) {
                showMoreBtn.style.display = 'none';
            }
        });
    }
</script>
