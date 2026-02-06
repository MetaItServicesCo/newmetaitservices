@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $industry->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $industry->meta_keywords ?? '')
@section('meta_description', $industry->meta_description ?? '')

@push('frontend-styles')
    <style>
        .dm-services-section {
            padding: 100px 0;
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
            height: 437px;
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

        /* =============================== healthcare-section ================================ */

        .healthcare-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 90px 0;
            font-family: Inter;
        }

        /* TOP */
        .top-tag {
            color: #FF5B2E;
            font-size: 20px;
            font-weight: 600;
            /* margin: 0 auto; */
            text-align: center;
            line-height: 160%;
            letter-spacing: 0;
        }


        .health-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 64px;
            letter-spacing: 2%;
            margin-top: 15px;
            max-width: 592px;
            margin: 0 auto;
            color: #000000;
            text-align: center;
        }

        .health-heading span {
            border-bottom: 6px solid #F96037;
        }

        /* LEFT */
        .left-heading {
            font-size: 40px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;
            max-width: 384px;
        }

        .left-desc {
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            margin: 20px 0;
            max-width: 384px;

        }

        .view-btn {
            width: 220px;
            height: 67px;
            background: #404959;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
        }

        /* Mubeen Grid Mode Create  */
        /* Grid mode */
        .slider-wrapper.grid-view .custom-slider {
            overflow: visible;
        }

        .slider-wrapper.grid-view .slider-track {
            transform: none !important;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        /* Hide nav buttons in grid mode */
        .slider-wrapper.grid-view .nav-btn {
            display: none;
        }

        /* Grid Mode End */

        .slider-wrapper {
            position: relative;
        }

        /* NAV BUTTONS */
        .nav-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #fff;
            color: #404959;
            border: none;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -40px;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .prev-btn {
            left: 10px;
            top: 0px;
        }

        .next-btn {
            left: 70px;
            top: 0px;
        }

        .nav-btn:hover,
        .nav-btn:active {
            background: #404959;
            color: #fff;
        }

        /* SLIDER */
        .custom-slider {
            overflow: hidden;
            width: 100%;
            padding-top: 20px;
            margin-top: 50px;
        }

        .slider-track {
            display: flex;
            gap: 30px;
            transition: transform 0.5s ease-in-out;
        }

        .health-card {
            min-width: calc(33.333% - 20px);
            /* default: 3 cards */
            color: #fff;
        }

        .health-card img {
            width: 100%;
            height: 460px;
            object-fit: cover;
            border-radius: 23px;
        }

        .health-card h4 {
            font-size: 30px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            margin-top: 20px;
            color: #000000;
        }

        .health-card p {
            font-size: 25px;
            line-height: 120%;
            font-weight: 400;
            letter-spacing: 0;
            color: #000000;

        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .view-btn {
                display: block;
                margin: 20px auto;
                /* center horizontally */
            }
        }

        @media (max-width: 991px) {
            .health-card {
                min-width: calc(50% - 20px);
            }

            .next-btn {
                left: 70px;
                top: 35px;
            }

            .prev-btn {
                left: 10px;
                top: 35px;
            }

            .health-card img {
                height: 430px;
            }
        }

        @media (max-width: 575px) {
            .health-card {
                min-width: 100%;
            }

            .prev-btn {
                left: 20px;
                top: 45px;
            }

            .next-btn {
                left: 60px;
                top: 45px;
            }
        }


        .brands-heading {
            font-size: 40px;
            font-weight: 700;
            line-height: 50px;
            color: #000;
        }

        .brands-heading span {
            border-bottom: 6px solid #F96037;
            padding-bottom: 2px;
            display: inline-block;
        }


        .brand-names .brand {
            font-size: 40px;
            font-weight: 600;
            color: #000000;
            line-height: 64px;
            letter-spacing: 2%;
            padding: 10px 20px;
            background: transparent;
            border-radius: 12px;
        }

        /* =================================healthcare-marketing-sectio========================== */

        .marketing-img {
            width: 100%;
            max-width: 756px;
            height: 640px;
            object-fit: cover;
            /* border-radius: 12px; */
        }

        .marketing-heading {
            font-size: 40px;
            font-weight: 600;
            line-height: 25px;
            letter-spacing: 0;
            color: #000000;
            font-family: Inter;
        }

        .marketing-desc {
            font-size: 25px;
            line-height: 160%;
            color: #404959;
            margin-top: 20px;
            font-family: Inter;

        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .marketing-heading {
                text-align: center;
            }

            .marketing-desc {
                text-align: center;
            }

            .marketing-img {
                margin: 0 auto;
            }
        }


        /* ======================atomic-section============================ */


        .atomic-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 90px 0;
            font-family: Inter, sans-serif;
        }

        .atomic-heading {
            font-size: 45px;
            font-weight: 700;
            letter-spacing: 2%;
            color: #000;
            margin-bottom: 30px;
        }

        .atomic-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .atomic-buttons .btn {
            width: 470px;
            height: 67px;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-white {
            background: #ffffff;
            color: #161515;
        }

        .btn-orange {
            background: #F38B5C;
            color: #ffffff;
        }

        .btn-white:hover {
            background: #f0f0f0;
        }

        .btn-orange:hover {
            background: #e67147;
        }

        .atomic-desc {
            font-size: 22px;
            line-height: 160%;
            color: #404959;
            max-width: 900px;
            margin: 0 auto;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .atomic-buttons .btn {
                width: 80%;
            }

            .atomic-buttons {
                flex-wrap: wrap;
            }

            .atomic-heading {
                font-size: 36px;
            }

            .atomic-desc {
                font-size: 20px;
            }
        }


        /* BUTTONS */
        .tab-btn {
            width: 470px;
            height: 67px;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #F38B5C;
            color: #ffffff;
        }

        .tab-btn.active {
            background: #ffffff;
            color: #000000;
        }

        /* TAB CONTENT */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .atomic-desc {
            font-size: 22px;
            line-height: 160%;
            color: #404959;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .tab-btn {
                width: 100%;
            }
        }



        /*============================= experience-section ===================================== */

        .experience-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 20px 0;
            font-family: Inter, sans-serif;
            margin-top: 20px;
        }

        /* LEFT */
        .experience-heading {
            font-size: 60px;
            font-weight: 700;
            letter-spacing: 3%;
            line-height: 69px;
            max-width: 470px;
            color: #000;
        }

        .talk-btn {
            width: 220px;
            height: 67px;
            background: #404959;
            color: #fff;
            border-radius: 12px;
            border: none;
            font-size: 18px;
            font-weight: 700;
            margin-top: 30px;
        }

        .talk-btn:hover {
            opacity: 0.9;
            transition: all 0.4s ease-in-out;
        }

        /* RIGHT */
        .cross-wrapper {
            position: relative;
            width: 654px;
            height: 654px;
            margin-left: auto;
        }

        /* CROSS LINES */
        .cross-x {
            position: absolute;
            top: 50%;
            left: 26px;
            width: 597px;
            height: 51px;
            background: #F96037;
            transform: translateY(-50%);
        }

        .cross-y {
            position: absolute;
            left: 50%;
            top: -10px;
            width: 51px;
            height: 656px;
            background: #F96037;
            transform: translateX(-50%);
        }

        /* IMAGES */
        .cross-img1 {
            position: absolute;
            width: 265px;
            height: 306px;
            object-fit: contain;
        }

        .cross-img2 {
            position: absolute;
            width: 265px;
            height: 306px;
            object-fit: contain;
        }

        .cross-img3 {
            position: absolute;
            width: 265px;
            height: 286px;
            object-fit: contain;
        }

        .cross-img4 {
            position: absolute;
            width: 265px;
            height: 286px;
            object-fit: contain;
        }

        /* POSITIONS */
        .top-left {
            top: -8px;
            left: 32px;
        }

        .top-right {
            top: -8px;
            right: 32px;
        }

        .bottom-left {
            bottom: 10px;
            left: 30px;
        }

        .bottom-right {
            bottom: 10px;
            right: 31px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .cross-wrapper {
                width: 100%;
                height: 400px;
                margin: 50px auto 0;
            }

            .cross-x {
                position: absolute;
                top: 50%;
                left: 162px;
                width: 371px;
                height: 51px;

            }

            .cross-y {
                height: 100%;
                width: 30px;
            }

            .experience-heading {
                font-size: 42px;
                line-height: 54px;
            }
        }

        @media(max-width: 768px) {
            .top-right {
                top: -9px !important;
                right: 126px !important;
            }

            .cross-img2 {
                position: absolute;
                width: 240px;
                height: 190px;
                object-fit: contain;
            }

            .bottom-right {
                bottom: 6px;
                right: 114px;
            }

            .cross-img4 {
                position: absolute;
                width: 265px;
                height: 177px;
                object-fit: contain;
            }

            .bottom-left {
                bottom: 10px;
                left: 115px;
            }

            .cross-img3 {
                position: absolute;
                width: 265px;
                height: 174px;
                object-fit: contain;
            }

            .cross-img1 {
                position: absolute;
                width: 265px;
                height: 192px;
                object-fit: contain;
            }

            .top-left {
                top: -9px;
                left: 115px;
            }
        }


        @media(max-width:767px) {
            .cross-x {
                position: absolute;
                top: 50%;
                left: -3px;
                width: 359px;
                height: 33px;
            }

            .top-left {
                top: -5px;
                left: -31px;
            }

            .top-right {
                top: -7px !important;
                right: -43px !important;
            }

            .bottom-left {
                bottom: 11px;
                left: -54px;
            }

            .cross-img1 {
                position: absolute;
                width: 217px;
                height: 187px;
                object-fit: contain;
            }

            .cross-img2 {
                position: absolute;
                width: 240px;
                height: 188px;
                object-fit: contain;
            }

            .cross-img3 {
                position: absolute;
                width: 265px;
                height: 170px;
                object-fit: contain;
            }

            .cross-img4 {
                position: absolute;
                width: 265px;
                height: 170px;
                object-fit: contain;
            }

            .bottom-right {
                bottom: 11px;
                right: -53px;
            }
        }

        /* faqs */

        .faq-dm-title {
            font-family: Inter;
            font-weight: 600;
            line-height: 48px;
            letter-spacing: 0;
            color: #000000;
            font-size: 40px;
        }

        .top-dm {
            font-family: Inter;
            font-weight: 600;
            line-height: 160%;
            letter-spacing: 0;
            color: #FF5B2E;
            font-size: 20px;
        }

        /* ============ health model ============== */

        /* MODAL BG & RADIUS */
        .health-modal {
            background: #D9D9D9;
            border-radius: 20px;
            border: none;
        }

        /* LEFT IMAGE */
        .modal-left img {
            width: 100%;
            max-width: 1054px;
            height: 467px;
            max-width: 100%;
            object-fit: cover;
            /* border-radius: 20px 0 0 20px; */
        }

        /* RIGHT COLUMN */
        .modal-right {
            padding: 30px;
        }

        .modal-right img {
            width: 100%;
            max-width: 396px;
            height: 188px;
            max-width: 100%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        /* TITLE */
        .modal-content-text h3 {
            font-size: 30px;
            font-weight: 700;
            line-height: 25px;
            font-family: Inter;
            margin-bottom: 15px;
        }

        /* DESC */
        .modal-content-text .desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
            margin-bottom: 15px;
        }

        /* LIST */
        .modal-content-text ul {
            padding-left: 18px;
        }

        .modal-content-text ul li {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
            margin-bottom: 6px;
        }

        .modal-close {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            background: #3E4959;
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            transition: 0.3s ease;
            z-index: 10;
        }

        .modal-close:hover {
            background: #000;
        }

        .btn-proposal {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 353px;
            height: 67px;
            background-color: #404959;
            color: #ffffff;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            line-height: 25px;
            font-family: Inter;
            border-radius: 12px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-proposal:hover {
            background-color: #2f3745;
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
                    <h1 class="dm-title">{{ $industry->name ?? '' }}</h1>

                    {{-- <h4 class="dm-subtitle">
                        Customized Marketing Solutions That Deliver Results, Every Time
                    </h4> --}}

                    <p class="dm-desc">
                        {{ Illuminate\Support\Str::limit($industry->description ?? '', 310) }}
                    </p>

                    {{-- <a href="#" class="dm-btn">Start Your Project</a> --}}
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center d-flex align-items-center ">
                    <img src="{{ asset('frontend/images/industry/industry.png') }}" alt="Digital Marketing"
                        class="mc-right-img">
                </div>

            </div>
        </div>
    </section>



    {{-- =================================== healthcare-section ============================ --}}

    <section class="healthcare-section">
        <div class="container text-cent">

            <h5 class="top-tag ">{{ $industry['sub_details']['hero_kicker'] ?? '' }}</h5>

            <h2 class="health-heading">{!! highlightBorderBottom($industry['sub_details']['hero_title']) ?? '' !!}</h2>

            <div class="row mt-5">
                <!-- LEFT -->
                <div class="col-lg-3">
                    <h3 class="left-heading">{{ $industry['sub_details']['hero_side_title'] ?? '' }}</h3>
                    <p class="left-desc">
                        {{ $industry['sub_details']['hero_side_description'] ?? '' }}
                    </p>
                    <button class="view-btn" id="viewAllBtn">View All</button>
                </div>

                <!-- RIGHT -->
                <div class="col-lg-9 slider-wrapper">

                    <!-- NAV BUTTONS -->
                    <button class="nav-btn prev-btn"><i class="fa fa-arrow-left"></i></button>
                    <button class="nav-btn next-btn"><i class="fa fa-arrow-right"></i></button>

                    <!-- SLIDER -->
                    <div class="custom-slider">
                        <div class="slider-track">
                            @if (!empty($industry['sub_details']['hero_slider']) && is_array($industry['sub_details']['hero_slider']))
                                @foreach ($industry['sub_details']['hero_slider'] as $index => $item)
                                    @if (!empty($item['image']))
                                        @php
                                            $imagePath = asset('storage/' . $item['image']);
                                        @endphp
                                        <div class="health-card slider-item" data-index="{{ $index }}"
                                            data-image="{{ $imagePath }}"
                                            data-title="{{ htmlspecialchars($item['title'] ?? '') }}"
                                            data-excerpt="{{ htmlspecialchars($item['excerpt'] ?? '') }}"
                                            data-description="{{ htmlspecialchars($item['description'] ?? '') }}"
                                            data-gallery='@json($item['gallery_images'] ?? [])'>

                                            <img src="{{ $imagePath }}" alt="{{ $item['image_alt'] ?? 'Industry Image' }}">

                                            <h4>{{ $item['title'] ?? '' }}</h4>

                                            <p>{{ $item['excerpt'] ?? '' }}</p>

                                        </div>
                                    @endif
                                    {{-- Store full HTML in a JS object --}}
                                    <script>
                                        window.sliderDescriptions = window.sliderDescriptions || {};
                                        window.sliderDescriptions[{{ $index }}] = {!! json_encode($item['description'] ?? '') !!};
                                    </script>
                                @endforeach
                            @endif

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <section class="healthcare-brands py-5">
            <div class="container text-center">

                <!-- Heading -->
                <h2 class="brands-heading">
                    {!! highlightBorderBottom($industry['sub_details']['hero_bottom_text']) ?? '' !!}
                </h2>

                <!-- Brand Names -->
                <div class="brand-names d-flex justify-content-center flex-wrap gap-4 mt-4">
                    <span class="brand">Brand One</span>
                    <span class="brand">Brand Two</span>
                    <span class="brand">Brand Three</span>
                    <span class="brand">Brand Four</span>
                </div>

            </div>
        </section>


    </section>

    <div class="modal fade" id="healthModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content health-modal">

                <div class="modal-body p-0 position-relative">

                    <!-- CLOSE BUTTON -->
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
                        ✕
                    </button>

                    <div class="container py-3">
                        <div class="row g-4 p-4">

                            <!-- LEFT COLUMN -->
                            <div class="col-lg-8">
                                <div class="modal-left">
                                    <img id="modal-main-image" src="" alt="">
                                </div>
                            </div>

                            <!-- RIGHT COLUMN -->
                            <div class="col-lg-4">
                                <div class="modal-right">
                                    <div class="row g-2">
                                        <div class="col-12" id="modal-gallery"></div>
                                    </div>
                                </div>

                            </div>

                            <!-- HEADING, DESCRIPTION & LIST -->
                            <div class="modal-content-text mt-4 p-4" id="modal-description"></div>

                            <div class="d-flex justify-content-center align-items-center">
                                <a href="#" class="btn-proposal">Get A Proposal</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- =================== healthcare-marketing-sectio ======================= --}}


    <section class="healthcare-marketing-section py-5">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN: Image -->
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <img src="{{ $industry['sub_details']['detail_accordion_section']['image'] ? asset('storage/' . $industry['sub_details']['detail_accordion_section']['image']) : asset('frontend/images/industry/health-care.png') }}"
                        alt="{{ $industry['sub_details']['detail_accordion_section']['title'] }}"
                        class="img-fluid marketing-img">
                </div>

                <!-- RIGHT COLUMN: Heading + Description -->
                <div class="col-lg-6 col-md-12">
                    <h2 class="marketing-heading">
                        {{ $industry['sub_details']['detail_accordion_section']['title'] ?? '' }}
                    </h2>
                    <p class="marketing-desc">
                        {{ $industry['sub_details']['detail_accordion_section']['description'] ?? '' }}
                    </p>
                    @foreach (collect(data_get($industry, 'sub_details.detail_accordion_section.items', []))->sortBy('sort_order') as $item)
                        <div class="faq-item">
                            <div class="faq-header">
                                <h5>{{ $item['title'] ?? '' }}</h5>
                                <span class="faq-toggle">
                                    <i class="fa-solid fa-plus"></i>
                                </span>
                            </div>

                            <div class="faq-content">
                                <p>{{ $item['content'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    {{-- ============================== atomic-section ================================ --}}
    @php
        $tabsSection = data_get($industry, 'sub_details.detail_tabs_section', []);
        $tabsTitle = data_get($tabsSection, 'title', '');
        $tabsItems = collect(data_get($tabsSection, 'items', []))->sortBy(
            fn($item) => (int) ($item['sort_order'] ?? 0),
        );
    @endphp
    @if ($tabsItems->isNotEmpty())
        <section class="atomic-section py-5">
            <div class="container text-center">

                <!-- Heading -->
                @if ($tabsTitle)
                    <h2 class="atomic-heading">{{ $tabsTitle }}</h2>
                @endif

                <!-- Buttons -->
                <div class="atomic-buttons mt-4">
                    @foreach ($tabsItems as $index => $item)
                        <button class="tab-btn {{ $index === 0 ? 'active' : '' }}" data-tab="tab{{ $index }}">
                            {{ $item['title'] ?? '' }}
                        </button>
                    @endforeach
                </div>
                <!-- TAB CONTENT -->
                <div class="atomic-tab-content mt-4">
                    @foreach ($tabsItems as $index => $item)
                        <p class="atomic-desc tab-content {{ $index === 0 ? 'active' : '' }}" id="tab{{ $index }}">
                            {{ $item['content'] ?? '' }}
                        </p>
                    @endforeach
                </div>

            </div>
        </section>
    @endif


    {{-- =============================== faqs ================================= --}}
    @php
        $servicesSection = data_get($industry, 'sub_details.detail_services_section', []);

        $title = data_get($servicesSection, 'title', '');
        $highlightText = data_get($servicesSection, 'highlight_text', '');
        $description = data_get($servicesSection, 'description', '');

        $accordionItems = collect(data_get($servicesSection, 'accordion_items', []))->sortBy(
            fn($item) => (int) ($item['sort_order'] ?? 0),
        );
    @endphp

    @if ($title || $accordionItems->isNotEmpty())
        <section class="faq-section">
            <div class="container">
                <div class="row align-items-start">

                    <!-- LEFT -->
                    <div class="col-lg-5 faq-left">
                        @if ($title)
                            <h2 class="faq-dm-title">{{ $title }}</h2>
                        @endif

                        @if ($highlightText)
                            <h5 class="top-dm">{{ $highlightText }}</h5>
                        @endif

                        @if ($description)
                            <p class="faq-desc">
                                {!! nl2br(e($description)) !!}
                            </p>
                        @endif
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-7">
                        @foreach ($accordionItems as $item)
                            <div class="faq-item">
                                <div class="faq-header">
                                    <h5>{{ $item['title'] ?? '' }}</h5>
                                    <span class="faq-toggle">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>

                                <div class="faq-content">
                                    <p>{{ $item['content'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @endif

    @php
        $experienceSection = data_get($industry, 'sub_details.detail_experience_section', []);

        $title = data_get($experienceSection, 'title', '');
        $images = data_get($experienceSection, 'images', []);

    @endphp
    @if ($title || !empty($images))
        <section class="experience-section">
            <div class="container">
                <div class="row align-items-center">

                    <!-- LEFT COLUMN -->
                    <div class="col-lg-6">
                        @if ($title)
                            <h2 class="experience-heading">
                                {{ $title }}
                            </h2>
                        @endif

                        <button class="talk-btn">Let’s Talk</button>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-lg-6 position-relative">

                        <div class="cross-wrapper">

                            <!-- Horizontal Line -->
                            <div class="cross-x"></div>

                            <!-- Vertical Line -->
                            <div class="cross-y"></div>

                            <!-- IMAGES -->
                            @php
                                $positions = ['top-left', 'top-right', 'bottom-left', 'bottom-right'];
                            @endphp

                            @foreach ($positions as $index => $position)
                                <img src="{{ !empty($images[$index])
                                    ? asset('storage/' . $images[$index])
                                    : asset('frontend/images/industry/placeholder.png') }}"
                                    class="cross-img{{ $index + 1 }} {{ $position }}"
                                    alt="Experience Image {{ $index + 1 }}">
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </section>
    @endif









@endsection


@push('frontend-scripts')
    {{-- <script>
        const track = document.querySelector('.slider-track');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const cards = document.querySelectorAll('.health-card');

        let index = 0;
        let visibleCards = getVisibleCards();

        function getVisibleCards() {
            if (window.innerWidth <= 575) return 1; // Mobile
            if (window.innerWidth <= 991) return 2; // Tablet
            return 3; // Desktop
        }

        function updateSlider() {
            const cardWidth = cards[0].offsetWidth + 30;
            track.style.transform = `translateX(-${index * cardWidth}px)`;
        }

        nextBtn.addEventListener('click', () => {
            visibleCards = getVisibleCards();
            if (index < cards.length - visibleCards) {
                index++;
                updateSlider();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (index > 0) {
                index--;
                updateSlider();
            }
        });

        /* 🔥 Handle resize */
        window.addEventListener('resize', () => {
            visibleCards = getVisibleCards();
            index = 0;
            updateSlider();
        });
    </script> --}}

    @push('frontend-scripts')
        <script>
            const track = document.querySelector('.slider-track');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const cards = document.querySelectorAll('.health-card');
            const viewAllBtn = document.getElementById('viewAllBtn');
            const sliderWrapper = document.querySelector('.slider-wrapper');

            let index = 0;
            let visibleCards = getVisibleCards();
            let isGridView = false;

            function getVisibleCards() {
                if (window.innerWidth <= 575) return 1;
                if (window.innerWidth <= 991) return 2;
                return 3;
            }

            function updateSlider() {
                if (isGridView) return;

                const cardWidth = cards[0].offsetWidth + 30;
                track.style.transform = `translateX(-${index * cardWidth}px)`;
            }

            nextBtn.addEventListener('click', () => {
                if (isGridView) return;

                visibleCards = getVisibleCards();
                if (index < cards.length - visibleCards) {
                    index++;
                    updateSlider();
                }
            });

            prevBtn.addEventListener('click', () => {
                if (isGridView) return;

                if (index > 0) {
                    index--;
                    updateSlider();
                }
            });

            /* 🔥 View All toggle */
            viewAllBtn.addEventListener('click', () => {
                isGridView = true;
                sliderWrapper.classList.add('grid-view');
                track.style.transform = 'none';
            });

            /* 🔥 Handle resize */
            window.addEventListener('resize', () => {
                if (isGridView) return;

                visibleCards = getVisibleCards();
                index = 0;
                updateSlider();
            });
        </script>
    @endpush


    <script>
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {

                // remove active from all
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // add active to clicked
                button.classList.add('active');
                document.getElementById(button.dataset.tab).classList.add('active');
            });
        });
    </script>

    <script>
        $(document).on('click', '.slider-item', function() {
            let image = $(this).data('image');
            let gallery = $(this).data('gallery');
            let index = $(this).data('index');

            // Open modal
            let modal = new bootstrap.Modal(document.getElementById('healthModal'));
            modal.show();

            // Main image
            $('#modal-main-image').attr('src', image);

            // Description (from JS object)
            let descriptionHtml = window.sliderDescriptions[index] || '';
            $('#modal-description').html(descriptionHtml);

            // Gallery
            let galleryHtml = '';
            if (gallery && gallery.length > 0) {
                gallery.forEach(img => {
                    let fullImg = "{{ asset('storage') }}/" + img;
                    galleryHtml += `
                <div class="col-12">
                    <img src="${fullImg}" class="img-fluid rounded" style="cursor:pointer" onclick="changeMainImage('${fullImg}')">
                </div>`;
                });
            } else {
                galleryHtml = `<p class="text-muted">No gallery images</p>`;
            }
            $('#modal-gallery').html(galleryHtml);
        });

        function changeMainImage(src) {
            $('#modal-main-image').attr('src', src);
        }
    </script>

@endpush
