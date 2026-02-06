@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

@push('frontend-styles')
    <style>
        /*================================== dm-services section ==================================  */
        .dm-services-section {
            padding: 40px 0;
            min-height: 616px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }



        /* LEFT */
        .dm-title {
            font-size: 50px;
            font-weight: 700;
            color: #ffffff;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 15px;
            max-width: 450px;
            margin-top: 30px;
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
        .dm-right-img {
            width: 777px;
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

        /* ====================== meta intro section css ====================================== */


        .meta-intro-section {
            padding: 50px 0;
            font-family: Inter;
        }

        /* Main Heading */
        .meta-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;
            max-width: 1559px;
            margin-bottom: 25px;
        }

        /* Description */
        .meta-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 1559px;
            margin-bottom: 50px;
        }

        /* Card */
        .meta-card {
            background: #F7F7F7;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        /* Card Image */
        .meta-card-img {
            width: 100%;
            max-width: 424px;
            height: auto;
            border-radius: 10px;
        }

        /* Card Content */
        .meta-card-title {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 15px;
        }

        .meta-card-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        /* Button */
        .meta-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #F7F7F7;
            color: #F96037;
            border: 4px solid #F96037;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s ease;
            width: 200px;
            height: 50px;
            font-size: 20px;
            font-weight: 600;
            line-height: 25px;
            letter-spacing: 0;
        }

        .meta-btn:hover {
            background: #e24f2c;
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .meta-heading {
                font-size: 32px;
                line-height: 44px;
            }
        }

        @media (max-width: 767px) {
            .meta-heading {
                font-size: 23px;
                line-height: 35px;
                text-align: center;
            }

            .meta-desc {
                font-size: 16px;
                text-align: center;
            }

            .meta-card-title {
                font-size: 28px;
            }

            .meta-card-desc {
                font-size: 16px;

            }
        }

        /* ===================== tech-marketing-section css ============================= */

        .tech-marketing-section {
            padding: 50px 0;
            font-family: Inter;
        }

        /* Heading */
        .tech-heading {
            font-size: 40px;
            font-weight: 700;
            line-height: 55px;
            letter-spacing: 0;
            margin-bottom: 20px;
        }

        .tech-heading span {
            color: #F96037;
        }

        /* Description */
        .tech-desc {
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 40px;

        }

        /* Stats */
        .tech-stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat-item {
            max-width: 220px;
        }

        .stat-item h3 {
            font-size: 36px;
            font-weight: 700;
            color: #F96037;
            margin-bottom: 5px;
        }

        .stat-item h5 {
            font-size: 25px;
            font-weight: 700;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        .stat-item p {
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        /* Image */
        .tech-image {
            width: 100%;
            max-width: 600px;
            height: 480px;
            transition: all 0.4s ease-in-out;
        }

        .tech-image:hover {
            transform: scale(1.03)
        }

        /* Responsive */
        @media (max-width: 991px) {
            .tech-heading {
                font-size: 32px;
                line-height: 44px;
            }

            .tech-stats {
                gap: 20px;
            }

            .stat-item {
                max-width: 100%;
            }
        }


        /* ================================= who-we-serve-section css ===================================== */

        .who-we-serve-section {
            padding: 50px 0;
            background: rgba(244, 139, 92, 0.25);
            box-shadow: 0 0px 40px #FF5B2E;
            font-family: Inter;
        }

        /* Top text */
        .serve-tag {
            color: #FF5B2E;
            font-weight: 300;
            font-size: 28px;
            line-height: 160%;
            letter-spacing: 0;
            display: block;
            margin-bottom: 10px;
        }

        .serve-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 60px;
            color: #000000;
            max-width: 838px;
            margin: 0 auto;
        }

        /* Outer Box */
        .outer-box {
            width: 400px;
            height: 425px;
            background: #FCE2D6;
            border: 5px solid #ffffff;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            transition: all 0.4s ease-in-out;
        }

        .outer-box:hover {
            transform: scale(1.02) translateY(-10px);
        }

        /* Inner Card */
        .inner-card {
            width: 370px;
            height: 400px;
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
        .card-title {
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
        .card-desc {
            font-size: 20px;
            line-height: 162%;
            font-weight: 400;
            letter-spacing: 0;
            color: #ffffff;
            margin-bottom: auto;
        }

        /* Button */
        .learn-bttn {
            width: 200px;
            height: 50px;
            background: linear-gradient(90deg, #FF6036, #404959);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: 600;
            border-radius: 12px;
            margin-top: 30px;
            font-size: 20px;
            line-height: 25;
            font-weight: 600;
            letter-spacing: 0;
            align-self: flex-start;
            transition: all 0.3s ease-in;

        }

        .learn-bttn:hover {
            transform: scale(1.04)
        }

        /* Responsive */
        @media (max-width: 991px) {

            .outer-box {
                width: 350px;

            }

            .inner-card {
                width: 320px;

            }

            .serve-heading {
                font-size: 32px;
                line-height: 44px;
            }

            .learn-btn {
                width: 100%;
            }

            .card-title {
                font-size: 20px;
                ;
            }

            .card-desc {
                font-size: 16px;

            }

            .card-icon {
                width: 70px;
                height: 70px;
            }
        }

        /* ============================= conversion-section =================================== */

        .conversion-section {
            background: #F7F7F7;
            padding: 50px 0;
            margin-top: 70px;
            font-family: Inter;
        }

        .conversion-content {
            max-width: 1472px;
        }

        /* Heading */
        .conversion-title {
            font-size: 55px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            margin-bottom: 25px;
            color: #000000;
        }

        /* Description */
        .conversion-desc {
            font-size: 25px;
            font-weight: 400;

            letter-spacing: 0;
            line-height: 160%;
            color: #000000;
            max-width: 1472px;
            margin-bottom: 40px;
        }

        /* Button */
        .contact-btn {
            width: 241px;
            height: 59px;
            background: #FF6036;
            border-radius: 12px;
            font-size: 25px;
            line-height: 25px;
            font-weight: 600;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .conversion-title {
                font-size: 36px;
                line-height: 46px;
            }

            .conversion-desc {
                font-size: 15px;
            }

            .contact-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endpush

@section('frontend-content')


    {{-- ================================== dm-services section ================================== --}}

    <section class="dm-services-section"
        style="background-image: url('{{ asset('frontend/images/services/service-hero-img.png') }}');">

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="dm-title">Our Digital Marketing Services</h1>

                    <h4 class="dm-subtitle">
                        Customized Marketing Solutions That Deliver Results, Every Time
                    </h4>

                    <p class="dm-desc">
                        We create data-driven digital marketing strategies tailored to
                        your business goals. From SEO and paid campaigns to social media
                        and content marketing
                    </p>

                    <a href="javascript:void(0)" class="dm-btn" data-bs-toggle="modal" data-bs-target="#projectModal">Start Your Project</a>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 text-center d-flex align-items-center ">
                    <img src="{{ asset('frontend/images/services/dm-img.png') }}" alt="Digital Marketing"
                        class="dm-right-img">
                </div>

            </div>
        </div>
    </section>

    <x-brand />


    {{-- ===================== Major Services Section ======================== --}}
    <x-major-services-component />

    {{-- ================ tech-marketing-section ========================== --}}

    <section class="tech-marketing-section">
        <div class="container">
            <div class="row ">
                <!-- Left Column -->
                <div class="col-lg-7">
                    <h2 class="tech-heading">
                        Advance technology to support digital <span> marketing
                            decision-marketing</span>
                    </h2>

                    <p class="tech-desc">
                        We leverage advanced technologies and data-driven strategies to help
                        businesses make smarter digital marketing decisions. Our solutions
                        improve efficiency, reduce costs, and maximize overall marketing
                        performance.
                    </p>

                    <!-- Stats -->
                    <div class="tech-stats">
                        <div class="stat-item">
                            <h3>20%</h3>
                            <h5>Efficiency Boost</h5>
                            <p>
                                Improved campaign performance through automation and smart
                                analytics.
                            </p>
                        </div>

                        <div class="stat-item">
                            <h3>$500k</h3>
                            <h5>Cost Saving</h5>
                            <p>
                                Reduced marketing spend while increasing return on investment.
                            </p>
                        </div>

                        <div class="stat-item">
                            <h3>1+ Million</h3>
                            <h5>Marketing Reach</h5>
                            <p>
                                Expanded audience engagement and improved marketing efficiency.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('frontend/images/services/meta-img.png') }}" alt="Digital Marketing Technology"
                        class="tech-image">
                </div>
            </div>
        </div>
    </section>

    {{-- ================================ who-we-serve-section ============================== --}}


    <section class="who-we-serve-section">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5">
                <span class="serve-tag">Who We Serve</span>
                <h2 class="serve-heading">
                    B2B Digital Marketing Solutions Tailored for You
                </h2>
            </div>

            <!-- Cards -->
            @if (!empty($subServices) && $subServices->count())
                <div class="row justify-content-center">
                    <!-- Card 1 -->
                    @foreach ($subServices as $subService)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="outer-box">
                                <div class="inner-card">
                                    <img src="{{ $subService->icon ? asset('storage/' . $subService->icon) : asset('frontend/images/offer-icon.png') }}"
                                        alt="Web Design" class="card-icon">


                                    <h3 class="card-title">
                                        {{ $subService->title ?? '' }}
                                    </h3>

                                    <p class="card-desc">
                                        {{ \Illuminate\Support\Str::limit($subService->short_description ?? '', 150) }}
                                    </p>

                                    <a href="#" class="learn-bttn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ============================== conversion-section ========================= --}}
    <section class="conversion-section">
        <div class="container">
            <div class="conversion-content">
                <h2 class="conversion-title">
                    Improve Conversion Analysis Services
                </h2>

                <p class="conversion-desc">
                    Our conversion analysis services help businesses identify user behavior,
                    optimize digital journeys, and increase overall conversion rates.
                    By leveraging data-driven insights, we uncover performance gaps,
                    enhance engagement, and transform visitors into loyal customers
                    through strategic optimization and continuous improvement.
                    optimize digital journeys, and increase overall conversion rates.
                    By leveraging data-driven insights, we uncover performance gaps,
                    enhance engagement, and transform visitors into loyal customers
                    through strategic optimization and continuous improvement.
                </p>
                <p class="conversion-desc">
                    Our conversion analysis services help businesses identify user behavior,
                    optimize digital journeys, and increase overall conversion rates.
                    By leveraging data-driven insights, we uncover performance gaps,
                    enhance engagement, and transform visitors into loyal customers
                    through strategic optimization and continuous improvement.
                </p>

                <a href="#" class="contact-btn">Contact Us</a>
            </div>
        </div>
    </section>



    <!-- =================== brand next level section ========================= -->

    <x-brand-nextlevel />


    <!-- ===================== faqs section ======================= -->

    <x-faqs-component :pageName="'services'" />


@endsection

@push('frontend-scripts')
    <script></script>
@endpush
