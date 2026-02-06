@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

@push('frontend-styles')
    <style>
        .dm-services-section {
            padding: 50px 0;
            /* min-height: 800px; */
            /* 👈 important */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }



        /* LEFT */
        .mc-badge {
            font-size: 25px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
            color: #F96037;
        }

        .dm-title {
            font-size: 50px;
            font-weight: 700;
            color: #ffffff;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 15px;
            max-width: 450px;
            /* margin-top: 20px; */
        }

        .dm-subtitle {
            font-size: 25px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
            color: #ffffff;
            margin-bottom: 20px;
            max-width: 478px;

        }

        .dm-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #ffffff;
            max-width: 500px;
            margin-bottom: 30px;
        }

        /* BUTTON */
        .dm-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #F96037;
            color: #ffffff;
            border-radius: 12px;
            font-weight: 600;
            font-size: 20px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            text-decoration: none;
            transition: 0.3s ease;
            width: 274px;
            height: 67px;

        }

        .dm-btn:hover {
            background: #e1542f;
            color: #fff;
        }

        /* RIGHT IMAGE */
        .mc-right-img {
            width: 776px;
            max-width: 100%;
            height: 360px;
            display: flex;
            align-items: center;
        }

        /* MOBILE */
        @media (max-width: 991px) {

            .dm-services-section {
                padding: 70px 0;
                text-align: center;
            }

            .dm-desc {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
        }


        /* ====================== buzz-section ========================= */

        .buzz-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 20px 0;
            font-family: Inter;
        }

        /* MAIN HEADING */
        .main-heading {
            max-width: 848px;
            margin: 0 auto 80px;
            text-align: center;
            font-size: 55px;
            font-weight: 700;
            line-height: 65px;
            color: #000000;
        }



        .number {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            color: #F96037;
            margin-bottom: 20px;

        }

        .col-title {
            max-width: 758px;
            margin: 0 auto 20px;
            font-size: 25px;
            font-weight: 600;
            line-height: 160%;
            color: #000;
            text-align: center;
        }

        .col-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            color: #000;
            text-align: center;
            max-width: 742px;
        }

        /* CASE STUDY */
        .case-wrapper {
            text-align: center;
            margin-top: 80px;
        }

        .case-label {
            display: block;
            font-size: 20px;
            font-weight: 700;
            color: #F48B5C;
            margin-bottom: 10px;
        }

        .case-heading {
            font-size: 30px;
            font-weight: 700;
            line-height: 35px;
            margin-bottom: 60px;
        }

        /* CASE CARDS */


        .case-card {
            position: relative;
            width: 100%;
            max-width: 418px;
            height: 608px;
            border-radius: 20px;
            overflow: hidden;
        }

        .case-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            box-shadow: 0 0 6.1px rgba(0, 0, 0, 0.5);

        }

        /* OVERLAY */
        .case-card .overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 127px;
            background: linear-gradient(to right,
                    #F38B5C 0%,
                    #404959 100%);

            padding: 10px 15px;
            color: #fff;
            text-align: start;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .case-card h4 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .case-card p {
            font-size: 18px;
            line-height: 160%;
        }

        /* ======================= newsletter-section ==================== */
        .newsletter-section {
            background-color: #404959;
            padding: 50px 0;
            margin-top: 50px;
            font-family: Inter;
        }

        /* LEFT CONTENT */
        .newsletter-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 59px;
            color: #ffffff;
            margin-bottom: 25px;
            max-width: 803px;
        }

        .newsletter-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            color: #ffffff;
            margin-bottom: 35px;
        }

        /* INPUT */
        .newsletter-input {
            width: 100%;
            max-width: 653px;
            height: 59px;
            border-radius: 19px;
            border: 1px solid #ffffff;
            background: transparent;
            padding: 0 20px;
            font-size: 18px;
            color: #ffffff;
            outline: none;
            margin-bottom: 20px;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* BUTTON */
        .subscribe-btn {
            width: 482px;
            height: 67px;
            border-radius: 12px;
            background: #FF6036;
            border: none;
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 auto;
        }

        /* HOVER EFFECT */
        .subscribe-btn:hover {
            background: #ffffff;
            color: #404959;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(243, 139, 92, 0.5);
        }

        /* RIGHT IMAGE */
        .newsletter-img {
            width: 100%;
            max-width: 584px;
            height: 429px;
            object-fit: cover;
            border: 7px solid #E4E6E7;
        }

        /* =============== case model css */

        /* MODAL 1 */
        .modal {
            overflow: hidden !important;
        }

        /* Body fix */
        body.modal-open {
            overflow: hidden !important;
            padding-right: 0 !important;
        }

        /* CASE MODAL */
        .case-modal {
            background: #D9D9D9;
            border-radius: 20px;
            padding: 30px;
            font-family: Inter;
            max-height: 90vh;
            overflow: hidden !important;
        }

        /* Modal body scroll allowed but hidden */
        #caseDetailModal .modal-body {
            max-height: calc(90vh - 80px);
            overflow-y: auto;

            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #caseDetailModal .modal-body::-webkit-scrollbar {
            display: none;
        }

        /* Modal dialog */
        #caseDetailModal .modal-dialog {
            overflow: hidden !important;
        }


        .case-img-wrap {
            width: 100%;
            max-width: 1054px;
            height: 400px;
            background: #000;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 40px;
        }

        .case-img-wrap img {
            width: 100%;
            height: 100%;
        }

        .case-title {
            font-size: 30px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
        }

        .case-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            margin-top: 15px;
        }

        .case-list {
            list-style: disc;
            text-align: left;
            max-width: 600px;
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            /* margin: 20px auto; */
        }

        .download-btn {
            width: 353px;
            height: 67px;
            background: #404959;
            border-radius: 12px;
            border: none;
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
        }

        /* MODAL 2 */
        .download-modal {
            border-radius: 20px;
            padding: 30px;
        }

        .form-title {
            margin-bottom: 20px;
            font-weight: 700;
        }

        .download-modal input,
        .download-modal select {
            width: 100%;
            max-width: 672px;
            height: 53px;
            background: #EFEFEF;
            border: 1px solid #F96037;
            border-radius: 6px;
            margin-bottom: 15px;
            padding: 0 15px;
        }

        .submit-btn {
            width: 176px;
            height: 50px;
            background: #F38B5C;
            border-radius: 12px;
            border: none;
            color: #fff;
            font-size: 16px;
        }

        .form-group {
            text-align: left;
            max-width: 672px;
            margin: 0 auto 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #000;
        }

        .case-close {
            position: absolute;
            top: 4px;
            right: 7px;
            background-color: #fff;
            border-radius: 50%;
            padding: 10px;
            opacity: 1;
            z-index: 10;
        }

        @media(max-width:768px) {
            .case-img-wrap {

                height: 100% !important;

                padding: 20px 30px !important;
            }
        }

        @media(max-width:767px) {
            .main-heading {
                margin: 0 auto;
                font-size: 27px;
                line-height: 35px;
            }

            .col-title {
                margin: 0px auto 10px;
                font-size: 20px;

            }

            .col-desc {
                font-size: 16px;

            }

            .newsletter-heading {
                font-size: 28px !important;
                line-height: 42px !important;
                margin-bottom: 10px;
                text-align: center;
            }

            .newsletter-desc {
                font-size: 16px !important;

                text-align: center;
            }

            .case-img-wrap {

                height: 100% !important;

                padding: 20px 30px !important;
            }
        }
    </style>
