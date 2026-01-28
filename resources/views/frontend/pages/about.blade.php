@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

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

        /* ============= about us section ============= */

        /* SECTION */
        .about-section {
            font-family: Inrer;
        }

        /* LEFT SIDE */
        .about-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 15px;
        }

        .about-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 183%;
            letter-spacing: 0;
            color: #000000;
            max-width: 841px;
            qa|
        }

        /* RIGHT COLUMN */
        .about-right {
            border-left: 1px solid #F96037;
            padding-left: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* CARD */
        .about-card {
            width: 172px;
            height: 162px;
            background: #404959;
            border-radius: 12px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: all 0.4s ease-in-out;
        }

        .about-card:hover {
            transform: scale(1.03) translateY(-3px);
        }

        .about-card h3 {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 5px;
        }

        .about-card p {
            font-size: 20px;
            font-weight: 700;
            line-height: 29px;
            letter-spacing: 0;
            margin: 0;
        }


        /* ==================== welcome-section ======================== */

        .welcome-section {
            font-family: Inter;
        }

        /* TOP SMALL HEADING */
        .welcome-text {
            display: inline-block;
            color: #F9714A;
            font-size: 20px;
            font-weight: 600;
            line-height: 25px;
            letter-spacing: 0;
            margin-bottom: 10px;
        }

        /* MAIN HEADING */
        .welcome-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;

            max-width: 557px;
        }

        /* RIGHT COLUMN DESC */
        .welcome-desc {
            font-size: 25px;
            font-weight: 300;
            line-height: 183%;
            letter-spacing: 0;
            color: #000000;
            max-width: 718px;
        }


        /* ========================== bg-image-section =============================== */

        .bg-image-section {
            height: 497px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
        }

        .bg-content {
            max-width: 600px;
            color: #ffffff;
        }

        @media(max-width:768px) {
            .bg-image-section {
                height: 248px;

            }
        }

        @media(max-width:767px) {
            .bg-image-section {
                height: 129px;

            }
        }



        .bg-image-section2 {
            margin-top: 50px;
            height: 780px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
        }

        .bg-content {
            max-width: 600px;
            color: #ffffff;
        }

        @media(max-width:768px) {
            .bg-image-section2 {
                height: 367px;

            }
        }

        @media(max-width:767px) {
            .bg-image-section2 {
                height: 195px;

            }
        }

        /* ======================== grow-section ============================== */
        .grow-section {
            font-family: Inter;
        }

        /* HEADING & DESC */
        .grow-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 20px;
        }

        .grow-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 183%;
            letter-spacing: 0;
            color: #000000;
            max-width: 1082px;
        }

        /* RIGHT CONTENT */
        .right-content {
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            gap: 10px;

        }

        /* CARD */
        .stats-card {
            width: 206px;
            height: 489px;
            background: #F0F0F0;
            padding: 10px;
            border-radius: 12px;
        }

        .stats-card h3 {
            font-size: 60px;
            font-weight: 700;
            line-height: 150%;
            letter-spacing: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #010205;
            margin-bottom: 10px;
        }

        .stats-card p {
            font-size: 15px;
            font-weight: 300;
            line-height: 183%;
            letter-spacing: 0;
            color: #5C5D5F;
            margin-bottom: 30px;
            max-width: 181px;
        }

        /* CUSTOM BORDER (6.65px height) */
        .custom-progress {
            width: 100%;
            height: 6.65px;
            background: #D9D9D9;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-filled {
            width: 80%;
            height: 100%;
            background: #000000;
        }

        /* IMAGES */
        .image-stack {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .img-one {
            width: 215px;
            height: 248px;
            object-fit: cover;
        }

        .img-two {
            width: 215px;
            height: 232px;
            object-fit: cover;
        }

        .about-proposal-btn {
            width: 360px;
            height: 56px;
            background: #404959;
            color: #ffffff;

            font-size: 16px;
            font-weight: 700;
            line-height: 140%;

            border: none;
            border-radius: 70px;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
            /* margin: 0px auto; */
            margin-top: 30px;
            transition: all 0.4s ease;
        }

        .about-proposal-btn:hover {
            /* background: #323841; */
            opacity: 0.9;
            transform: scale(1.01);
        }

        /* ==============team-section==================== */

        /* SECTION BG */
        .team-section {
            background: #F38B5C;
            font-family: Inter;
        }

        /* HEADING */
        .team-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            line-break: 0;
            color: #000000;
            margin-bottom: 10px;
        }

        .team-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 183%;
            line-break: 0;
            color: #000000;
            max-width: 1560px;
        }

        /* CARD */
        .team-card {
            text-align: center;
            color: #FFFFFF;
        }

        .team-img {
            width: 100%;
            max-width: 286.73px;
            height: 247px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin: 0 auto 15px;
            overflow: hidden;
        }

        .team-img img {
            height: 246px;
            object-fit: contain;
            background: transparent;

        }

        .marg-left {
            margin-left: 82px;
        }

        .marg-right {
            margin-right: 82px;
        }

        .marg-righ {
            margin-left: 20px;
        }

        /* BACKGROUND COLORS */
        .bg-blue {
            background: #004AAD;
        }



        .bg-purple {
            background: #8C52FF;
        }

        .bg-yellow {
            background: #FFBD59;
        }

        /* TEXT */
        .team-name {
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0;
            margin-bottom: 4px;
        }

        .team-role {
            font-size: 18px;
            font-weight: 400;
            /* line-height: 183%; */
            letter-spacing: 0;
            color: #FFFFFF;
        }

        /* ============================= audit-section ================================= */
        .audit-section {
            /* background: url("images/audit-bg.jpg") center/cover no-repeat; */
            object-fit: contain;
            padding: 40px;
            /* text-align: center; */
            font-family: Inter;
        }

        .audit-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 59px;
            letter-spacing: 0;
            color: #ffffff;
            max-width: 1550px;
            /* margin: 0 auto 40px; */
        }

        .audit-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 608px;
            height: 67px;
            background: #404959;
            border-radius: 12px;
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            line-height: 59px;
            text-decoration: none;
            /* margin-bottom: 80px; */
            margin: 0 auto;
        }

        /* Steps */


        .audit-step {
            text-align: left;
            color: #ffffff;
        }

        .step-circle {
            width: 103px;
            height: 98px;
            border-radius: 50%;
            background: #FCE2D6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            color: #404959;
            margin-top: 40px;
        }

        .audit-step h3 {
            font-size: 28px;
            font-weight: 600;
            line-height: 40px;
            margin-top: 15px;

        }

        .audit-step p {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            opacity: 0.95;
            margin-top: 15px;

        }

        /* Responsive */
        @media (max-width: 992px) {


            .audit-step {
                text-align: center;
            }

            .step-circle {
                margin: 0 auto 20px;
            }

            .audit-btn {
                width: 100%;
                /* font-size: 16px; */
                margin-bottom: 20px;
            }

            .audit-heading {
                font-size: 38px;
                line-height: 46px;
            }
        }

        @media (max-width: 767px) {
            .audit-btn {
                width: 86%;
                font-size: 14px;
                margin-bottom: 20px;
                height: 50px;
            }

            .audit-heading {
                font-size: 20px;
                line-height: 28px;
                text-align: center;
            }

            .step-circle {
                width: 60px;
                height: 60px;

            }

            .audit-step p {
                font-size: 18px;

            }
        }

        /* ======================trusted-section ======================== */

        .trusted-section {
            background: #F5F5F5;
            font-family: Inter;
        }

        .trusted-card img {
            max-width: 70px;
            margin-bottom: 20px;
        }

        .trusted-card h3 {
            font-size: 28px;
            font-weight: 700;
            line-height: 59px;
            color: #000000;
            margin-bottom: 0px;
        }

        .trusted-card p {
            font-size: 20px;
            line-height: 28px;
            font-weight: 400;
            color: #000000;
            margin: 0;
        }

        /* ========================= tabs-section =============================== */
        .tabs-section {
            background: #F7F7F7;
            font-family: Inter;
        }

        /* Tabs */
        .tab-btn {
            background: transparent;
            border: none;
            font-weight: 700;
            font-size: 20px;
            line-height: 25px;
            padding-bottom: 8px;
            cursor: pointer;

        }

        .tab-btn.active {
            color: #F38B5C;
            border-bottom: 2px solid #F38B5C;
        }

        /* Content */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Text */
        .tab-label {
            color: #F38B5C;
            font-weight: 700;
            font-size: 18px;
            line-height: 59px;
            letter-spacing: 0;
            display: block;
            margin-bottom: 10px;
        }

        .tab-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 59px;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 15px;
        }

        .tab-desc {
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0;
            margin-bottom: 20px;
        }

        /* Info button */
        .info-btn {
            background: #fff;
            width: 535.83px;
            height: 91px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px;
            margin-bottom: 15px;
            font-weight: 700;
            font-size: 18px;
            line-height: 59px;
            color: #000000;
            letter-spacing: 0;
        }

        .info-btn i {
            color: #FF6036;
            font-size: 20px;
        }

        /* Buttons */
        .btn-primary-custom {
            background: #FF6036;
            color: #ffffff;
            width: 264.93px;
            height: 59px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 25px;
            line-height: 25px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom img {
            width: 50px;
        }

        /* 🔥 Hover Effect */
        .btn-primary-custom:hover {
            background: #e64f2b;
            /* slightly darker */
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 96, 54, 0.4);
            color: #ffffff;
        }


        .btn-outline-custom {
            background: transparent;
            color: #000000;
            width: 264.93px;
            height: 59px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 25px;
            line-height: 25px;
        }

        .small-text {
            font-size: 16px;
            line-height: 160%;
            color: #777777;
        }

        .small-text strong {
            color: #000000;

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
                    <h1 class="dm-title">About Us</h1>

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
                    <img src="{{ asset('frontend/images/main-services/mc-img.png') }}" alt="Digital Marketing"
                        class="mc-right-img">
                </div>

            </div>
        </div>
    </section>

    {{-- ============= about us section ================== --}}

    <section class="about-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6">
                    <h2 class="about-heading">About Us</h2>
                    <p class="about-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>

                    <a href="#" class="dm-btn">Start Your Project</a>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6">
                    <div class="about-right">

                        <div class="about-card">
                            <h3>50+</h3>
                            <p>Complete Projects</p>
                        </div>

                        <div class="about-card">
                            <h3>5+</h3>
                            <p>On Going Projects </p>
                        </div>

                        <div class="about-card">
                            <h3>200+</h3>
                            <p>Happy Clients</p>
                        </div>


                        <div class="about-card">
                            <h3>100+</h3>
                            <p>Talented Team</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ==================== welcome-section ========================== --}}

    <section class="welcome-section py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6">
                    <span class="welcome-text">Welcome to marketing Agency</span>
                    <h2 class="welcome-heading">
                        Guiding your business to achieve success.
                    </h2>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6">
                    <p class="welcome-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                    </p>
                </div>

            </div>
        </div>

        {{-- ===================== bg-image-section ====================== --}}
        <section class="trusted-section py-5">
            <div class="container">
                <div class="row text-center g-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="trusted-card">
                            <img src="{{ asset('frontend/images/about-logo1.png') }}" alt="Logo">
                            <h3>Trusted Company</h3>
                            <p>Digital marketing that helps<br>you to promote the world.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="trusted-card">
                            <img src="{{ asset('frontend/images/about-logo2.png') }}" alt="Logo">
                            <h3>Trusted Company</h3>
                            <p>Digital marketing that helps<br>you to promote the world.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="trusted-card">
                            <img src="{{ asset('frontend/images/about-logo3.png') }}" alt="Logo">
                            <h3>Trusted Company</h3>
                            <p>Digital marketing that helps<br>you to promote the world.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="trusted-card">
                            <img src="{{ asset('frontend/images/about-logo4.png') }}" alt="Logo">
                            <h3>Trusted Company</h3>
                            <p>Digital marketing that helps<br>you to promote the world.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- <section class="bg-image-section"
            style="background-image: url('{{ asset('frontend/images/about/about-bg-img.png') }}');"> --}}



        {{-- ============================ tabs-section ======================== --}}
        <section class="tabs-section py-5">
            <div class="container">

                <!-- TAB BUTTONS -->
                <div class="tab-buttons d-flex gap-4 mb-5 justify-content-center border-bottom">
                    <button class="tab-btn active" data-tab="tab1">Company benefits</button>
                    <button class="tab-btn" data-tab="tab2">Competitive analysis</button>
                    <button class="tab-btn" data-tab="tab3">Trusted experience</button>
                    <button class="tab-btn" data-tab="tab4">Global partners</button>
                </div>

                <!-- TAB CONTENT -->
                <div class="tab-content-wrapper">

                    <!-- TAB 1 -->
                    <div class="tab-content active" id="tab1">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                                    class="img-fluid rounded" alt="">
                            </div>

                            <div class="col-lg-6">
                                <span class="tab-label">COMPANY BENEFITS</span>
                                <h2 class="tab-heading">Effective solutions for all business.</h2>
                                <p class="tab-desc">
                                    We deliver modern digital strategies that improve business
                                    performance and help companies grow faster worldwide.
                                </p>

                                <div class="info-btn">
                                    <i class="bi bi-briefcase"></i>
                                    Business Transformation agency.
                                </div>

                                <p class="small-text">
                                    Get your <strong>First Payment Today</strong> and grow your business.
                                </p>

                                <div class="d-flex gap-3">
                                    <a href="#" class="btn-primary-custom">Explore services <img
                                            src="{{ asset('frontend/images/kips-icon.png') }}" alt=""></a>
                                    <a href="#" class="btn-outline-custom">Quick contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2 -->
                    <div class="tab-content" id="tab2">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786"
                                    class="img-fluid rounded" alt="">
                            </div>

                            <div class="col-lg-6">
                                <span class="tab-label">COMPETITIVE ANALYSIS</span>
                                <h2 class="tab-heading">Effective solutions for all business.</h2>
                                <p class="tab-desc">
                                    Our competitive research helps you stay ahead in the market
                                    with data-driven marketing strategies.
                                </p>

                                <div class="info-btn">
                                    <i class="bi bi-graph-up"></i>
                                    Business Transformation agency.
                                </div>

                                <p class="small-text">
                                    Get your <strong>First Payment Today</strong> and grow your business.
                                </p>

                                <div class="d-flex gap-3">
                                    <a href="#" class="btn-primary-custom">Explore services</a>
                                    <a href="#" class="btn-outline-custom">Quick contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3 -->
                    <div class="tab-content" id="tab3">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d"
                                    class="img-fluid rounded" alt="">
                            </div>

                            <div class="col-lg-6">
                                <span class="tab-label">TRUSTED EXPERIENCE</span>
                                <h2 class="tab-heading">Effective solutions for all business.</h2>
                                <p class="tab-desc">
                                    Years of experience delivering trusted solutions for
                                    enterprises across industries.
                                </p>

                                <div class="info-btn">
                                    <i class="bi bi-award"></i>
                                    Business Transformation agency.
                                </div>

                                <p class="small-text">
                                    Get your <strong>First Payment Today</strong> and grow your business.
                                </p>

                                <div class="d-flex gap-3">
                                    <a href="#" class="btn-primary-custom">Explore services</a>
                                    <a href="#" class="btn-outline-custom">Quick contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 4 -->
                    <div class="tab-content" id="tab4">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d"
                                    class="img-fluid rounded" alt="">
                            </div>

                            <div class="col-lg-6">
                                <span class="tab-label">GLOBAL PARTNERS</span>
                                <h2 class="tab-heading">Effective solutions for all business.</h2>
                                <p class="tab-desc">
                                    Partnering globally to bring world-class marketing
                                    innovations to your business.
                                </p>

                                <div class="info-btn">
                                    <i class="bi bi-globe"></i>
                                    Business Transformation agency.
                                </div>
                                <p class="small-text">
                                    Get your <strong>First Payment Today</strong> and grow your business.
                                </p>

                                <div class="d-flex gap-3">
                                    <a href="#" class="btn-primary-custom">Explore services</a>
                                    <a href="#" class="btn-outline-custom">Quick contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>




    </section>
    </section>

    <x-brand-nextlevel />

    {{-- ======================= grow-section ======================== --}}

    <section class="grow-section py-5 ">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-7">
                    <h2 class="grow-heading">Grow Your Brand Online</h2>
                    <p class="grow-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse.
                        Cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                        Sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Curabitur pretium tincidunt lacus.
                    </p>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-5">
                    <div class="right-content ">

                        <!-- CARD -->
                        <div class="stats-card">
                            <h3>230+</h3>
                            <p>Successful Projects Completed Duis aute irure dolor in reprehenderit in voluptate velit esse.
                                Cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident.
                                .</p>

                            <!-- PROGRESS BORDER -->
                            <div class="custom-progress">
                                <div class="progress-filled"></div>
                            </div>
                        </div>

                        <!-- IMAGES -->
                        <div class="image-stack">
                            <img src="{{ asset('frontend/images/about/drand-img.png') }}" alt="" class="img-one">
                            <img src="{{ asset('frontend/images/about/brand-img2.png') }}" alt=""
                                class="img-two">
                        </div>

                    </div>
                    <button class="about-proposal-btn">
                        Get Proposal
                    </button>

                </div>

            </div>
        </div>
    </section>

    {{-- ============team-section=====================  --}}

    <section class="team-section py-5 my-2">
        <div class="container">

            <!-- HEADING -->
            <div class=" mb-5">
                <h2 class="team-heading">Meet The Team</h2>
                <p class="team-desc">
                    Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                    tempus diam.Libero diam auctor tristique hendreritLibero diam t Libero diam auctor tristique hendrerit
                    in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique
                    hendreritLibero diam t Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla.
                    Nullam vitae sit tempus diam.Libero diam auctor tristique hendreritLibero diam t Libero diam auctor
                    tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam
                    auctor tristique hendreritLibero diam t
                </p>
            </div>

            <!-- TEAM GRID -->
            <div class="row ">

                <!-- MEMBER -->
                @foreach ($teams as $team)
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="team-card">
                            <div class="team-img bg-blue">
                                <img src="{{ $team->image ? asset('storage/teams/'.$team->image) : asset('frontend/images/about/team-img1.png') }}" alt=""
                                    class="marg-left">
                            </div>
                            <h5 class="team-name">{{ $team->name ?? '' }}</h5>
                            <p class="team-role">{{ $team->designation ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ===================== bg-image-section ====================== --}}
    <div class="my-4">
        <x-career />
    </div>
    

    <!-- ========================== revnue section ============================== -->
    <x-testimonial-component />


    {{-- ================= audit-section ======================= --}}

    <section class="audit-section my-2"
        style="background-image: url('{{ asset('frontend/images/about/audit-bg.png') }}');">
        <div class="container">

            <h2 class="audit-heading">
                How to Get Started with Your Free Digital Marketing Audit
            </h2>

            <a href="#" class="audit-btn">
                Claim Your Free Consultation Today
            </a>

            <div class="row">

                <div class="col-lg-4">
                    <!-- Step 1 -->
                    <div class="audit-step">
                        <div class="step-circle">1</div>
                        <h3>Step 1. Complete the Audit Request Form</h3>
                        <p>
                            Fill out our quick form with your business details so we can understand your goals.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Step 2 -->
                    <div class="audit-step">
                        <div class="step-circle">2</div>
                        <h3>Step 2. We Analyze Your Online Presence</h3>
                        <p>
                            Our experts review your website, SEO, ads, and social media performance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">

                    <!-- Step 3 -->
                    <div class="audit-step">
                        <div class="step-circle">3</div>
                        <h3>Step 3. Get Your Custom Strategy</h3>
                        <p>
                            Receive a detailed report with actionable insights and growth opportunities.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection




@push('frontend-scripts')
    <script>
        document.querySelectorAll(".tab-btn").forEach(btn => {
            btn.addEventListener("click", () => {

                document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
                document.querySelectorAll(".tab-content").forEach(c => c.classList.remove("active"));

                btn.classList.add("active");
                document.getElementById(btn.dataset.tab).classList.add("active");
            });
        });
    </script>
@endpush
