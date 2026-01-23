@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $subService->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $subService->meta_keywords ?? '')
@section('meta_description', $subService->meta_description ?? '')

@push('frontend-styles')
    <style>
        .dm-services-section {
            padding: 100px 0;
            min-height: 800px;
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

        /* ===================== marketing-section  =========================== */

        .marketing-section {
            background: #fff;
            font-family: Inter;
        }

        /* LEFT LIST */
        .service-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-width: 379px;

        }

        .service-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #000000;
            margin-top: 20px;
            color: #000000;
            font-weight: 700;
            font-size: 25px;
            line-height: 25px;
            letter-spacing: 0;

        }

        .service-list img {
            width: 40px;
            /* height: 36px; */
        }

        .service-list li.active {
            color: #F96037;
        }

        /* QUESTION CARD */
        .question-card {
            max-width: 376px;
            height: 421px;
            background: #404959;
            border-radius: 20px;
            padding: 25px;
            color: #fff;
        }

        .question-card h4 {
            color: #ffffff;
            font-weight: 700;
            font-size: 25px;
            line-height: 25px;
            letter-spacing: 0;
        }

        .question-card p {
            color: #ffffff;
            font-weight: 400;
            font-size: 20px;
            line-height: 183%;
            letter-spacing: 0;
        }

        .contact-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #F96037;
            color: #fff;
            border-radius: 12px;
            text-decoration: none;
            margin-top: 15px;
            width: 274px;
            height: 67px;
            font-weight: 700;
            font-size: 20px;
            line-height: 25px;
            letter-spacing: 0;
        }

        .phone-text {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 300;
            font-size: 20px;
            line-height: 25px;
            letter-spacing: 0;
        }

        /* RIGHT SIDE */
        .right-heading {
            font-weight: 700;
            font-size: 45px;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 10px;
            max-width: 721px;
            color: #000000;
        }

        .right-desc {
            color: #000000;
            font-weight: 400;
            font-size: 25px;
            line-height: 183%;
            letter-spacing: 0;
            max-width: 1189px;
            margin-bottom: 20px;
        }

        /* CAMPAIGN CARD */
        .campaign-card {
            background: #F7F7F7;
            /* border-radius: 16px; */
            padding: 10px;
        }

        .campaign-card h5 {
            color: #000000;
            font-weight: 700;
            font-size: 35px;
            line-height: 60px;
            letter-spacing: 0;
            max-width: 721px;

        }

        .campaign-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 1px solid #000000;
            color: #000000;
            font-weight: 700;
            font-size: 25px;
            line-height: 25px;
            letter-spacing: 0;
            margin-top: 25px;
            max-width: 547px;
        }

        .campaign-item i {
            color: #F96037;
        }

        /* IMAGE */
        .campaign-img {
            max-width: 639px;
            height: 330px;
            object-fit: cover;

        }

        @media(max-width: 768px) {
            .campaign-img {
                max-width: 639px;
                height: 213px;
                object-fit: cover;
            }

            .campaign-card h5 {

                font-size: 29px;

            }

            .campaign-item {

                font-size: 20px;

            }
        }


        @media(max-width: 767px) {
            .campaign-img {
                max-width: 639px;
                height: 213px;
                object-fit: cover;
            }

            .campaign-card h5 {

                font-size: 25px;

            }

            .campaign-item {

                font-size: 18px;

            }

            .right-heading {
                font-size: 26px;

            }

            .right-desc {

                font-size: 16px;
                text-align: center;
                max-width: 100%;
                margin-bottom: 20px;
            }
        }



        .process-title {
            font-size: 45px;
            line-height: 60px;
            letter-spacing: 0px;
            max-width: 1056px;
            margin-bottom: 30px;
            font-weight: 700;
            /* text-align: center; */
        }


        /* ============== ================= */
        /* SECTION */
        .commitments-section {}

        /* HEADING */
        .commitment-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            font-family: Inter;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 15px;
            max-width: 531px;
            text-align: center;
        }

        .commitment-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
            color: #000000;
            text-align: center;
            max-width: 700px;
            max-width: 841px;
        }

        /* OUTER CARD */
        .outer-commit {
            max-width: 290px;
            width: 100%;
            height: 290px;
            border: 5px solid #F38B5C;
            background: #ffffff;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
            transition: all 0.3s ease-in-out;
            margin: 0 auto;
        }

        .outer-commit:hover {
            transform: scale(1.02) translateY(-5px);
        }

        /* INNER CARD */
        .inner-commit {
            max-width: 269px;
            height: 271px;
            background: #404959;
            border-radius: 13px;
            padding: 10px;
            color: #ffffff;
        }

        /* ICON */
        .icon-box img {
            width: 70px;
            height: 70px;
            /* background: #ffffff; */
            /* border-radius: 50%; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .icon-box img {
            width: 40px;
            height: auto;
        }

        /* CARD TEXT */
        .inner-commit h4 {
            font-size: 16px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            color: #F38B5C;
            margin-bottom: 10px;
        }

        .inner-commit p {
            font-size: 16px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            font-family: Inter;
            color: #FFFFFF;
            max-width: 236px;
        }

        .Shopify-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 55px;
            font-family: Inter;
            letter-spacing: 0;
            color: #000000;
            font-family: Inter;
            max-width: 1153px;
        }

        .Shopify-list {
            font-size: 25px;
            font-weight: 300;
            line-height: 160%;
            letter-spacing: 0;
            font-family: Inter;
        }

        .Shopify-list li {
            margin-top: 15px;
            margin-left: 20px;
            max-width: 834px;

        }

        .Shopify-list strong {
            font-weight: 700;
        }
    </style>