@endpush



@section('frontend-content')
    <section class="dm-services-section"
        style="background-image: url('{{ asset('frontend/images/about/about-hero.png') }}');">

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="dm-title">Case Studies</h1>

                    {{-- <h4 class="dm-subtitle">
                        Customized Marketing Solutions That Deliver Results, Every Time
                    </h4> --}}

                    <p class="dm-desc">
                        We create data-driven digital marketing strategies tailored to
                        your business goals. From SEO and paid campaigns to social media
                        and content marketing
                    </p>

                    {{-- <a href="#" class="dm-btn">Start Your Project</a> --}}
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center d-flex align-items-center ">
                    <img src="{{ asset('frontend/images/blog/blog-hero.png') }}" alt="Digital Marketing" class="mc-right-img">
                </div>

            </div>
        </div>
    </section>

    {{-- ========================== buzz-section ============================ --}}



    <section class="buzz-section">
        <div class="container-fluid">

            <!-- MAIN HEADING -->
            <h2 class="main-heading">
                Transform Your Business with Buzz Digital Agency’s Proven Strategies
            </h2>

            <!-- TWO COLUMNS -->
            <div class="row g-4 justify-content-center p-5">
                <div class="col-lg-6 col-md-6">
                    <span class="number">01</span>
                    <h4 class="col-title">
                        Discover the power of digital marketing with Buzz Digital Agency
                    </h4>
                    <p class="col-desc">
                        We help brands grow with data-driven strategies, creative campaigns, and proven digital solutions.
                    </p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <span class="number">02</span>
                    <h4 class="col-title">
                        Discover the power of digital marketing with Buzz Digital Agency
                    </h4>
                    <p class="col-desc">
                        Our team delivers measurable results through innovation, performance, and smart execution.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <span class="number">03</span>
                    <h4 class="col-title">
                        Discover the power of digital marketing with Buzz Digital Agency
                    </h4>
                    <p class="col-desc">
                        We help brands grow with data-driven strategies, creative campaigns, and proven digital solutions.
                    </p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <span class="number">04</span>
                    <h4 class="col-title">
                        Discover the power of digital marketing with Buzz Digital Agency
                    </h4>
                    <p class="col-desc">
                        Our team delivers measurable results through innovation, performance, and smart execution.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <span class="number">05</span>
                    <h4 class="col-title">
                        Discover the power of digital marketing with Buzz Digital Agency
                    </h4>
                    <p class="col-desc">
                        Our team delivers measurable results through innovation, performance, and smart execution.
                    </p>
                </div>

            </div>

            <!-- CASE STUDY -->


        </div>
        <div class="case-wrapper container ">
            <span class="case-label">Our Case</span>
            <h3 class="case-heading">Download The Case Study Below</h3>

            <div class="row g-4 justify-content-center">
                @foreach ($caseStudies as $caseStudy)
                    <div class="col-lg-4 col-md-6">
                        <div class="case-card" data-bs-toggle="modal" data-bs-target="#caseDetailModal"
                            data-id="{{ $caseStudy->id }}" data-title="{{ $caseStudy->title }}"
                            data-subtitle="{{ $caseStudy->sub_title }}"
                            data-image="{{ asset('storage/case_study/' . $caseStudy->image) }}"
                            data-image-alt="{{ $caseStudy->image_alt }}" data-description='{!! htmlspecialchars($caseStudy->description, ENT_QUOTES, 'UTF-8') !!}'
                            data-document="{{ $caseStudy->document ? asset('storage/case_study/' . $caseStudy->document) : '' }}">
                            <img src="{{ asset('storage/case_study/' . $caseStudy->image) }}"
                                alt="{{ $caseStudy->image_alt }}">
                            <div class="overlay">
                                <h4>{{ $caseStudy->title }}</h4>
                                <p>{{ $caseStudy->sub_title }}</p>
                            </div>
                        </div>

                    </div>
                @endforeach

                <!-- PAGINATION -->
                @if ($caseStudies->hasPages())
                    <div class="pagination-wrap">

                        {{-- PREVIOUS --}}
                        @if ($caseStudies->onFirstPage())
                            <button class="page-btn" disabled>‹</button>
                        @else
                            <button class="page-btn"
                                onclick="window.location='{{ $caseStudies->previousPageUrl() }}'">‹</button>
                        @endif

                        {{-- PAGE NUMBERS --}}
                        @php
                            $current = $caseStudies->currentPage();
                            $last = $caseStudies->lastPage();

                            $start = max(1, $current - 1);
                            $end = min($last, $current + 1);
                        @endphp

                        {{-- FIRST PAGE --}}
                        @if ($start > 1)
                            <button class="page-btn" onclick="window.location='{{ $caseStudies->url(1) }}'">1</button>
                            @if ($start > 2)
                                <span>…</span>
                            @endif
                        @endif

                        {{-- MIDDLE PAGES --}}
                        @for ($page = $start; $page <= $end; $page++)
                            <button class="page-btn {{ $page == $current ? 'active' : '' }}"
                                onclick="window.location='{{ $caseStudies->url($page) }}'">
                                {{ $page }}
                            </button>
                        @endfor

                        {{-- LAST PAGE --}}
                        @if ($end < $last)
                            @if ($end < $last - 1)
                                <span>…</span>
                            @endif
                            <button class="page-btn"
                                onclick="window.location='{{ $caseStudies->url($last) }}'">{{ $last }}</button>
                        @endif

                        {{-- NEXT --}}
                        @if ($caseStudies->hasMorePages())
                            <button class="page-btn"
                                onclick="window.location='{{ $caseStudies->nextPageUrl() }}'">›</button>
                        @else
                            <button class="page-btn" disabled>›</button>
                        @endif

                    </div>
                @endif


            </div>
        </div>
    </section>

    {{-- =========== case model ================= --}}
    <div class="modal fade" id="caseDetailModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content case-modal position-relative">

                <!-- CLOSE BUTTON -->
                <button type="button" class="btn-close case-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

                <div class="modal-body">

                    <!-- IMAGE -->
                    <div class="case-img-wrap">
                        <img id="modalCaseImage" src="" alt="">
                    </div>

                    <!-- CONTENT -->
                    <div class="case-content mt-4">
                        <h2 id="modalCaseTitle"></h2>
                        <h5 id="modalCaseSubTitle" class="text-muted"></h5>

                        <div id="modalCaseDescription" class="mt-3"></div>
                    </div>


                    <!-- DOWNLOAD BUTTON -->
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="download-btn" id="openDownload">
                            Download
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="downloadModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content download-modal">
                <button type="button" class="btn-close case-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
                <div class="modal-body ">

                    <h3 class="form-title">Your Information</h3>

                    <form id="downloadForm" method="POST">
                        @csrf
                        <input type="hidden" name="case_study_id" id="downloadCaseStudyId" value="">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="download_name" class="form-control" placeholder="Name" required>
                            <small class="text-danger d-block mt-1" id="error_name"></small>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="download_email" class="form-control" placeholder="Email" required>
                            <small class="text-danger d-block mt-1" id="error_email"></small>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" id="download_phone" class="form-control" placeholder="Phone Number" required>
                            <small class="text-danger d-block mt-1" id="error_phone_number"></small>
                        </div>

                        <div class="form-group">
                            <label>Select Location</label>
                            <select name="location" id="download_location" class="form-control" required>
                                <option value="">Select Location</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="UAE">UAE</option>
                                <option value="UK">UK</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="Other">Other</option>
                            </select>
                            <small class="text-danger d-block mt-1" id="error_location"></small>
                        </div>

                        <button type="submit" class="submit-btn" id="downloadSubmitBtn">
                            Download
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="mt-5">
        <x-have-project />
    </div>

    {{-- ==================== newsletter-section ======================= --}}
    <section class="newsletter-section">
        <div class="container">
            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6">
                    <h2 class="newsletter-heading">
                        Stay Updated with the Latest Digital Marketing Insights
                    </h2>

                    <p class="newsletter-desc">
                        Get expert tips, industry trends, and proven strategies delivered straight
                        to your inbox to help your business grow digitally.
                    </p>
                    <form id="newsletterForm" method="post">
                        @csrf
                        <input type="email" name="email" id="newsletter_email" placeholder="Enter your email address" class="newsletter-input" required>
                        <small class="text-danger d-block mt-2" id="error_newsletter_email"></small>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="subscribe-btn" id="newsletterSubmitBtn">Subscribe</button>
                        </div>
                    </form>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontend/images/blog/blog-img.png') }}" class="newsletter-img" alt="Newsletter">
                </div>

            </div>
        </div>
    </section>








