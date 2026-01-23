@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

@push('frontend-styles')
    <style></style>
@endpush

@section('frontend-content')
    <!-- ========== hero section ================= -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Content -->
                <div class="col-lg-6">
                    <h1 class="hero-title">Empowering businesses with web design that outranks competitors</h1>



                    <p class="hero-desc">
                        We help businesses grow with data-driven digital marketing strategies,
                        tailored to your goals and audience.
                    </p>

                    <div class="button-wraper">
                        <a href="#" class="hero-btn">Start Your Project</a>
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

    <!--==================== end hero section ====================== -->


    <!-- =================== brand section ============================== -->
    <section class="brand-section">
        <div class="container text-center">

            <!-- Heading -->
            <h2 class="brand-title">
                We treat your BRAND like it’s ours. Why? Be
            </h2>

            <!-- Description -->
            <p class="brand-desc">
                We partner with brands to drive measurable growth through strategic thinking
                that aligns business goals with real market opportunities.
                Our team focuses on creative execution that captures attention
                and turns ideas into meaningful customer experiences.
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
                Why Digital Marketing Delivers High Performance Results
            </h2>

            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">01</span>
                <h3 class="performance-subtitle">
                    Proven Methods Strengthening Online Visibility
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                We use tested digital strategies and proven frameworks that help brands
                increase visibility, attract the right audience, and build a strong online
                presence that drives consistent and measurable results.
            </p>

            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">02</span>
                <h3 class="performance-subtitle">
                    Proven Methods Strengthening Online Visibility
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                We use tested digital strategies and proven frameworks that help brands
                increase visibility, attract the right audience, and build a strong online
                presence that drives consistent and measurable results.
            </p>
            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">03</span>
                <h3 class="performance-subtitle">
                    Proven Methods Strengthening Online Visibility
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                We use tested digital strategies and proven frameworks that help brands
                increase visibility, attract the right audience, and build a strong online
                presence that drives consistent and measurable results.
            </p>
            <!-- Item -->
            <div class="performance-item">
                <span class="performance-number">04</span>
                <h3 class="performance-subtitle">
                    Proven Methods Strengthening Online Visibility
                </h3>
            </div>

            <!-- Description -->
            <p class="performance-desc">
                We use tested digital strategies and proven frameworks that help brands
                increase visibility, attract the right audience, and build a strong online
                presence that drives consistent and measurable results.
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
                        Marketing solutions for all industry
                    </h2>

                    <div class="about-feature">
                        <img src="/images/strategy-icon.png" alt="Icon" class="feature-icon">
                        <div>
                            <h4>Strategic marketing</h4>
                            <p>
                                We create data-driven marketing strategies tailored to your industry,
                                helping businesses grow visibility, engagement, and conversions
                                across all digital platforms.
                            </p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <img src="/images/strategy-icon.png" alt="Icon" class="feature-icon">
                        <div>
                            <h4>Strategic marketing</h4>
                            <p>
                                We create data-driven marketing strategies tailored to your industry,
                                helping businesses grow visibility, engagement, and conversions
                                across all digital platforms.
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
                        Turn search into a Revenue Driver with SEO marketing services
                    </h2>

                    <p class="seo-desc">
                        Our SEO marketing services are designed to help businesses
                        increase visibility, attract high-quality traffic, and convert
                        visitors into customers. By leveraging data-driven strategies,
                        keyword optimization, and technical SEO best practices, we
                        ensure sustainable growth and long-term success across search
                        engines.
                    </p>

                    <ul class="seo-list">
                        <li>
                            Drive steady organic traffic that supports long-term growth.

                        </li>
                        <li>
                            Drive steady organic traffic that supports long-term growth.

                        </li>
                        <li>
                            Drive steady organic traffic that supports long-term growth.

                        </li>
                        <li>
                            Drive steady organic traffic that supports long-term growth.

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

@push('frontend-scripts')
    <script></script>
@endpush
