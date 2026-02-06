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
            /* display: flex;
                                                                                justify-content: center;
                                                                                align-items: center; */
            margin-bottom: 20px;
            text-align: center;
        }

        .updates-header p {
            max-width: 1225px;
            margin: 10px auto;

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
            background: transparent;
            color: #F96037;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .circle-btn i {
            font-size: 30px;

        }

        /* CATEGORY AREA */
        .categories-main {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 50px;
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
            min-width: 192px;
            height: 50px;
            border-radius: 12px;
            background: #000000;
            color: #ffffff;
            border: none;
            font-size: 15px;
            font-weight: 600;
            line-height: 120%;
            letter-spacing: 0.4px;
        }

        .cat-btn.active {
            background: rgba(244, 139, 92, 0.25);
            color: #F48B5C;
        }

        /* card */
        .portfolio-cardd {
            width: 100%;
            max-width: 360px;
            height: 450px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
            background: #ffffff;
        }


        /* IMAGE WRAPPER */
        .image-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        /* IMAGE */
        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 20px;

        }

        /* GRADIENT OVERLAY */
        .image-wrapper::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(217, 217, 217, 0.2) 0%,
                    rgba(0, 0, 0, 0.5) 71%);
        }



        /* CONTENT ON IMAGE */
        .card-content {
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
            color: #ffffff;
            z-index: 2;
        }

        .card-content h4 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .card-content p {
            font-size: 18px;
            line-height: 150%;
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

        /* ============ health model ============== */

        /* MODAL BG & RADIUS */
        .health-modal {
            background: #D9D9D9;
            border-radius: 20px;
            border: none;
        }

        /* LEFT IMAGE */
        .modal-left img {
            width: 100%;
            max-width: 1054px;
            height: 467px;
            max-width: 100%;
            object-fit: cover;
            /* border-radius: 20px 0 0 20px; */
        }

        @media(max-width:768px) {
            .modal-left img {
                height: 100%;

            }
        }

        /* RIGHT COLUMN */
        .modal-right {
            padding: 30px;
        }

        .modal-right img {
            width: 100%;
            max-width: 396px;
            height: 188px;
            max-width: 100%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        /* TITLE */
        .modal-content-text h3 {
            font-size: 30px;
            font-weight: 700;
            line-height: 25px;
            font-family: Inter;
            margin-bottom: 15px;
        }

        /* DESC */
        .modal-content-text .desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
            margin-bottom: 15px;
        }

        /* LIST */
        .modal-content-text ul {
            padding-left: 18px;
        }

        .modal-content-text ul li {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
            margin-bottom: 6px;
        }

        .modal-close {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            background: #3E4959;
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            transition: 0.3s ease;
            z-index: 10;
        }

        .modal-close:hover {
            background: #000;
        }

        .btn-proposal {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 353px;
            height: 67px;
            background-color: #404959;
            color: #ffffff;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            line-height: 25px;
            font-family: Inter;
            border-radius: 12px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-proposal:hover {
            background-color: #2f3745;
        }

        /* Loader overlay */
        .portfolio-loader {
            position: relative;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #ddd;
            border-top: 4px solid #000;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
                    <h1 class="dm-title">Portfolio Page</h1>

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
                <h2>Our Featured Work</h2>

                <p>Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus
                    diam.Libero diam auctor tristique hendreritLibero diam t Libero diam auctor tristique hendrerit in eu
                    vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique
                    hendreritLibero diam t </p>

            </div>

            <!-- CATEGORIES WITH SIDE BUTTONS -->
            <div class="categories-main">

                <button class="circle-btn cat-prev"><i class="fa-solid fa-angle-left"></i></button>

                <div class="categories-wrapper">
                    <div class="categories-track">
                        <button class="cat-btn {{ empty($categoryId) ? 'active' : '' }}" data-id="">All</button>
                        @foreach ($categories as $category)
                            <button class="cat-btn {{ isset($categoryId) && $categoryId == $category->id ? 'active' : '' }}"
                                data-id="{{ $category->id }}">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <button class="circle-btn cat-next"><i class="fa-solid fa-angle-right"></i></button>

            </div>

            <!-- PORTFOLIOS WRAPPER (IMPORTANT) -->
            <div id="portfolio-wrapper">
                @include('partials.portfolio-cards')
            </div>

            <!-- AJAX LOADER -->
            <div id="portfolio-loader" class="portfolio-loader d-none">
                <div class="spinner"></div>
            </div>


        </div>
    </section>
    <div class="modal fade" id="healthModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content health-modal">

                <div class="modal-body p-0 position-relative">

                    <!-- CLOSE BUTTON -->
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
                        ✕
                    </button>

                    <div class="container py-3">
                        <div class="row g-4 p-4">

                            <!-- LEFT COLUMN -->
                            <div class="col-lg-8">
                                <div class="modal-left">
                                    <img id="modal-main-image" src="" alt="">
                                </div>
                            </div>

                            <!-- RIGHT COLUMN -->
                            <div class="col-lg-4">
                                <div class="modal-right">
                                    <div class="row g-2" id="modal-gallery"></div>
                                </div>
                            </div>

                        </div>

                        <!-- HEADING, DESCRIPTION & LIST -->
                        <div class="modal-content-text mt-4 p-4"id="modal-description"></div>

                        <div class="d-flex justify-content-center align-items-center">
                            <a href="#" class="btn-proposal">Get A Proposal</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-have-project />



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

        // ================= CATEGORY FILTER =================
        $(document).on('click', '.cat-btn', function() {
            $('.cat-btn').removeClass('active');
            $(this).addClass('active');

            let categoryId = $(this).data('id') || '';
            fetchPortfolios(categoryId, 1);
        });


        // ================= PAGINATION =================
        $(document).on('click', '.page-btn:not([disabled])', function() {
            let page = $(this).data('page');
            let categoryId = $('.cat-btn.active').data('id') || '';

            if (page) {
                fetchPortfolios(categoryId, page);
            }
        });


        // ================= AJAX FUNCTION =================
        function fetchPortfolios(categoryId = '', page = 1) {
            $.ajax({
                url: "{{ route('portfolio') }}",
                type: "GET",
                data: {
                    category_id: categoryId,
                    page: page
                },
                beforeSend: function() {
                    // Hide old content
                    $('#portfolio-wrapper').hide();

                    // Show loader
                    $('#portfolio-loader').removeClass('d-none');
                },
                success: function(res) {
                    // Inject new content
                    $('#portfolio-wrapper').html(res);

                    // Hide loader
                    $('#portfolio-loader').addClass('d-none');

                    // Show content
                    $('#portfolio-wrapper').fadeIn(200);

                    // Optional smooth scroll
                    $('html, body').animate({
                        scrollTop: $('#portfolio-wrapper').offset().top - 100
                    }, 300);
                },
                error: function() {
                    $('#portfolio-loader').addClass('d-none');

                    $('#portfolio-wrapper')
                        .html('<p class="text-danger text-center">Error loading portfolios</p>')
                        .fadeIn(200);
                }
            });
        }
    </script>

    <script>
        $(document).on('click', '.portfolio-item', function() {

            let portfolioId = $(this).data('id');

            // Bootstrap 5 modal open
            let modal = new bootstrap.Modal(document.getElementById('healthModal'));
            modal.show();

            // Reset modal content (loader state)
            $('#modal-main-image').attr('src', '');
            $('#modal-gallery').html('<p class="text-center">Loading...</p>');
            $('#modal-description').html('');

            $.ajax({
                url: "{{ url('/portfolio') }}/" + portfolioId,
                type: "GET",
                success: function(res) {

                    // MAIN IMAGE
                    $('#modal-main-image').attr('src', res.thumbnail);

                    // GALLERY
                    let galleryHtml = '';
                    if (res.gallery && res.gallery.length > 0) {
                        res.gallery.forEach(function(img) {
                            galleryHtml += `
                            <div class="col-12">
                                <img src="${img}"
                                     class="img-fluid rounded gallery-thumb"
                                     style="cursor:pointer"
                                     onclick="changeMainImage('${img}')">
                            </div>
                        `;
                        });
                    } else {
                        galleryHtml = `<p class="text-center">No gallery images</p>`;
                    }

                    $('#modal-gallery').html(galleryHtml);

                    // DESCRIPTION (CKEditor HTML)
                    $('#modal-description').html(res.description);
                },
                error: function() {
                    $('#modal-gallery').html(
                        '<p class="text-danger text-center">Error loading portfolio</p>'
                    );
                }
            });
        });

        // Change main image on thumbnail click
        function changeMainImage(src) {
            $('#modal-main-image').attr('src', src);
        }
    </script>
@endpush
