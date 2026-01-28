@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $data->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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

        /* ==================================== industry ====================================== */

        .industries-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 40px 0;
            font-family: Inter;

            /* max-width: 90%; */
            margin-right: 0px;
            margin-top: 18px;
        }



        /* Top Text */
        .industry-tag {
            font-size: 28px;
            font-weight: 500;
            line-height: 160%;
            color: #FF5B2E;
            display: block;
            margin-bottom: 20px;
        }

        .industry-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 59px;
            color: #000000;
            margin-bottom: 20px;
        }

        .industry-heading span {
            border-bottom: 6px solid #F96037;
        }

        .industry-desc {
            font-size: 22px;
            line-height: 160%;
            max-width: 900px;
            margin: 0 auto 60px;
        }

        /* Dark Box */
        .industry-box {
            background: #404959;
            padding: 70px 60px;
            margin-top: 20px;
            height: 487px;
            padding-bottom: 20px;
            font-family: Inter;
        }

        .industry-card {
            background: #ffffff;
            width: 448px;
            height: 401px;
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;

        }

        .industry-card img {
            position: absolute;
            top: 18%;
            left: 50%;

            transform: translateX(-50%);
            /* 🔥 CENTER FIX */

            max-width: 113px;
            max-height: 99px;
            object-fit: contain;
            display: block;
        }



        .industry-card h4 {
            font-size: 32px;
            font-weight: 700;
            line-height: 25;
            letter-spacing: 0;
            color: #F96037;
            margin-top: 12px;
        }

        /* Right Content */
        .industry-long-desc {
            color: #ffffff;
            font-size: 20px;
            line-height: 160%;
            margin-bottom: 35px;
            max-width: 1079px;
        }

        /* Button */
        .industry-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 353px;
            height: 67px;
            background: #FF5B2E;
            border-radius: 12px;

            font-size: 28px;
            font-weight: 700;
            line-height: 25px;
            color: #ffffff;
            text-decoration: none;

            transition: background 0.5s ease-in-out;
            /* 🔥 smooth hover */
        }

        /* 🔥 HOVER EFFECT */
        .industry-btn:hover {
            background: linear-gradient(90deg, #404959, #FF5B2E);
            transform: translateY(-2px);

        }


        /* Responsive */
        @media (max-width: 992px) {
            .industry-heading {
                font-size: 38px;
                line-height: 46px;
            }

            .industry-card {
                width: 100%;
                /* height: auto; */
                padding: 40px 20px;
                margin-bottom: 40px;
            }

            .industry-btn {
                width: 100%;
            }

            .industry-box {
                padding: 50px 20px;
                height: auto;
            }
        }

        .explore-btn {
            width: 435px;
            height: 67px;
            background: #404959;
            color: #ffffff;

            font-size: 28px;
            font-weight: 700;
            line-height: 25px;
            font-family: Inter;

            border: none;
            border-radius: 12px;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 40px auto;

            /* 🔥 IMPORTANT */
            transform: scale(1);
            transition: background 0.5s ease-in-out,
        }

        .explore-btn:hover {
            background: linear-gradient(90deg, #FF5B2E 40%, #404959 60%);
            transform: scale(1.01);
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
                    <h1 class="dm-title">Industries</h1>

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
                    <img src="{{ asset('frontend/images/industry/industry.png') }}" alt="Digital Marketing"
                        class="mc-right-img">
                </div>

            </div>
        </div>
    </section>


    {{-- -------------------- industry ======================= --}}


    <section class="industries-sectio ">
        <div class="container-fluid text-center industries-section">
            <span class="industry-tag">Industries We Serve</span>

            <h2 class="industry-heading">
                Your <span>Dallas</span> Digital Marketing Agency
            </h2>

            <p class="industry-desc">
                We help businesses across multiple industries grow with data-driven digital strategies.
            </p>
        </div>

        <!-- Inner Container -->
        @foreach ($industries as $industry)
            <div class="container-fluid industry-box">
                <div class="row align-items-center">

                    <!-- Left Column -->
                    <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                        <div class="industry-card">
                            <img src="{{ asset('storage/' . $industry->image) }}" alt="{{ $industry->image_alt ?? $industry->name }}">
                            <h4>{{ $industry->name ?? ''}}</h4>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-6 col-md-6">
                        <p class="industry-long-desc">
                            {{ $industry->description ?? '' }}
                        </p>

                        <a href="{{ route('industry.detail', $industry->slug) }}" class="industry-btn">View Full Detail</a>
                    </div>

                </div>
            </div>
        @endforeach

        <button class="explore-btn">
            Explore More Industries
        </button>

    </section>

@endsection


@push('frontend-scripts')
    <script></script>
@endpush
