@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $service->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $service->meta_keywords ?? '')
@section('meta_description', $service->meta_description ?? '')

@push('frontend-styles')
    <style>
        .dm-services-section {
            padding: 100px 0;
            min-height: 870px;
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

        /* ======================================== smart-growth-section ========================================= */

        .smart-growth-section {
            padding: 50px 0;
            background: #ffffff;
            font-family: Inter;

        }

        .smart-growth-section .container {
            max-width: 1350px !important;
        }



        /* Image */
        .card-image img {
            width: 501px;
            height: 280px;
            object-fit: cover;
            filter: drop-shadow(0px 4px 6.5px rgba(0, 0, 0, 0.5));
            border-radius: 30px;
            margin-left: 10px;
        }

        /* Content */
        .card-content h3 {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 20px;
            color: #000000;
            max-width: 848px;
        }

        .card-content p {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 1000px;
        }


        /* Outer Box */
        .outter-box {
            width: 100%;
            max-width: 508px;
            height: 490px;
            background: #FFFFFF;
            border: 5px solid #F38B5C;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            transition: all 0.4s ease-in-out;
        }

        .outter-box:hover {
            transform: translateY(-10px);
        }

        /* Inner Card */
        .innerr-card {
            width: 100%;
            max-width: 395px;
            height: 460px;
            background: #404959;
            border-radius: 13px;
            padding: 35px 30px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        /* Icon */
        .card-icon {
            width: 83px;
            height: 83px;
            margin-bottom: 25px;
        }

        /* Gradient Title */
        .smart-title {
            font-size: 25px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            max-width: 350px;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #F38B5C, #666666);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Description */
        .smart-desc {
            font-size: 20px;
            line-height: 162%;
            font-weight: 400;
            letter-spacing: 0;
            color: #ffffff;
            margin-bottom: auto;
        }

        /* Button */
        .smart-bttn {
            width: 241px;
            height: 59px;
            background: linear-gradient(90deg, #FF6036, #404959);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 12px;
            margin-top: 30px;
            font-size: 25px;
            line-height: 25;
            font-weight: 700;
            letter-spacing: 0;
            align-self: flex-start;
            transition: all 0.3s ease-in;

        }

        .smart-bttn img {
            width: 50px;
        }

        .smart-bttn:hover {
            transform: scale(1.04)
        }

        .proposal-btn {
            width: 100%;
            max-width: 499px;
            height: 67px;
            background: #404959;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 12px;
            margin-top: 30px;
            font-size: 25px;
            line-height: 25;
            font-weight: 700;
            letter-spacing: 0;
            transition: all 0.3s ease-in;

        }

        .proposal-btn:hover {
            transform: scale(1.02);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .smart-card {
                flex-direction: column;
                text-align: left;
            }

            .card-image img {
                width: 100%;
                height: auto;
                margin-left: 0;
            }

            .card-content h3 {
                text-align: center;
                font-size: 39px;
                line-height: 49px;
            }

            .card-content p {
                text-align: center;
                max-width: 100%;
                font-size: 16px;
            }

            .outter-box {
                width: 350px;

            }

            .innerr-card {
                width: 320px;

            }



            .smart-btn {
                width: 100%;
            }

            .smart-title {
                font-size: 20px;
                ;
            }

            .smart-desc {
                font-size: 16px;

            }

            .card-icon {
                width: 70px;
                height: 70px;
            }

            .proposal-btn {
                width: 100%;
                max-width: 349px;
            }
        }

        /* ====================================== industry-solutions-section =================================== */


        .industry-solutions-section {
            width: 100%;
            font-family: Inter;
        }

        /* LEFT SIDE */
        .solutions-left {
            background: #000000;
            padding: 20px 40px;
            color: #ffffff;
        }

        .solutions-content {
            padding-left: 120px;
        }

        .solutions-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 50px;
            max-width: 899px;
        }

        /* Cards */
        .solution-card {
            width: 100%;
            max-width: 457px;
            height: 197px;
            border-radius: 30px;
            border: 5px solid #F38B5C;
            padding: 25px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Card backgrounds */
        .dark-card {
            background: #1A1A1A;
        }

        .gray-card {
            background: #404959;
        }

        /* Icon */
        .solution-icon {
            width: 36px;
            height: 36px;
            margin-bottom: 12px;
        }

        /* Card text */
        .solution-card h4 {
            font-size: 20px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .solution-card p {
            font-size: 20px;
            font-weight: 400;
            line-height: 129%;
            letter-spacing: 0;
            max-width: 360px;
            color: #ffffff;
            margin: 0;
        }

        /* RIGHT SIDE */
        .solutions-right {
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .right-img {
            width: 100%;
            /* max-width: 420px; */
            height: 100%;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {

            .solutions-left,
            .solutions-right {
                padding: 50px 25px;
            }

            .solution-card {
                width: 100%;
                height: auto;
            }

            .solutions-heading {
                font-size: 30px;
                line-height: 42px;
            }

            .solutions-content {
                padding-left: 0px;
            }
        }


        /* =============================== industry-solutions-section ============================== */


        .seo-performance-section {
            padding: 50px 0;
            background: #ffffff;
            font-family: Inter;
        }

        /* Heading */
        .seo-heading {
            font-size: 50px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0px;
            color: #000000;
            max-width: 861px;
        }

        /* Description */
        .seo-desc {
            font-size: 20px;
            font-weight: 400px;
            line-height: 160%;
            color: #000000
        }

        /* Image */
        .seo-image {
            width: 582px;
            height: 690px;
            border-radius: 30px;
            object-fit: cover;
            max-width: 100%;
            filter: drop-shadow(0px 0px 6.1px rgba(0, 0, 0, 0.5));

        }

        /* Performance Items */
        .performance-itemm {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .performance-numberr {
            font-size: 24px;
            font-weight: 700;
            color: #F38B5C;
            min-width: 40px;
        }

        .performance-subtitlee {
            font-size: 25px;
            font-weight: 700;
            line-height: 32px;
            letter-spacing: 0;
            color: #000000;
            max-width: 653px;
        }

        .performance-desc {
            margin-left: 58px;
            margin-top: 4px;
            font-size: 25px;
            font-weight: 300px;
            line-height: 160%;

            color: #000000;
            max-width: 762px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .seo-heading {
                font-size: 32px;
                line-height: 44px;
            }

            .seo-image {
                height: auto;
            }

            .performance-item {
                margin-bottom: 25px;
            }
        }

        /* ========================== bg-image-section =============================== */

        .bg-image-section {
            height: 843px;
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
                height: 367px;

            }
        }

        @media(max-width:767px) {
            .bg-image-section {
                height: 195px;

            }
        }

        /* ================================== contact-form-section ================================== */

        .contact-form-section {
            font-family: Inter;
        }

        .custom-input {
            width: 100%;
            max-width: 387px;
            height: 58px;
            border-radius: 14px;
            /* border: 2px solid #F96037; */

        }

        .custom-input:focus {
            border: 2px solid #F96037;
            outline: none;

        }

        .phone-field {
            width: 100%;
            max-width: 387px;
            height: 58px;
        }

        .phone-wrapper {
            width: 100%;
            max-width: 387px;
            height: 58px;
            display: flex;
            border-radius: 14px;
            overflow: hidden;
            /* 🔥 MOST IMPORTANT */
        }

        .country-code {
            width: 85px;
            /* border-right: 1px solid #ccc; */
            border-radius: 14px 0 0 14px;
        }

        .phone-number {
            flex: 1;
            border-radius: 0 14px 14px 0;
        }

        /* Remove double borders */
        .country-code,
        .phone-number {
            /* border: 1px solid #ced4da; */
        }

        /* Remove gap + shadow on focus */
        .country-code:focus,
        .phone-number:focus {
            box-shadow: none;
            border-color: #F96037;
        }


        .phone-input {
            width: 70%;
            border-radius: 0 14px 14px 0;
        }

        .message-field {
            background: transparent;
            border: none;
            border-bottom: 2px solid #F96037;
            border-radius: 0;
            color: #fff;
            max-width: 752px;
            height: 60px;
        }

        .message-field:focus {
            box-shadow: none;
            background: transparent;
            border-bottom: 3px solid #F96037;
            color: #ffffff;
        }

        .submit-btn {
            background: #F96037;
            color: #ffffff;
            border-radius: 12px;
            border: none;
            width: 215px;
            height: 50px;
            margin-top: 30px;

            font-size: 20px;
            font-weight: 700;
            line-height: 25px;

            display: flex;
            align-items: center;
            /* vertical center */
            justify-content: center;
            /* horizontal center */
            gap: 12px;
        }

        .submit-btn img {
            width: 50px;
            /* 🔥 50px bohat zyada tha */
            height: auto;
        }


        .custom-img {
            width: 100%;
            max-width: 585px;
            height: 570px;
            object-fit: cover;
            border-radius: 30px;
        }

        .service-checkboxes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .form-check-input:checked {
            background-color: #F96037;
            border-color: #F96037;
        }

        .form-box {
            background-color: #404959;
            padding: 30px;
            height: auto;

        }

        .form-box .labell {
            font-size: 25px;
            font-weight: 700;
            line-height: normal;
            /* margin-bottom: 8px; */
            color: #FFFFFF;
        }

        @media(max-width:767px) {
            .form-box {
                height: auto;

            }
        }
    </style>
@endpush
@section('frontend-content')



    <section class="dm-services-section"
        style="background-image: url('{{ asset('frontend/images/main-services/mc-hero.png') }}');">

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="mc-badge">We Help Grow Business</h4>
                    <h1 class="dm-title">{{ $service->title ?? '' }} </h1>

                    {{-- <h4 class="dm-subtitle">
                        Customized Marketing Solutions That Deliver Results, Every Time
                    </h4> --}}

                    <p class="dm-desc">
                        {{ \Illuminate\Support\Str::limit($service->short_description ?? '', 180) }}
                    </p>

                    <a href="javascript:void(0)" class="dm-btn" data-bs-toggle="modal" data-bs-target="#projectModal">Start Your Project</a>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center d-flex align-items-center ">
                    <img src="{{ asset('frontend/images/main-services/mc-img.png') }}" alt="Digital Marketing"
                        class="mc-right-img">
                </div>

            </div>
        </div>
    </section>

    {{-- ================================ smart-growth-section ================================== --}}
    <section class="smart-growth-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-5">
                    <!-- Left Image -->
                    <div class="card-image">
                        <img src="{{ asset('frontend/images/main-services/digitalgrowth.png') }}" alt="Digital Growth">
                    </div>
                </div>

                <div class="col-lg-7">
                    <!-- Right Content -->
                    <div class="card-content">
                        <h3>A Smarter Approach to Digital Growth</h3>
                        <p>
                            We combine data-driven strategies with cutting-edge digital tools
                            to help brands grow smarter, faster, and more efficiently.
                            Our tailored solutions focus on measurable results, long-term
                            scalability, and sustainable online success across all channels.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5">


            <!-- Cards -->
            <div class="row justify-content-center">
                <!-- Card 1 -->
                @if (!empty($subServices) && $subServices->count())
                    @foreach ($subServices as $subService)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="outter-box">
                                <div class="innerr-card">
                                    <img src="{{ $subService->icon ? asset('storage/' . $subService->icon) : asset('frontend/images/offer-icon.png') }}"
                                        alt="Web Design" class="card-icon">

                                    <h4 class="smart-title">
                                        {{ $subService->title ?? '' }}
                                    </h4>

                                    @if (!empty($subService->main_points))
                                        <ul class="smart-desc">
                                            @foreach ($subService->main_points as $point)
                                                <li>{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <a href="{{ route('service.subservice', [
                                        'serviceSlug' => $service->slug,
                                        'subServiceSlug' => $subService->slug,
                                    ]) }}"
                                        class="smart-bttn">
                                        View Service
                                        <img src="{{ asset('frontend/images/kips-icon.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <a href="" class="proposal-btn">Get Proposal
                    <img src="{{ asset('frontend/images/kips-icon.png') }}" alt="">
                </a>
            </div>

        </div>
    </section>





    {{-- ========================= industry-solutions-section ==================================== --}}
    <section class="industry-solutions-section">
        <div class="container-fluid p-0">
            <div class="row g-0">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8 solutions-left">
                    <div class="solutions-content">
                        <h2 class="solutions-heading">
                            {{ $service->engaging_content['section_one']['heading'] }}
                        </h2>

                        <div class="row">
                            @foreach ($service->engaging_content['section_one']['points'] as $index => $point)
                                <div class="col-md-6 mb-4">
                                    <div class="solution-card {{ $index % 2 == 0 ? 'dark-card' : 'gray-card' }}">
                                        <img src="{{ asset('frontend/images/main-services/industry-icon.png') }}"
                                            alt="Icon" class="solution-icon">

                                        <h4>{{ $point['title'] }}</h4>

                                        <p>{{ $point['sub_title'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p class="text-white">Let’s make something great work Together. <a href="">Get Free
                            Quote</a></p>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4 solutions-right">
                    @php
                        $imagePath = $service->engaging_content['section_one']['image']['path'] ?? null;
                        $imageAlt = $service->engaging_content['section_one']['image']['alt'] ?? 'Service Image';
                    @endphp

                    @if ($imagePath)
                        <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $imageAlt }}" class="right-img">
                    @endif
                </div>

            </div>
        </div>
    </section>


    <section class="seo-performance-section">
        <div class="container">

            <!-- Top Row -->
            <div class="row align-items-start ">
                <div class="col-lg-6">
                    <h2 class="seo-heading">
                        {{ $service->engaging_content['section_two']['heading'] }}
                    </h2>
                </div>

                <div class="col-lg-6">
                    <p class="seo-desc">
                        {{ $service->engaging_content['section_two']['description'] }}
                    </p>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="row align-items-start mt-4">
                <!-- Left Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    @php
                        $imagePath = $service->engaging_content['section_two']['image']['path'] ?? null;
                        $imageAlt = $service->engaging_content['section_two']['image']['alt'] ?? 'Service Image';
                    @endphp

                    @if ($imagePath)
                        <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $imageAlt }}" class="seo-image">
                    @endif
                </div>

                <!-- Right Content -->
                <div class="col-lg-6">
                    @foreach ($service->engaging_content['section_two']['points'] as $index => $point)
                        <div class="performance-block">
                            <div class="performance-itemm">
                                <span class="performance-numberr">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="performance-subtitlee">
                                    {{ $point['title'] }}
                                </h3>
                            </div>
                            <p class="performance-desc">
                                {{ $point['sub_title'] }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    {{-- ===================== bg-image-section ====================== --}}


    {{-- <section class="bg-image-section"
        style="background-image: url('{{ asset('frontend/images/main-services/bg-image.png') }}');">
    </section> --}}


    <x-career :brands="$brands" />


    {{-- ================================ contact-form-section ================================ --}}

    <section class="py-5 contact-form-section">
        <div class="container">
            <div class="row  g-4">

                <!-- LEFT COLUMN (FORM) -->
                <div class="col-lg-8">
                    <div class="  form-box">

                        <form id="serviceInquiryForm" action="{{ route('service-inquiry.submit') }}" method="POST">
                            @csrf
                            <!-- Full & Last Name -->
                            <div class="row mt-3">
                                <div class="col-md-6 mt-3">
                                    <label class="form-label labell text-white">Full Name</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control custom-input" placeholder="Enter your first name">
                                    <small class="text-danger d-block mt-1" id="error_first_name"></small>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label labell text-white">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control custom-input"
                                        placeholder="Enter your last name">
                                    <small class="text-danger d-block mt-1" id="error_last_name"></small>
                                </div>
                            </div>

                            <!-- Email & Phone -->
                            <div class="row mt-3">
                                <div class="col-md-6 mt-3">
                                    <label class="form-label labell text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control custom-input" placeholder="Enter your email">
                                    <small class="text-danger d-block mt-1" id="error_email"></small>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label class="form-label labell text-white">Phone Number</label>

                                    <div class="phone-wrapper">
                                        <select class="form-select country-code" name="country_code" id="country_code">
                                            <option value="+92">+92</option>
                                            <option value="+1">+1</option>
                                            <option value="+44">+44</option>
                                            <option value="+91">+91</option>
                                            <option value="+971">+971</option>
                                        </select>

                                        <input type="text" name="phone_number" id="phone_number"
                                            class="form-control phone-number" placeholder="Phone number">
                                    </div>
                                    <small class="text-danger d-block mt-1" id="error_phone_number"></small>
                                </div>

                            </div>

                            <!-- Website -->
                            <div class="mt-4">
                                <label class="form-label labell text-white">Do You Have Website?</label>
                                <div class="d-flex gap-4 text-white mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="has_website"
                                            id="website_yes" value="yes">
                                        <label class="form-check-label" for="website_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="has_website"
                                            id="website_no" value="no">
                                        <label class="form-check-label" for="website_no">No</label>
                                    </div>
                                </div>
                                <small class="text-danger d-block mt-1" id="error_has_website"></small>
                            </div>

                            <!-- Subject -->
                            <div class="mt-4">
                                <label class="form-label labell text-white">Select Subject / Service</label>

                                <div class="service-checkboxes">

                                    @if (isset($mainServices) && $mainServices->count() > 0)
                                        @foreach ($mainServices as $mainService)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="service_{{ $mainService->id }}" name="services[]"
                                                    value="{{ $mainService->id }}">
                                                <label class="form-check-label text-white"
                                                    for="service_{{ $mainService->id }}">
                                                    {{ $mainService->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <small class="text-danger d-block mt-1" id="error_services"></small>
                            </div>


                            <!-- Message -->
                            <div class="mt-5">
                                <label class="form-label text-white labell">Message</label>
                                <textarea name="message" id="message" class="form-control message-field" rows="3"
                                    placeholder="Enter your message (minimum 10 characters)"></textarea>
                                <small class="text-danger d-block mt-1" id="error_message"></small>
                            </div>

                            <div class="col-12 form-group mt-5">
                                <div class="g-recaptcha w-100" id="serviceCaptcha"
                                    data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                                </div>
                                <small class="text-danger d-block mt-1" id="error_captcha"></small>
                            </div>

                            <!-- Button -->
                            <button type="submit" class="submit-btn" id="submitBtn">
                                Submit <img src="{{ asset('frontend/images/kips-icon.png') }}" alt="">
                            </button>
                        </form>

                    </div>
                </div>

                <!-- RIGHT COLUMN (IMAGE) -->
                <div class="col-lg-4 text-end">
                    <img src="{{ asset('frontend/images/main-services/form-img.png') }}" alt="Contact"
                        class="img-fluid custom-img">
                </div>

            </div>
        </div>
    </section>

    <!-- ====================== offer section ======================= -->
    <x-services-offer />

    <!-- ========================== revnue section ============================== -->
    <x-testimonial-component />

    <!-- ===================== faqs section ======================= -->
    <x-faqs-component :faqs="$service->faqs" />


@endsection

@push('frontend-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('serviceInquiryForm');
            const submitBtn = document.getElementById('submitBtn');
            let serviceCaptchaWidget = null;

            // Render service inquiry captcha when modal is shown
            const projectModal = document.getElementById('projectModal');
            if (projectModal) {
                projectModal.addEventListener('shown.bs.modal', function() {
                    renderServiceCaptcha();
                });
            }

            // Render service inquiry captcha when page loads (if form is visible)
            function renderServiceCaptcha() {
                const captchaEl = document.getElementById('serviceCaptcha');
                if (captchaEl && window.grecaptcha) {
                    try {
                        // Check if already rendered
                        if (serviceCaptchaWidget === null) {
                            serviceCaptchaWidget = grecaptcha.render('serviceCaptcha', {
                                sitekey: captchaEl.getAttribute('data-sitekey'),
                            });
                        }
                    } catch (e) {
                        console.warn('Failed to render service captcha', e);
                    }
                }
            }

            // Render captcha on page load if form is visible
            if (document.getElementById('serviceCaptcha') && document.getElementById('serviceCaptcha').offsetParent !== null) {
                renderServiceCaptcha();
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Clear previous errors
                clearErrors();

                // Disable submit button
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';

                try {
                    // Get reCAPTCHA token from the service captcha widget
                    let recaptchaToken = '';
                    if (serviceCaptchaWidget !== null && window.grecaptcha) {
                        recaptchaToken = grecaptcha.getResponse(serviceCaptchaWidget);
                    }
                    
                    if (!recaptchaToken) {
                        showError('captcha', 'Please verify the reCAPTCHA');
                        if (serviceCaptchaWidget !== null && window.grecaptcha) {
                            grecaptcha.reset(serviceCaptchaWidget);
                        }
                        resetSubmitBtn();
                        return;
                    }

                    // Prepare form data
                    const formData = new FormData(form);
                    formData.append('g-recaptcha-response', recaptchaToken);

                    // Submit form via AJAX
                    const response = await fetch(form.action, {
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
                        } else {
                            showCustomToast('success', data.message);
                        }

                        // Reset form
                        form.reset();
                        if (serviceCaptchaWidget !== null && window.grecaptcha) {
                            grecaptcha.reset(serviceCaptchaWidget);
                        }

                        // Close modal
                        const modal = bootstrap.Modal.getInstance(projectModal);
                        if (modal) {
                            modal.hide();
                        }

                        // Scroll to top
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        // Show errors
                        if (data.errors) {
                            Object.keys(data.errors).forEach(field => {
                                const errors = data.errors[field];
                                if (Array.isArray(errors)) {
                                    showError(field, errors[0]);
                                } else {
                                    showError(field, errors);
                                }
                            });
                        }

                        // Show error toast using Toastr
                        if (typeof toastr !== 'undefined') {
                            toastr.error(data.message || 'Please fix the errors below');
                        } else {
                            showCustomToast('error', data.message || 'Please fix the errors below');
                        }

                        // Reset captcha on error
                        if (serviceCaptchaWidget !== null && window.grecaptcha) {
                            grecaptcha.reset(serviceCaptchaWidget);
                        }
                    }
                } catch (error) {
                    console.error('Form submission error:', error);

                    if (typeof toastr !== 'undefined') {
                        toastr.error('An unexpected error occurred. Please try again.');
                    } else {
                        showCustomToast('error', 'An unexpected error occurred. Please try again.');
                    }

                    if (serviceCaptchaWidget !== null && window.grecaptcha) {
                        grecaptcha.reset(serviceCaptchaWidget);
                    }
                } finally {
                    resetSubmitBtn();
                }
            });

            /**
             * Clear all error messages
             */
            function clearErrors() {
                document.querySelectorAll('[id^="error_"]').forEach(el => {
                    el.textContent = '';
                    el.style.display = 'none';
                });
            }

            /**
             * Show error message for a field
             */
            function showError(fieldName, message) {
                const errorEl = document.getElementById(`error_${fieldName}`);
                if (errorEl) {
                    errorEl.textContent = message;
                    errorEl.style.display = 'block';
                }
            }

            /**
             * Reset submit button
             */
            function resetSubmitBtn() {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Submit <img src="{{ asset('frontend/images/kips-icon.png') }}" alt="">';
            }

            /**
             * Show custom toast notification (fallback if Toastr not available)
             */
            function showCustomToast(type, message) {
                const toast = document.createElement('div');
                toast.className =
                    `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
                toast.setAttribute('role', 'alert');
                toast.style.position = 'fixed';
                toast.style.top = '20px';
                toast.style.right = '20px';
                toast.style.zIndex = '9999';
                toast.style.minWidth = '300px';
                toast.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;

                document.body.appendChild(toast);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }
        });
    </script>
@endpush
