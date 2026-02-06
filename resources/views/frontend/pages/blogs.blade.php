@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

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

    {{-- <section class="latest-updates">
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
                        <button class="cat-btn active" data-slug="all">All Blogs</button>
                        @if (isset($categories) && $categories->count() > 0)
                            @foreach ($categories as $category)
                                <button class="cat-btn" data-slug="{{ $category->slug }}">{{ $category->name }}</button>
                            @endforeach
                        @endif
                    </div>
                </div>

                <button class="circle-btn cat-next">›</button>

            </div>

            <!-- BLOG CARDS -->
            <div class="row mt-5 ">
                <div id="blogs-container">
                    <!-- CARD -->
                    @if (isset($blogs))
                        @include('partials.blog-cards', ['blogs' => $blogs])
                    @else
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">No blogs available.</p>
                        </div>
                    @endif
                </div>

            </div>

            <div class="mt-4" id="blogs-pagination-container">
                @if (isset($blogs))
                    {{ $blogs->links('vendor.pagination.blogs-pagination') }}
                @endif
            </div>

        </div>
    </section> --}}

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
                        <button class="cat-btn active" data-slug="all">All Blogs</button>
                        @if (isset($categories) && $categories->count() > 0)
                            @foreach ($categories as $category)
                                <button class="cat-btn" data-slug="{{ $category->slug }}">{{ $category->name }}</button>
                            @endforeach
                        @endif
                    </div>
                </div>

                <button class="circle-btn cat-next">›</button>

            </div>

            <!-- BLOG CARDS -->
            <div class="row mt-5" id="blogs-container">
                <!-- CARD -->
                @if (isset($blogs))
                    @foreach ($blogs as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-card">
                                <img src="{{ asset('storage/blog/images/' . $item->image) }}" alt="">
                                <div class="body ">
                                    <button class="blog-tag">{{ $item->category?->name ?? '' }}</button>
                                    <h4>{{ \Str::limit($item->title, 60 ?? '') }}</h4>
                                    <p>
                                        {{ \Str::limit($item->short_description, 140) }}
                                    </p>
                                    <div class="blog-footer">
                                        <span>{{ $item->created_at->format('M d, Y') }}</span>
                                        <a href="{{ route('blog.detail', $item->slug) }}">Read More →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No blogs available.</p>
                    </div>
                @endif

            </div>

            <!-- PAGINATION -->
            <div class="mt-4" id="blogs-pagination-container">
                @if (isset($blogs))
                    {{ $blogs->links('vendor.pagination.blogs-pagination') }}
                @endif
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
                @foreach ($maketingBlogs as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="digital-card">
                            <img src="{{ asset('storage/blog/images/' . $item->image) }}"
                                alt="{{ $item->image_alt_text ?? '' }}">
                            <div class="digital ">
                                <h4>{{ \Str::limit($item->title, 60 ?? '') }}</h4>
                                <p>
                                    {{ \Str::limit($item->short_description, 100) }}
                                </p>
                                <span>{{ $item->created_at->format('M d, Y') }}</span>
                                <a href="{{ route('blog.detail', $item->slug) }}">
                                    <button class="digital-tag">Read More</button></a>

                            </div>
                        </div>
                    </div>
                @endforeach
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('blogs-container');
            const paginationContainer = document.getElementById('blogs-pagination-container');
            const filterUrl = "{{ route('blogs.filter') }}";

            let activeSlug = 'all';

            function fetchBlogs(slug, page = 1) {
                activeSlug = slug;

                container.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border"></div>
            </div>
        `;

                fetch(`${filterUrl}?slug=${slug}&page=${page}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        container.innerHTML = data.html;
                        paginationContainer.innerHTML = data.pagination;
                    })
                    .catch(() => {
                        container.innerHTML = `
                <div class="col-12 text-center text-danger py-5">
                    Failed to load blogs.
                </div>
            `;
                    });
            }

            /* CATEGORY CLICK */
            document.querySelector('.categories-track')
                .addEventListener('click', function(e) {
                    const btn = e.target.closest('.cat-btn');
                    if (!btn) return;

                    document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    fetchBlogs(btn.dataset.slug, 1);
                });

            /* PAGINATION CLICK (Laravel default links) */
            paginationContainer.addEventListener('click', function(e) {
                const btn = e.target.closest('.page-btn');
                if (!btn || btn.classList.contains('disabled')) return;

                const page = btn.dataset.page;
                if (!page) return;

                fetchBlogs(activeSlug, page);

                document.querySelector('.latest-updates').scrollIntoView({
                    behavior: 'smooth'
                });
            });


        });
    </script>
@endpush