@endsection


@push('frontend-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const caseModalEl = document.getElementById('caseDetailModal');
            const downloadModalEl = document.getElementById('downloadModal');
            const openDownloadBtn = document.getElementById('openDownload');
            const hiddenCaseInput = document.getElementById('downloadCaseStudyId');

            const modalImage = document.getElementById('modalCaseImage');
            const modalTitle = document.getElementById('modalCaseTitle');
            const modalSubTitle = document.getElementById('modalCaseSubTitle');
            const modalDescription = document.getElementById('modalCaseDescription');

            let selectedCaseId = null;

            /* ===============================
               CASE CARD CLICK → FILL MODAL
            ================================ */
            document.querySelectorAll('.case-card').forEach(card => {
                card.addEventListener('click', function() {

                    selectedCaseId = this.dataset.id;

                    modalTitle.innerText = this.dataset.title;
                    modalSubTitle.innerText = this.dataset.subtitle;

                    modalImage.src = this.dataset.image;
                    modalImage.alt = this.dataset.imageAlt ?? '';

                    modalDescription.innerHTML = this.dataset.description;

                    /* ===== DOWNLOAD BUTTON TOGGLE ===== */
                    if (this.dataset.document && this.dataset.document.trim() !== '') {
                        openDownloadBtn.style.display = 'block';
                    } else {
                        openDownloadBtn.style.display = 'none';
                    }
                });
            });

            /* ===============================
               DOWNLOAD BUTTON CLICK
            ================================ */
            openDownloadBtn.addEventListener('click', function() {

                // Set the case study ID in the hidden input BEFORE hiding modal
                if (selectedCaseId) {
                    const caseIdInput = document.getElementById('downloadCaseStudyId');
                    if (caseIdInput) {
                        caseIdInput.value = selectedCaseId;
                        console.log('Case Study ID set to:', selectedCaseId);
                        console.log('Hidden input value after setting:', caseIdInput.value);
                    } else {
                        console.error('Hidden input element not found');
                    }
                } else {
                    console.warn('No case study ID selected');
                }

                const caseModal = bootstrap.Modal.getInstance(caseModalEl);
                if (caseModal) {
                    caseModal.hide();
                }

                // Wait for modal to hide, then show download modal
                setTimeout(() => {
                    const downloadModal = new bootstrap.Modal(downloadModalEl);
                    downloadModal.show();
                    
                    // Verify ID is still set after modal opens
                    const caseIdInput = document.getElementById('downloadCaseStudyId');
                    console.log('After download modal opens - Case Study ID:', caseIdInput.value);
                }, 300);
            });

            /* ===============================
               DOWNLOAD FORM SUBMISSION
            ================================ */
            const downloadForm = document.getElementById('downloadForm');
            const downloadSubmitBtn = document.getElementById('downloadSubmitBtn');
            const originalDownloadBtnText = 'Download';

            if (downloadForm) {
                downloadForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    // Verify case_study_id is set before submission
                    const caseIdInput = document.getElementById('downloadCaseStudyId');
                    if (!caseIdInput.value) {
                        console.error('Case Study ID is empty!');
                        if (typeof toastr !== 'undefined') {
                            toastr.error('Please select a case study first');
                        }
                        return;
                    }

                    console.log('Form submission - Case Study ID:', caseIdInput.value);

                    // Clear previous errors
                    document.querySelectorAll('[id^="error_"]').forEach(el => {
                        el.textContent = '';
                        el.style.display = 'none';
                    });

                    // Disable submit button and show loader
                    downloadSubmitBtn.disabled = true;
                    downloadSubmitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

                    try {
                        // Prepare form data
                        const formData = new FormData(downloadForm);
                        
                        // Ensure case_study_id is in the form data
                        formData.set('case_study_id', caseIdInput.value);
                        console.log('FormData case_study_id:', formData.get('case_study_id'));

                        // Submit form via AJAX
                        const response = await fetch("{{ route('case-study.download') }}", {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            },
                            body: formData,
                        });

                        const data = await response.json();

                        if (data.success) {
                            // Show success toast using Toastr
                            if (typeof toastr !== 'undefined') {
                                toastr.success(data.message);
                            }

                            // Trigger download
                            const link = document.createElement('a');
                            link.href = data.download_url;
                            link.download = '';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);

                            // Close modal
                            const downloadModal = bootstrap.Modal.getInstance(downloadModalEl);
                            if (downloadModal) {
                                downloadModal.hide();
                            }

                            // Reset form
                            downloadForm.reset();
                        } else {
                            // Show errors
                            if (data.errors) {
                                Object.keys(data.errors).forEach(field => {
                                    const errors = data.errors[field];
                                    if (Array.isArray(errors)) {
                                        showDownloadError(field, errors[0]);
                                    } else {
                                        showDownloadError(field, errors);
                                    }
                                });
                            }

                            // Show error toast using Toastr
                            if (typeof toastr !== 'undefined') {
                                toastr.error(data.message || 'Please fix the errors below');
                            }
                        }
                    } catch (error) {
                        console.error('Download form submission error:', error);
                        
                        if (typeof toastr !== 'undefined') {
                            toastr.error('An unexpected error occurred. Please try again.');
                        }
                    } finally {
                        // Re-enable submit button
                        downloadSubmitBtn.disabled = false;
                        downloadSubmitBtn.textContent = originalDownloadBtnText;
                    }
                });

                /**
                 * Show error message for download form field
                 */
                function showDownloadError(fieldName, message) {
                    const errorEl = document.getElementById(`error_${fieldName}`);
                    if (errorEl) {
                        errorEl.textContent = message;
                        errorEl.style.display = 'block';
                    }
                }

                /**
                 * Clear error message when user starts typing in download form
                 */
                const downloadFormInputs = downloadForm.querySelectorAll('input, select');
                downloadFormInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        const errorEl = document.getElementById(`error_${this.name}`);
                        if (errorEl) {
                            errorEl.textContent = '';
                            errorEl.style.display = 'none';
                        }
                    });
                });

                /**
                 * Reset download form when modal is closed
                 */
                downloadModalEl.addEventListener('hidden.bs.modal', function() {
                    downloadForm.reset();
                    document.querySelectorAll('[id^="error_"]').forEach(el => {
                        el.textContent = '';
                        el.style.display = 'none';
                    });
                    
                    // Clear the case study ID and selectedCaseId when download modal closes
                    const caseIdInput = document.getElementById('downloadCaseStudyId');
                    if (caseIdInput) {
                        caseIdInput.value = '';
                    }
                    selectedCaseId = null;
                    console.log('Download modal closed - Case Study ID cleared');
                });

                /**
                 * Ensure case study ID is set when download modal is shown
                 */
                downloadModalEl.addEventListener('show.bs.modal', function() {
                    if (selectedCaseId) {
                        const caseIdInput = document.getElementById('downloadCaseStudyId');
                        if (caseIdInput) {
                            caseIdInput.value = selectedCaseId;
                            console.log('Download modal opened - Case Study ID set to:', selectedCaseId);
                            console.log('Hidden input value in modal:', caseIdInput.value);
                        }
                    }
                });
            }

            /* ===============================
               RESET CASE MODAL DATA ON CLOSE
            ================================ */
            caseModalEl.addEventListener('hidden.bs.modal', function() {

                modalTitle.innerText = '';
                modalSubTitle.innerText = '';
                modalDescription.innerHTML = '';

                modalImage.src = '';
                modalImage.alt = '';

                openDownloadBtn.style.display = 'none';

                // Don't clear selectedCaseId here - it's needed for the download modal
                // selectedCaseId will be cleared when download modal closes
            });

            /* ===============================
               BACKDROP / BODY CLEANUP
            ================================ */
            document.body.addEventListener('hidden.bs.modal', function() {
                setTimeout(() => {
                    if (!document.querySelector('.modal.show')) {
                        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                        document.body.classList.remove('modal-open');
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }
                }, 200);
            });

            /* ===============================
               NEWSLETTER FORM SUBMISSION
            ================================ */
            const newsletterForm = document.getElementById('newsletterForm');
            const newsletterEmail = document.getElementById('newsletter_email');
            const newsletterSubmitBtn = document.getElementById('newsletterSubmitBtn');
            const errorNewsletterEmail = document.getElementById('error_newsletter_email');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    // Clear previous errors
                    errorNewsletterEmail.textContent = '';
                    errorNewsletterEmail.style.display = 'none';

                    // Disable submit button
                    newsletterSubmitBtn.disabled = true;
                    const originalText = newsletterSubmitBtn.textContent;
                    newsletterSubmitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Subscribing...';

                    try {
                        // Get form data
                        const formData = new FormData(newsletterForm);

                        // Submit form via AJAX
                        const response = await fetch("{{ route('newsletter.subscribe') }}", {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            },
                            body: formData,
                        });

                        const data = await response.json();

                        if (data.success) {
                            // Show success toast using Toastr
                            if (typeof toastr !== 'undefined') {
                                toastr.success(data.message);
                            }

                            // Clear form
                            newsletterForm.reset();
                            newsletterEmail.value = '';

                            // Scroll to top
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        } else {
                            // Show errors
                            if (data.errors && data.errors.email) {
                                const errorMsg = Array.isArray(data.errors.email) ? data.errors.email[0] : data.errors.email;
                                errorNewsletterEmail.textContent = errorMsg;
                                errorNewsletterEmail.style.display = 'block';
                            }

                            // Show error toast using Toastr
                            if (typeof toastr !== 'undefined') {
                                toastr.error(data.message || 'Please fix the errors below');
                            }
                        }
                    } catch (error) {
                        console.error('Newsletter subscription error:', error);

                        if (typeof toastr !== 'undefined') {
                            toastr.error('An unexpected error occurred. Please try again.');
                        }
                    } finally {
                        // Re-enable submit button
                        newsletterSubmitBtn.disabled = false;
                        newsletterSubmitBtn.textContent = originalText;
                    }
                });

                // Clear error message when user starts typing
                newsletterEmail.addEventListener('input', function() {
                    errorNewsletterEmail.textContent = '';
                    errorNewsletterEmail.style.display = 'none';
                });
            }

        });
    </script>
@endpush
