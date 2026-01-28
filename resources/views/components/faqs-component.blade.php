@php
    // $faqs can be: Collection of Faq models OR Collection/array of [{question,answer}]
    $faqsCollection = $faqs instanceof \Illuminate\Support\Collection ? $faqs : collect($faqs);

    // If empty, don't render anything
if ($faqsCollection->isEmpty()) {
    return;
}

$totalFaqs = $faqsCollection->count();

$getQuestion = function ($faq) {
    if (is_array($faq)) {
        return $faq['question'] ?? '';
    }
    return $faq->question ?? '';
};

$getAnswer = function ($faq) {
    if (is_array($faq)) {
        return $faq['answer'] ?? '';
    }
    return $faq->answer ?? '';
};

// Unique id so multiple components can work on same page
$uid = 'faqs_' . uniqid();
@endphp
<section class="faq-section" id="{{ $uid }}">
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

                @foreach ($faqsCollection as $index => $faq)
                    <div class="faq-item {{ $index >= 5 ? 'd-none' : '' }}">
                        <div class="faq-header">
                            <h5>{{ $getQuestion($faq) }}</h5>
                            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
                        </div>
                        <div class="faq-content">
                            <p>{{ $getAnswer($faq) }}</p>
                        </div>
                    </div>
                @endforeach

                @if ($totalFaqs > 5)
                    <div class="faq-btn-wrap">
                        <button class="show-more-btn" type="button" data-faq-show-more="{{ $uid }}">
                            Show More
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

<script>
    (function() {
        const rootId = @json($uid);
        const root = document.getElementById(rootId);
        if (!root) return;


        const STEP = 5; // per click how many to show
        let visibleFaqCount = STEP;


        const faqItems = root.querySelectorAll('.faq-item');
        const showMoreBtn = root.querySelector('[data-faq-show-more="' + rootId + '"]');


        // If total <= 5, button is not rendered anyway (but safe check)
        if (!showMoreBtn) return;


        showMoreBtn.addEventListener('click', function() {
            const nextVisible = Math.min(visibleFaqCount + STEP, faqItems.length);


            for (let i = visibleFaqCount; i < nextVisible; i++) {
                faqItems[i].classList.remove('d-none');
            }


            visibleFaqCount = nextVisible;


            // If no more hidden items, hide button
            if (visibleFaqCount >= faqItems.length) {
                showMoreBtn.style.display = 'none';
            }
        });
    })();
</script>