@endpush
@section('frontend-content')


    <section class="dm-services-section"
        style="background-image: url('{{ $subService->page_content['hero_section']['image'] ? asset('storage/' . $subService->page_content['hero_section']['image']) : asset('frontend/images/main-services/mc-hero.png') }}');">

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="mc-badge">We Help Grow Business</h4>
                    <h1 class="dm-title">{{ $subService->title ?? '' }} </h1>

                    {{-- <h4 class="dm-subtitle">
                        Customized Marketing Solutions That Deliver Results, Every Time
                    </h4> --}}

                    <p class="dm-desc">
                        {{ \Illuminate\Support\Str::limit($subService->short_description ?? '', 180) }}
                    </p>

                    <a href="#" class="dm-btn">Start Your Project</a>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center d-flex align-items-center ">
                    <img src="{{ asset('frontend/images/main-services/mc-img.png') }}" alt="Digital Marketing"
                        class="mc-right-img">
                </div>

            </div>
        </div>
    </section>

    {{-- =======================marketing-section ======================== --}}

    <section class="marketing-section py-5">
        <div class="container">
            <div class="row align-items-start">

                <!-- LEFT COLUMN -->
                <div class="col-lg-4">

                    <!-- Services List -->
                    <ul class="service-list">
                        <li>
                            <span>Engaging audiences</span>
                            <img src="{{ asset('frontend/images/main-services/user-icon.png') }}" alt="">
                        </li>
                        <li>
                            <span>Marketing research</span>
                            <img src="{{ asset('frontend/images/main-services/loc-icon.png') }}" alt="">
                        </li>
                        <li>
                            <span>Sales development</span>
                            <img src="{{ asset('frontend/images/main-services/bag-icon.png') }}" alt="">
                        </li>
                        <li class="active">
                            <span>Marketing campaign</span>
                            <img src="{{ asset('frontend/images/main-services/camp-icon.png') }}" alt="">

                        </li>
                    </ul>

                    <!-- Question Card -->
                    <div class="question-card mt-4">
                        <h4>Have a Questions?</h4>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. In, recusandae asperiores blanditiis
                            vel quam excepturi beatae et, repellat ad reiciendis assumenda. </p>

                        <a href="mailto:info@gmail.com" class="contact-btn">
                            <i class="fa-solid fa-envelope"></i>
                            info@gmail.com
                        </a>

                        <div class="phone-text mt-3">
                            <i class="fa-solid fa-phone"></i>
                            12345678
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-8">

                    <h2 class="right-heading">{{ $subService->page_content['hero_section']['main_heading'] ?? '' }}</h2>
                    <p class="right-desc">
                        {{ $subService->page_content['hero_section']['short_description'] ?? '' }}</p>

                    <div class="row align-items-cente campaign-card">
                        <div class="col-md-7">
                            <h5>{{ $subService->page_content['campaign_section']['title'] ?? '' }}</h5>

                            @foreach ($subService->page_content['campaign_section']['points'] ?? [] as $point)
                                <div class="campaign-item">
                                    <i class="fa-solid fa-check"></i>
                                    {{ $point }}
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-5 text-center">
                            <img src="{{ $subService->page_content['campaign_section']['image'] ? asset('storage/' . $subService->page_content['campaign_section']['image']) : asset('frontend/images/main-services/compaign-img.png') }}" alt=""
                                class="campaign-img">
                        </div>
                    </div>


                    <div class="row mt-5">

                        <!-- Main Heading -->
                        <h2 class="process-title">
                            {{ $subService->page_content['development_process']['title'] ?? '' }}
                        </h2>

                        @foreach ($subService->page_content['development_process']['steps'] ?? [] as $index => $step)
                            <!-- Item -->
                            <div class="performance-item">
                                <span class="performance-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="performance-subtitle">
                                    {{ $step['title'] ?? '' }}
                                </h3>
                            </div>

                            <!-- Description -->
                            <p class="performance-desc">
                                {{ $step['description'] ?? '' }}
                            </p>
                        @endforeach

                    </div>
                    <!-- HEADING ROW -->
                    <div class="row mt-4">
                        <div class="col-lg-8 ">
                            <h2 class="commitment-heading">
                                {{ $subService->page_content['commitments_section']['title'] ?? '' }}</h2>
                            <p class="commitment-desc">
                                {{ $subService->page_content['commitments_section']['description'] ?? '' }}
                            </p>
                        </div>
                    </div>

                    <!-- CARDS ROW -->
                    <div class="row g-3 mt-4">

                        @foreach ($subService->page_content['commitments_section']['points'] ?? [] as $index => $point)
                            <div class="col-lg-3 col-md-6">
                                <div class="outer-commit">
                                    <div class="inner-commit">
                                        <div class="icon-box">
                                            <img src="{{ $subService->page_content['commitments_section']['icons'][$index] ? asset('storage/' . $subService->page_content['commitments_section']['icons'][$index]) : asset('frontend/images/offer-icon.png') }}" alt="Web Design"
                                                class="card-icon">

                                        </div>
                                        <h4>{{ $point['title'] ?? '' }}</h4>
                                        <p>
                                            {{ $point['sub_title'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-4">
                        <h2 class="Shopify-heading">{{ $subService->page_content['why_choose_section']['title'] ?? '' }}
                        </h2>
                        <ul class="Shopify-list ">
                            @foreach ($subService->page_content['why_choose_section']['points'] ?? [] as $point)
                                <li><strong>{{ $point['strong_text'] ?? '' }}</strong> {{ $point['text'] ?? '' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- ============ brand next level ======== --}}

    <x-brand-nextlevel />

    {{-- ============ revenue ======== --}}

    <div class="mt-5">
        <x-revenue />

    </div>
    {{-- ============ faqs ======== --}}
    <x-faqs />


    {{-- ========== services offer ============ --}}

    <x-services-offer />
@endsection




@push('frontend-scripts')
    <script></script>
@endpush
