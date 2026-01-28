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
                    <h1 class="hero-title">Empowering businesses with web design that outranks competitors</h1>



                    <p class="hero-desc">
                        We help businesses grow with data-driven digital marketing strategies,
                        tailored to your goals and audience.
                    </p>

                    <div class="button-wraper">
                        <a href="#" class="hero-btn" data-bs-toggle="modal" data-bs-target="#projectModal">
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


    <div class="modal fade" id="projectModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row g-4 justify-content-center">

                            <!-- COLUMN 1 -->
                            <div class="col-lg-3 col-md-4 text-cente ps-4">
                                <img src="{{ asset('frontend/images/navbar-logo.png') }}" alt="Logo" class="nav-logo">

                                <div class="mt-3">
                                    <p class="mb-0 head-msg">Head of IT Message</p>
                                    <h6 class="dept-title">Meta’s IT Department</h6>
                                </div>

                                <p class="bullet-text">Founder & Head of IT</p>

                                <p class="desc-text">
                                    Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                    nulla. Nullam vitae sit tempus diam. Libero
                                </p>
                                <p class="bullet-text">Founder & Head of IT</p>

                                <p class="desc-text">
                                    Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                    nulla. Nullam vitae sit tempus diam. Libero
                                </p>
                            </div>


                            <!-- COLUMN 2 (CALENDAR) -->
                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="calendar">

                                    <!-- HEADER -->
                                    <div class="calendar-header">
                                        <button id="prevYear"><i class="fa-solid fa-angle-left"></i></button>
                                        <h5 id="calendarYear">2025</h5>
                                        <button id="nextYear"><i class="fa-solid fa-angle-right"></i></button>
                                    </div>

                                    <!-- WEEK DAYS -->
                                    <div class="calendar-week">
                                        <span>Mon</span>
                                        <span>Tue</span>
                                        <span>Wed</span>
                                        <span>Thu</span>
                                        <span>Fri</span>
                                        <span>Sat</span>
                                        <span>Sun</span>
                                    </div>

                                    <!-- DAYS -->
                                    <div class="calendar-grid" id="calendarDays"></div>

                                </div>
                            </div>


                            <!-- COLUMN 3 -->
                            <div class="col-lg-3 col-md-6">
                                <h6 class="fw-bold text-center">Montag, 18. September</h6>

                                <div class="d-flex gap-2 justify-content-center">
                                    <button class="date-btn ">18-sep-2025</button>

                                    <button class="submitt-btnn" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        Submit
                                    </button>
                                </div>

                                <div class="d-flex flex-column flex-wrap gap-2 mt-4">
                                    <button class="day-btn ">Monday</button>
                                    <button class="day-btn active">Tuesday</button>
                                    <button class="day-btn">Wednesday</button>
                                    <button class="day-btn">Thursday</button>
                                    <button class="day-btn">Friday</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--==================== end hero section ====================== -->

    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-black border-0">

                <!-- CLOSE -->
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="container text-white">

                        <!-- HEADING -->
                        <h2 class="modal-title-main">
                            Elevate Your Digital Presence Work Atomic
                        </h2>

                        <!-- ROW -->
                        <div class="row g-4 mt-4">

                            <!-- LEFT COLUMN -->
                            <div class="col-lg-6 col-md-12 d-flex justify-content-center ">
                                <div class="info-card">
                                    Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet
                                    suscipit nulla. Nullam vitae sit tempus diam. Libero diam auctor
                                    tristique hendrerit Libero diam t cipit nulla. Nullam vitae sit
                                    tempus diam. Libero diam auctor tristique hendrerit Libero diam t
                                </div>
                            </div>

                            <!-- RIGHT COLUMN -->
                            <div class="col-lg-6 col-md-12">
                                <div class="form-card">

                                    <h5 class="form-title">Your Information</h5>
                                    <p class="form-subtitle">
                                        Thursday, December 18, 2025 &nbsp; 1:20 am
                                        <a href="#" class="edit-link">Edit</a>
                                    </p>

                                    <form class="mt-3">
                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <input type="text" placeholder="First Name" class="custom-input">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Last Name" class="custom-input">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="email" placeholder="Email" class="custom-input">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Phone Number" class="custom-input">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" placeholder="Company Name" class="custom-input">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="url" placeholder="Website URL" class="custom-input">
                                            </div>

                                            <div class="col-12">
                                                <textarea placeholder="Write A Message" rows="4" class="custom-inputt"></textarea>
                                            </div>

                                        </div>

                                        <!-- BUTTONS -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="back-btn">Back</button>
                                            <button type="submit" class="confirm-btn">Confirm</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

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
    <script>
        const today = new Date();
        let year = today.getFullYear();
        let month = today.getMonth();
        let currentDay = today.getDate();

        const calendarYear = document.getElementById("calendarYear");
        const calendarDays = document.getElementById("calendarDays");
        const dateBtn = document.querySelector(".date-btn");

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        function generateCalendar() {
            calendarDays.innerHTML = "";
            calendarYear.innerText = `${monthNames[month]} ${year}`; // Show month + year

            // Days in month
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 1; i <= daysInMonth; i++) {
                let day = document.createElement("div");
                day.classList.add("calendar-day");
                day.innerText = i;

                if (i === currentDay && year === today.getFullYear() && month === today.getMonth()) {
                    day.classList.add("active");
                }

                day.onclick = () => {
                    document.querySelectorAll(".calendar-day")
                        .forEach(d => d.classList.remove("active"));
                    day.classList.add("active");
                    currentDay = i;

                    // Update button with selected date
                    dateBtn.innerText = `${currentDay}-${monthNames[month]}-${year}`;
                };

                calendarDays.appendChild(day);
            }
        }

        document.getElementById("prevYear").onclick = () => {
            if (month === 0) {
                month = 11;
                year--;
            } else {
                month--;
            }
            generateCalendar();
        };

        document.getElementById("nextYear").onclick = () => {
            if (month === 11) {
                month = 0;
                year++;
            } else {
                month++;
            }
            generateCalendar();
        };

        generateCalendar();
    </script>


    <script>
        document.querySelectorAll('.day-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.day-btn')
                    .forEach(b => b.classList.remove('active'));

                btn.classList.add('active');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const submitBtn = document.querySelector('.submitt-btnn'); // Submit button
            const projectModalEl = document.getElementById('projectModal'); // Current modal
            const confirmModalEl = document.getElementById('confirmModal'); // Next modal

            submitBtn.addEventListener('click', function() {

                // Pehla modal hide
                const projectModal = bootstrap.Modal.getInstance(projectModalEl) || new bootstrap.Modal(
                    projectModalEl);
                projectModal.hide();

                // Jab pehla modal hidden ho jaye, doosra modal show karo
                projectModalEl.addEventListener('hidden.bs.modal', function handler() {

                    // Clean previous backdrops
                    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';

                    // Doosra modal show karo
                    const confirmModal = new bootstrap.Modal(confirmModalEl);
                    confirmModal.show();

                    // Event listener remove karo to prevent multiple triggers
                    projectModalEl.removeEventListener('hidden.bs.modal', handler);
                });

            });

            // 🔥 GLOBAL BACKDROP & BODY CLEANUP — jab last modal close ho
            document.body.addEventListener('hidden.bs.modal', function() {
                setTimeout(() => {
                    if (!document.querySelector('.modal.show')) {
                        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                        document.body.classList.remove('modal-open');
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }
                }, 300);
            });

        });
    </script>
@endpush
