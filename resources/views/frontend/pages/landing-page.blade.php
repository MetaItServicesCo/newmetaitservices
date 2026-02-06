@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

@push('frontend-styles')
    <style>
        .founder-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .calendar {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 12px;
            width: 100%;
        }

        .calendar-header {
            display: flex;
            justify-content: center;
            gap: 40px;
            align-items: center;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .calendar-header button {
            background: rgba(4, 67, 67, 0.09);
            border: none;
            font-size: 20px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #949393;
        }

        .calendar-header button:hover {
            background: #F38B5C;
            color: #fff;

        }

        .calendar-week {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #044343;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 20px;
        }

        .calendar-day {
            padding: 10px 0;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 400;
            font-family: 'Lexend Deca', sans-serif;
        }

        .calendar-day.active {
            background: #F38B5C;
            border-radius: 50%;
            width: 40px;
            height: 40px;

            color: #fff;
        }

        /* 📱 Mobile */
        @media (max-width: 576px) {
            .calendar {
                padding: 10px;
            }

            .calendar-header span {
                font-size: 16px;
            }

            .calendar-day {
                padding: 8px 0;
                font-size: 13px;
            }

            .calendar-week span {
                font-size: 12px;
            }
        }

        .date-btn {
            background: #BDC6C6;
            border: none;
            padding: 10px;
            width: 100%;
            max-width: 140px;
            height: 43.49px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .submitt-btnn {
            background: #F38B5C;
            border: none;
            padding: 12px;
            color: #fff;
            border-radius: 12px;
            width: 82px;
            height: 43.49px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .day-btn {
            background: transparent;
            border: 1px solid #044343;
            color: #044343;
            padding: 6px 10px;
            border-radius: 6px;
            width: 189px;
            height: 43.49px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.4s ease-in-out;
        }

        .day-btn:hover {
            background: #044343;
            color: #fff;

        }

        .day-btn.active {
            background: rgba(243, 139, 92, 0.52);
            color: #fff;
            border: none;

        }

        .nav-logo {
            max-width: 120px;
        }

        .head-msg {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 7.65px;
            font-weight: 400;
            color: #044343;
            line-height: 9.2px;
        }

        .dept-title {
            font-family: 'Lexend Deca', sans-serif;
            font-weight: 600;
            font-size: 13px;
            line-height: 21.4px;
            color: #044343;
        }

        .bullet-text {
            font-family: 'Lexend Deca', sans-serif;
            color: #F38B5C;
            font-weight: 500;
            font-size: 9.18px;
            margin-top: 12px;
            position: relative;
            padding-left: 14px;
        }

        .bullet-text::before {
            content: "•";
            position: absolute;
            left: 0;
            top: 0;
            color: #F38B5C;
            font-size: 14px;
            line-height: 1;
        }

        .desc-text {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 11px;
            font-weight: 400;
            color: #044343;
            margin-top: -16px;
            line-height: 1.6;
        }

        .modal-header button:hover {
            color: #F38B5C !important;

        }

        /* ============================ next ============================== */

        .modal-title-main {
            font-family: Inter;
            font-size: 36px;
            font-weight: 700;
            line-height: 41px;
            color: #ffffff;
            max-width: 800px;
        }

        /* LEFT CARD */
        .info-card {
            width: 100%;
            max-width: 734px;
            height: 213px;
            background: #FCE2D6;
            border-radius: 21px;
            padding: 30px;
            color: #044343;
            font-family: Inter;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            /* align-items: center; */
        }

        /* FORM CARD */
        .form-card {
            background: #ffffff;
            border-radius: 21px;
            padding: 25px;
            color: #000;
        }

        .form-title {
            font-family: Inter;
            font-weight: 600;
        }

        .form-subtitle {
            font-size: 14px;
            color: #666;
        }

        .edit-link {
            color: #F38B5C;
            margin-left: 10px;
            text-decoration: none;
        }

        /* INPUTS */
        .custom-input {
            width: 100%;
            height: 40px;
            border-radius: 12px;
            border: 1px solid #F96037;
            background: #EFEFEF;
            padding: 0 15px;
            font-family: Inter;
        }

        .custom-inputt {
            height: 70px;
            width: 100%;
            border-radius: 12px;
            border: 1px solid #F96037;
            background: #EFEFEF;
            font-family: Inter;
            padding-left: 12px;
        }

        /* BUTTONS */
        .back-btn {
            width: 119px;
            height: 40px;
            background: #EFEFEF;
            border: 1px solid #F96037;
            border-radius: 12px;
        }

        .confirm-btn {
            width: 119px;
            height: 40px;
            background: #F38B5C;
            border: none;
            color: #fff;
            border-radius: 12px;
        }
    </style>
@endpush

@section('frontend-content')
    <!-- ========== hero section ================= -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Content -->
                <div class="col-lg-6">
                    <h1 class="hero-title">Strategic Marketing Company Formulated To Empower Businesses</h1>



                    <p class="hero-desc">
                        Creating superior conversions and outlasting worthy competitors means expanding beyond the ordinary.
                        Meta IT pushes through the digital noise and propels itself towards more ambitious results. Web
                        design isn’t just a captivating visual experience. It’s elevated digital marketing packages and
                        stronger performance with real incremental growth. Let’s craft a brand that dominates together.
                    </p>

                    <div class="button-wraper">
                        <a href="javascript:void(0)" class="hero-btn" data-bs-toggle="modal" data-bs-target="#projectModal">
                            Start Your Project
                        </a>
                        <div class="hero-rating">
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <span class="rating-text">4.3</span>
                            </div>

                            <p class="rating-label">Leave Us a Review On <span>Google</span> </p>
                        </div>

                    </div>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6 text-end">
                    <img src="{{ asset('frontend/images/home-hero.png') }}" alt="Hero Image" class="hero-img">
                </div>

            </div>
        </div>
    </section>




    <!-- =================== brand section ============================== -->
    <section class="brand-section">
        <div class="container text-center">

            <!-- Heading -->
            <h2 class="brand-title">
                Your brand’s vision is our mission. We curate and execute designs backed by purposeful strategies resulting
                in measurable conversion outcomes!
            </h2>

            <!-- Description -->
            <p class="brand-desc">
                Meta IT gilds every contract it signs, making us responsible for your growth. Our ownership mindset makes
                way for a personable touch. Start authentically representing your business and forging genuine connections
                through high-potential digital marketing funnels.
            </p>

            <!-- Divider -->
            <hr class="brand-divider">

            <!-- Stats -->
            <div class="row justify-content-center brand-stats">

                <div class="col-md-3 col-6 stat-box">
                    <h3 class="counter" data-target="353">0</h3>
                    <p>Revenue Increasing</p>
                </div>

                <div class="col-md-3 col-6 stat-box">
                    <h3 class="counter" data-target="456">0</h3>
                    <p>Company Growth</p>
                </div>

                <div class="col-md-3 col-6 stat-box">
                    <h3 class="counter" data-target="555">0</h3>
                    <p>Client Enhancement</p>
                </div>

                <div class="col-md-3 col-6 stat-box">
                    <h3 class="counter" data-target="253">0</h3>
                    <p>Convert Traffic</p>
                </div>

            </div>
        </div>
    </section>


    <!-- ================== performance-section ==================== -->
    <section class="performance-section">
        <div class="container">

            <!-- Main Heading -->
            <h2 class="performance-title">
                Why Meta IT’s Digital Marketing Services Deliver High Performance Results
            </h2>

            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">01</span>
                <h3 class="performance-subtitle">
                    Brands Built On Data-Driven Decisions
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                As masters of the digital landscape, Meta IT hones key metrics to make smarter decisions towards fluctuating
                consumer patterns. What does this mean for the businesses we work with? We’re always on the mark and reared
                towards marketing efficiency.
            </p>

            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">02</span>
                <h3 class="performance-subtitle">
                    Targetable Audience Equals Higher Engagement Rates
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                Consumers want to engage with brands that understand what they crave. Our performance based marketing
                strategy enables businesses to incorporate user demographics and decisive behavioral markers to deliver more
                relevant promotions.
            </p>
            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">03</span>
                <h3 class="performance-subtitle">
                    Capacity For Real-Time Optimization
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                Executing productive campaigns is made possible with our ability to capitalize on the momentum of the
                opportunity happening right now. The market is constantly evolving on top of consumer needs. Aligning with
                Meta IT allows you to keep up.

            </p>
            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">04</span>
                <h3 class="performance-subtitle">
                    Global Reach Made Accessible
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                Confidently scale your company without limits. Meta IT erases the complexity of growth and instead, empowers
                brands in creating models that break down barriers and borders. Craft digital design that allows for better
                worldwide connection and integrates offshore software development.
            </p>

        </div>
    </section>


    <!-- ======================== kpi ection ============================= -->
    <x-kpi-section-component />


    <!-- ============= agency section =============== -->

    <section class="about-agency-section">
        <div class="container">
            <div class="row ">

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontend/images/agency-img.png') }}" alt="About Agency" class="about-img">
                </div>

                <div class="col-lg-6">
                    <span class="about-tag">About Marketing Agency</span>

                    <h2 class="about-title">
                        Inclusive Performance-based Marketing For Diverse Industries
                    </h2>

                    <div class="about-feature">
                        <img src="/images/strategy-icon.png" alt="Icon" class="feature-icon">
                        <div>
                            <h4>Retail/E-Commerce</h4>
                            <p>
                                Focusing on conversion and incremental growth by centering steady traffic and customer
                                loyalty.
                            </p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <img src="/images/strategy-icon.png" alt="Icon" class="feature-icon">
                        <div>
                            <h4>IT & Tech Firm Marketing</h4>
                            <p>
                                Market leadership solely made possible with innovating performance-based solutions.
                            </p>
                        </div>
                    </div>
                    <div class="about-buttons">
                        <a href="#" class="btn-learn">Learn more <img
                                src="{{ asset('frontend/images/kips-icon.png') }}" alt="">
                        </a>
                        <a href="#" class="btn-outline">Our services <img
                                src="{{ asset('frontend/images/agency-icon.png') }}" alt=""> </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ====================== offer section ======================= -->
    <x-services-offer />


    <!-- =================== brand next level section ========================= -->

    <x-brand-nextlevel />


    <!-- ================== port folio section ======================= -->
    <x-portfolio-component />

    <!-- ========================== revnue section ============================== -->
    <x-testimonial-component />

    <!-- ===================== faqs section ======================= -->

    <x-faqs-component :pageName="'landing'" />

    <!-- ======================== seo section ================================ -->


    <section class="seo-section">
        <div class="container">
            <div class="row align-items-start">

                <!-- LEFT COLUMN -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h2 class="seo-title">
                        Transform the Search Bar Into a Revenue Driver with SEO Marketing Services
                    </h2>

                    <p class="seo-desc">
                        Brands that are impossible to ignore are brands that show up where it matters, and tossing in a few
                        keywords won’t cut it. Rank your website productively. Meta IT helps our clients drive the right
                        kind of visitors to their digital home by securing the momentum for real engagement. Our SEO
                        marketing solutions are a powerful way to garner accelerated traffic with content that is valuable
                        and influential.
                    </p>

                    <ul class="seo-list">
                        <li>
                            SEO provides your company with qualified leads by connecting them with direct access to
                            consumers within your niche.
                        </li>
                        <li>
                            A properly optimized website will perform well in search engines and allow for a consistent pull
                            towards your product.
                        </li>
                        <li>
                            Website optimization is the key to easier navigation and enhanced user experiences so that your
                            visitors stay engaged longer.
                        </li>
                        <li>
                            A higher ranking business is ultimately one that consumers can trust, stabilizing your authority
                            within the marketplace.
                        </li>
                        <li>
                            SEO marketing solutions with Meta IT compound over time for more sustainable revenue growth.
                        </li>
                        <li>
                            Strong SEO equals more appeal and visibility, so you’re always outperforming your competitors.
                        </li>

                    </ul>
                    <p class="seo-desc">
                        We focus on sustainable SEO strategies that build authority,
                        improve rankings, and consistently deliver qualified traffic
                        over time.
                    </p>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-5 d-flex justify-content-lg-end">
                    <div class="toc-card">
                        <h4 class="toc-title">Table of Contents</h4>

                        <ul class="toc-list">
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                            <li>Zemalt</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

{{-- frontend scripts moved to public/frontend/js/custom.js for global usage --}}
