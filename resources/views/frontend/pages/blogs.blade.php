@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $data->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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

        /* ===================== latest updates ============================= */

        .latest-updates {
            padding: 50px 0;
            font-family: Inter;
        }

        /* HEADER */
        .updates-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .updates-header h2 {
            font-size: 55px;
            font-weight: 700;
            line-height: 64px;
            letter-spacing: 2%;
            text-align: center;
        }

        /* CIRCLE BUTTON */
        .circle-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #404959;
            color: #fff;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        /* CATEGORY AREA */
        .categories-main {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
        }

        .categories-wrapper {
            overflow: hidden;
            max-width: 1020px;
            /* 4 buttons visible */
            margin: 0 auto;
        }

        .categories-track {
            display: flex;
            gap: 12px;
            transition: transform 0.4s ease;
        }

        .cat-btn {
            min-width: 193px;
            height: 58px;
            border-radius: 21px;
            background: #F38B5C;
            color: #fff;
            border: none;
            font-size: 28px;
            font-weight: 700;
            line-height: 160%;
            letter-spacing: 0;
        }

        .cat-btn.active {
            background: #404959;
        }

        /* BLOG CARD */
        .blog-card {
            box-shadow: 0 0 13.9px rgba(0, 0, 0, 0.25);
            /* padding: 20px; */
            border-radius: 15px;
            width: 100%;
            max-width: 416px;
            height: 522px;
            margin: 0 auto;
            margin-bottom: 30px;
            transition: all 0.4s ease-in-out;
        }

        .blog-card:hover {
            transform: translateY(-8px);
        }

        .blog-card .body {
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
        }

        .blog-card img {
            width: 100%;
            height: 216px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .blog-tag {
            margin-top: 15px;
            width: 232px;
            height: 45px;
            border-radius: 21px;
            background: #F38B5C;
            color: #ffffff;
            border: none;
            font-size: 18px;
            font-weight: 700;
            line-height: 124%;
            letter-spacing: 0;
            margin-bottom: 10px;
        }

        .body h4 {
            font-size: 20px;
            font-weight: 700;
            line-height: 124%;
            letter-spacing: 0;
            color: #000000;
            max-width: 316px;
        }

        .body p {
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 357px;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .blog-footer span {
            font-size: 18px;
            font-weight: 200;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        .blog-footer a {
            font-size: 20px;
            font-weight: 700;
            line-height: 124%;
            letter-spacing: 0;
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .blog-footer a:hover {
            color: #F96037;

        }

        /* PAGINATION */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 60px;
        }

        .page-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid #A2A6B0;
            transition: all 0.4s ease-in-out;
        }

        .page-btn:hover {
            background: #404959;
            border: none;
            color: #ffffff;

        }

        .page-btn.active {
            background: #F96037;
            color: #fff;
            border-color: #F96037;
        }

        @media(max-width:768px) {
            .categories-wrapper {
                max-width: 604px;
            }

            .circle-btn {
                width: 30px;
                height: 33px;

            }
        }

        @media(max-width:767px) {
            .categories-wrapper {
                max-width: 200px;
            }


        }


        /* ====================== latest-digital =========================== */

        .latest-digital {
            padding: 50px 0;
            font-family: Inter;
        }

        .digital-card {
            border-radius: 15px;
            width: 100%;
            max-width: 416px;
            height: 522px;
            margin: 0 auto;
            margin-bottom: 30px;
            transition: all 0.4s ease-in-out;
            padding: 10px;

        }

        .digital-card:hover {
            box-shadow: 0 0 8px #404959;

        }

        .digital-card img {
            width: 100%;
            height: 216px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .digital-tag {
            margin-top: 15px;
            width: 137px;
            height: 45px;
            border-radius: 21px;
            background: #F38B5C;
            color: #ffffff;
            border: none;
            font-size: 18px;
            font-weight: 700;
            line-height: 124%;
            letter-spacing: 0;
            margin-bottom: 10px;
            transition: all 0.3s ease-in-out;

        }

        .digital-tag:hover {
            background: #404959;

        }

        .digital h4 {
            font-size: 20px;
            margin-top: 10px;
            font-weight: 700;
            line-height: 124%;
            letter-spacing: 0;
            color: #000000;
            max-width: 316px;
        }


        .digital {
            /* padding: 10px; */
        }

        .digital p {
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 357px;
        }

        .digital span {
            font-size: 18px;
            font-weight: 200;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 357px;
            display: block;
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
                    <h1 class="dm-title">Blog </h1>

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

    <section class="latest-updates">
        <div class="container">

            <!-- HEADER -->
            <div class="updates-header">
                <h2>Latest Updates</h2>


            </div>

            <!-- CATEGORIES WITH SIDE BUTTONS -->
            <div class="categories-main">

                <button class="circle-btn cat-prev">‹</button>

                <div class="categories-wrapper">
                    <div class="categories-track">
                        <button class="cat-btn active">All Blogs</button>
                        <button class="cat-btn">Technology</button>
                        <button class="cat-btn">Design</button>
                        <button class="cat-btn">Marketing</button>
                        <button class="cat-btn">Healthcare</button>
                        <button class="cat-btn">Education</button>
                        <button class="cat-btn">SEO</button>
                        <button class="cat-btn">AI</button>
                        <button class="cat-btn">Business</button>
                        <button class="cat-btn">Startup</button>
                    </div>
                </div>

                <button class="circle-btn cat-next">›</button>

            </div>

            <!-- BLOG CARDS -->
            <div class="row mt-5 ">
                <!-- CARD -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="body ">
                            <button class="blog-tag">Software Development</button>
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <div class="blog-footer">
                                <span>By Maria · Dec 15, 2025</span>
                                <a href="#">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="pagination-wrap">
                <button class="page-btn">‹</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <span>…</span>
                <button class="page-btn">15</button>
                <button class="page-btn">›</button>
            </div>

        </div>
    </section>


    <section class="latest-digital">
        <div class="container">

            <!-- HEADER -->
            <div class="updates-header">
                <h2>Digital Marketing</h2>


            </div>



            <!-- BLOG CARDS -->
            <div class="row mt-5 ">
                <!-- CARD -->

                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="digital-card">
                        <img src="{{ asset('frontend/images/blog/blog-img.png') }}" alt="">
                        <div class="digital ">
                            <h4>How to Make Website for School Project?</h4>
                            <p>
                                Learn step-by-step how to create a school project website
                                using simple tools and best practices.
                            </p>
                            <span>By Maria · Dec 15, 2025</span>

                            <button class="digital-tag">Read More</button>

                        </div>
                    </div>
                </div>

            </div>



        </div>
    </section>




@endsection


@push('frontend-scripts')
    <script>
        const track = document.querySelector('.categories-track');
        const prev = document.querySelector('.cat-prev');
        const next = document.querySelector('.cat-next');

        let index = 0;
        const visible = 5;

        next.addEventListener('click', () => {
            if (index < track.children.length - visible) {
                index++;
                track.style.transform = `translateX(-${index * 205}px)`;
            }
        });

        prev.addEventListener('click', () => {
            if (index > 0) {
                index--;
                track.style.transform = `translateX(-${index * 205}px)`;
            }
        });
    </script>
@endpush
