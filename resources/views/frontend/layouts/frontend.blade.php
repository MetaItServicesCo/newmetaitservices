<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! printHtmlAttributes('html') !!}>
<!--begin::Head-->

<head>
    <base href="" />
    <title>@yield('meta_title', config('app.name'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="description" content="@yield('meta_description', '')" />
    <meta name="keywords" content="@yield('meta_keywords', '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('meta_title', config('app.name'))" />
    <meta property="og:description" content="@yield('meta_description', '')" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta name="author" content="" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" sizes="180x180" href="">

    {{-- <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}"> --}}


    <link rel="stylesheet" href="{{ asset('frontend/css') }}/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />


    <!-- Select2 CSS -->

    <!--begin::Vendor Stylesheets(used by this page)-->
    @foreach (getVendors('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Vendor Stylesheets-->

    <!--begin::Custom Stylesheets(optional)-->
    @foreach (getCustomCss() as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@400;700&family=Saira+Stencil+One&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <link rel="stylesheet" href="{{ asset('frontend/css') }}/custom.css" />
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!--end::Custom Stylesheets-->

    @stack('frontend-styles')

    @livewireStyles
</head>
<!--end::Head-->

<!--begin::Body-->

<body {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

    @include('partials/theme-mode/_init')

    @include('frontend.layouts.partials.header')


    @yield('frontend-content')


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
                                <img src="{{ asset('frontend/images/navbar-logo.png') }}" alt="Logo"
                                    class="nav-logo">

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
                                    <button type="button" class="date-btn">18-sep-2025</button>

                                    <button type="button" class="submitt-btnn" id="projectSubmitBtn">
                                        Submit
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <span class="text-danger" id="error_selected_date"></span>
                                </div>

                                <div class="d-flex flex-column flex-wrap gap-2 mt-4">
                                    <button type="button" class="day-btn">Monday</button>
                                    <button type="button" class="day-btn">Tuesday</button>
                                    <button type="button" class="day-btn">Wednesday</button>
                                    <button type="button" class="day-btn">Thursday</button>
                                    <button type="button" class="day-btn">Friday</button>
                                    <button type="button" class="day-btn">Saturday</button>
                                    <button type="button" class="day-btn">Sunday</button>
                                </div>
                                <div class="mt-2">
                                    <span class="text-danger" id="error_weekday"></span>
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
                                    </p>

                                    <form id="projectConfirmForm" class="mt-3" action="#" method="POST">
                                        @csrf
                                        <input type="hidden" name="selected_date" id="selected_date">
                                        <input type="hidden" name="weekday" id="selected_weekday">

                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <input id="first_name" name="first_name" type="text"
                                                    placeholder="First Name" class="custom-input">
                                                <span class="text-danger" id="error_first_name"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="last_name" name="last_name" type="text"
                                                    placeholder="Last Name" class="custom-input">
                                                <span class="text-danger" id="error_last_name"></span>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="email" name="email" type="email"
                                                    placeholder="Email" class="custom-input">
                                                <span class="text-danger" id="error_email"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="phone" name="phone" type="text"
                                                    placeholder="Phone Number" class="custom-input">
                                                <span class="text-danger" id="error_phone"></span>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="company_name" name="company_name" type="text"
                                                    placeholder="Company Name" class="custom-input">
                                                <span class="text-danger" id="error_company_name"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="website_url" name="website_url" type="url"
                                                    placeholder="Website URL" class="custom-input">
                                                <span class="text-danger" id="error_website_url"></span>
                                            </div>

                                            <div class="col-12">
                                                <textarea id="message" name="message" placeholder="Write A Message" rows="4" class="custom-inputt"></textarea>
                                                <span class="text-danger" id="error_message"></span>
                                            </div>

                                            <div class="col-12 form-group mb-3">
                                                <div class="g-recaptcha w-100" id="footerCaptcha"
                                                    data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                                                </div>
                                                <span class="text-danger" id="error_grecaptcha"></span>
                                            </div>

                                        </div>

                                        <!-- BUTTONS -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="back-btn" id="confirmBackBtn">Back</button>
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

    @include('frontend.layouts.partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    @foreach (getGlobalAssets() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used by this page)-->
    @foreach (getVendors('js') as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(optional)-->
    @foreach (getCustomJs() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Custom Javascript-->
    <!-- JS -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js') }}/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ asset('frontend/js') }}/custom.js"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- Toastr Configuration -->
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    @stack('frontend-scripts')
    <!--end::Javascript-->

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (message) => {
                toastr.success(message);
            });
            Livewire.on('error', (message) => {
                toastr.error(message);
            });

            Livewire.on('swal', (message, icon, confirmButtonText) => {
                if (typeof icon === 'undefined') {
                    icon = 'success';
                }
                if (typeof confirmButtonText === 'undefined') {
                    confirmButtonText = 'Ok, got it!';
                }
                Swal.fire({
                    text: message,
                    icon: icon,
                    buttonsStyling: false,
                    confirmButtonText: confirmButtonText,
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            });
        });
    </script>

    @livewireScripts

</body>
<!--end::Body-->

</html>
