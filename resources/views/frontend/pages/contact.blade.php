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


        /* ====================== buzz-section ========================= */

        .buzz-section {
            background: rgba(244, 139, 92, 0.25);
            padding: 20px 0;
            font-family: Inter;
        }

        /* MAIN HEADING */
        .main-heading {
            max-width: 848px;
            margin: 0 auto 80px;
            text-align: center;
            font-size: 55px;
            font-weight: 700;
            line-height: 65px;
            color: #000000;
        }



        .number {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            color: #F96037;
            margin-bottom: 20px;

        }

        .col-title {
            max-width: 758px;
            margin: 0 auto 20px;
            font-size: 25px;
            font-weight: 600;
            line-height: 160%;
            color: #000;
            text-align: center;
        }

        .col-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            color: #000;
            text-align: center;
            max-width: 742px;
        }

        /* CASE STUDY */
        .case-wrapper {
            text-align: center;
            margin-top: 80px;
        }

        .case-label {
            display: block;
            font-size: 20px;
            font-weight: 700;
            color: #F48B5C;
            margin-bottom: 10px;
        }

        .case-heading {
            font-size: 30px;
            font-weight: 700;
            line-height: 35px;
            margin-bottom: 60px;
        }

        /* CASE CARDS */


        .case-card {
            position: relative;
            width: 418px;
            height: 608px;
            border-radius: 20px;
            overflow: hidden;
        }

        .case-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            box-shadow: 0 0 6.1px rgba(0, 0, 0, 0.5);

        }

        /* OVERLAY */
        .case-card .overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 127px;
            background: linear-gradient(to right,
                    #F38B5C 0%,
                    #404959 100%);

            padding: 10px 15px;
            color: #fff;
            text-align: start;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .case-card h4 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .case-card p {
            font-size: 18px;
            line-height: 160%;
        }

        /* ======================= newsletter-section ==================== */
        .newsletter-section {
            background-color: #404959;
            padding: 50px 0;
            margin-top: 50px;
            font-family: Inter;
        }

        /* LEFT CONTENT */
        .newsletter-heading {
            font-size: 55px;
            font-weight: 700;
            line-height: 59px;
            color: #ffffff;
            margin-bottom: 25px;
            max-width: 803px;
        }

        .newsletter-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            color: #ffffff;
            margin-bottom: 35px;
        }

        /* INPUT */
        .newsletter-input {
            width: 100%;
            max-width: 653px;
            height: 59px;
            border-radius: 19px;
            border: 1px solid #ffffff;
            background: transparent;
            padding: 0 20px;
            font-size: 18px;
            color: #ffffff;
            outline: none;
            margin-bottom: 20px;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* BUTTON */
        .subscribe-btn {
            width: 482px;
            height: 67px;
            border-radius: 12px;
            background: #FF6036;
            border: none;
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 auto;
        }

        /* HOVER EFFECT */
        .subscribe-btn:hover {
            background: #ffffff;
            color: #404959;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(243, 139, 92, 0.5);
        }

        /* RIGHT IMAGE */
        .newsletter-img {
            width: 100%;
            max-width: 584px;
            height: 429px;
            object-fit: cover;
            border: 7px solid #E4E6E7;
        }

        /* ===================== contact-section ========================= */
        .contact-section {
            background: #404959;
            padding: 50px 0;
            font-family: Inter;
        }

        /* LEFT */
        .get-touch {
            color: #F96037;
            font-size: 20px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
        }

        .contact-heading {
            font-size: 45px;
            font-weight: 700;
            line-height: 60px;
            letter-spacing: 0;
            color: #ffffff;
        }

        .contact-sub {
            font-size: 20px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
            margin-top: 10px;
        }

        .contact-desc {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            margin-bottom: 30px;
        }

        .contact-hr {
            border-color: #FFFFFF;
            margin: 30px 0;
            width: 100%;
            max-width: 528px;
        }

        /* ICONS */
        .icon-circle {
            width: 50px;
            height: 50px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #F96037;
            font-size: 30px;
        }

        .social-icons a {
            width: 79.83px;
            height: 79.83px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #F96037;
            font-size: 30.52px;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            background: #F96037;
            color: #fff;
        }

        /* FORM */
        .contact-form-wrapper {
            background: #FCE2D6;
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 627px;
        }

        .contact-form-wrapper label {
            font-size: 20px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
            color: #000000;
        }

        .custom-input {
            width: 100%;
            max-width: 549px;
            height: 53px;
            border-radius: 12px;
            border: 1px solid #F96037;
            background: transparent;
            color: #666666;
        }

        .custom-textarea {
            border-radius: 12px;
            border: 1px solid #F96037;
            background: transparent;
            color: #666666;
        }

        .form-text {
            font-size: 14px;
        }

        /* BUTTON */
        .submit-btn {
            width: 353px;
            height: 67px;
            background: #404959;
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            line-height: 25px;
            letter-spacing: 0;
            border: none;
            border-radius: 12px;
            margin-top: 20px;
            transition: 0.3s;

        }

        .submit-btn:hover {
            background: #F96037;
        }

        .contact-info i {
            color: #F96037;
        }

        .contact-info-wrapper {
            width: 75%;
        }

        .contact-row {
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #fff;
            min-width: 240px;
        }

        .info-text strong {
            display: block;
            font-size: 20px;
            font-weight: 700;
            line-height: 41px;
            letter-spacing: 0;
            color: #F96037;

        }

        .info-text span {
            display: block;
            /* text next line proper aaye */
            font-size: 18px;
            font-weight: 700;
            line-height: 27px;
            letter-spacing: 0;
            opacity: 0.9;
            color: #ffffff;
            /* dark bg par readable */
        }


        /* ICON */


        /* MOBILE FIX */
        @media (max-width: 768px) {
            .contact-info-wrapper {
                width: 100%;
            }

            .contact-row {
                flex-direction: column;
                gap: 20px;
            }
        }


        .map-section {
            width: 100%;
        }

        .map-wrapper iframe {
            display: block;
            width: 100%;
            height: 450px;
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
                    <h1 class="dm-title">Contact Us</h1>

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
                <div class="col-lg-6 text-center d-flex align-items-center">
                    <img src="{{ asset('frontend/images/blog/blog-hero.png') }}" alt="Digital Marketing" class="mc-right-img">
                </div>

            </div>
        </div>
    </section>


    {{-- ============================= contact-section ==================================== --}}
    <section class="contact-section">
        <div class="container">
            <div class="row align-items-start g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-white">

                    <span class="get-touch">Get In Touch</span>

                    <h2 class="contact-heading">
                        Ready To Get Started?
                    </h2>

                    <p class="contact-sub">
                        Take the first Step towards Digital Marketing Success
                    </p>

                    <p class="contact-desc">
                        Let’s discuss your goals and explore how we can help your business grow digitally.
                    </p>

                    <hr class="contact-hr">

                    <!-- CONTACT INFO -->
                    <div class="contact-info-wrapper">

                        <div class="contact-row">
                            <div class="contact-item">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                @if (setting('email'))
                                    <div class="info-text">
                                        <strong>Email</strong>
                                        <a href="mailto:{{ setting('email') }}" target="_blank">
                                            <span>{{ setting('email') }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="contact-item">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                @if (setting('phone'))
                                    <div class="info-text">
                                        <strong>Phone</strong>
                                        <a href="tel:{{ cleanPhone(setting('phone')) }}">
                                            <span>{{ setting('phone') }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="contact-row mt-4">
                            <div class="contact-item">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-location-arrow"></i>
                                </div>
                                @if (setting('address'))
                                    <div class="info-text">
                                        <strong>Address</strong>
                                        <span>{{ setting('address') }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="contact-item">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-business-time"></i>
                                </div>
                                <div class="info-text">
                                    <strong>Working Hours</strong>
                                    <span>Mon – Fri, 9am – 6pm</span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <hr class="contact-hr">

                    <!-- SOCIAL ICONS -->
                    <div class="social-icons d-flex gap-3">
                        @if (setting('facebook'))
                            <a href="{{ setting('facebook') }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if (setting('twitter'))
                            <a href="{{ setting('twitter') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if (setting('linkedin'))
                            <a href="{{ setting('linkedin') }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                        @endif
                        @if (setting('instagram'))
                            <a href="{{ setting('instagram') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6">
                    <div class="contact-form-wrapper">
                        <form id="contactForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control custom-input" placeholder="First Name" required>
                                    <small class="text-danger d-block mt-1" id="error_first_name"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control custom-input"
                                        placeholder="Last Name" required>
                                    <small class="text-danger d-block mt-1" id="error_last_name"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number"
                                        class="form-control custom-input" placeholder="Phone Number" required>
                                    <small class="text-danger d-block mt-1" id="error_phone_number"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control custom-input"
                                        placeholder="example@company.com" required>
                                    <small class="text-danger d-block mt-1" id="error_email"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" id="company_name"
                                        class="form-control custom-input" placeholder="Company Name">
                                    <small class="text-danger d-block mt-1" id="error_company_name"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Company URL</label>
                                    <input type="url" name="company_url" id="company_url"
                                        class="form-control custom-input" placeholder="https://example.com">
                                    <small class="form-text">
                                        The Web Address of your Company’s official website.
                                    </small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Share Your Vision With Us!</label>
                                <textarea name="message" id="message" class="form-control custom-textarea" rows="4"
                                    placeholder="Any Additional Information..." required></textarea>
                                <small class="form-text">
                                    Feel free to use this space for any additional comments you’d like us to consider.
                                    If you have a specific service in mind, please let us know!
                                </small>
                            </div>

                            <div class="col-12 form-group mb-3">
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha w-100" id="contactCaptcha"
                                    data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>
                                <small class="text-danger d-block mt-1" id="error_g-recaptcha-response"></small>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="submit-btn" id="contactSubmitBtn">
                                    Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-wrapper">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.742418155862!2d67.0307!3d24.8607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e7f8b2c7c6b%3A0x2d4a8f1a6f9b1b2!2sKarachi!5e0!3m2!1sen!2s!4v1700000000000"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
@endsection


@push('frontend-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const contactSubmitBtn = document.getElementById('contactSubmitBtn');
            const originalText = 'Submit';

            if (contactForm) {
                contactForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    // Clear previous errors
                    document.querySelectorAll('[id^="error_"]').forEach(el => {
                        el.textContent = '';
                        el.style.display = 'none';
                    });

                    // Disable submit button and show loader
                    contactSubmitBtn.disabled = true;
                    contactSubmitBtn.innerHTML =
                        'Submitting...<span class="spinner-border spinner-border-sm me-2"></span>';

                    try {
                        // Get reCAPTCHA token
                        const recaptchaToken = grecaptcha.getResponse();
                        if (!recaptchaToken) {
                            showError('g-recaptcha-response', 'Please verify the reCAPTCHA');
                            resetCaptcha();
                            resetSubmitBtn();
                            return;
                        }

                        // Prepare form data
                        const formData = new FormData(contactForm);
                        formData.append('g-recaptcha-response', recaptchaToken);

                        // Submit form via AJAX
                        const response = await fetch("{{ route('contact.submit') }}", {
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
                            }

                            // Reset form
                            contactForm.reset();
                            resetCaptcha();

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
                            }

                            // Reset captcha on error
                            resetCaptcha();
                        }
                    } catch (error) {
                        console.error('Form submission error:', error);

                        if (typeof toastr !== 'undefined') {
                            toastr.error('An unexpected error occurred. Please try again.');
                        }

                        resetCaptcha();
                    } finally {
                        // Always reset button at the end
                        resetSubmitBtn();
                    }
                });

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
                 * Reset captcha
                 */
                function resetCaptcha() {
                    if (typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }
                }

                /**
                 * Reset submit button - removes loader and re-enables button
                 */
                function resetSubmitBtn() {
                    contactSubmitBtn.disabled = false;
                    contactSubmitBtn.textContent = originalText;
                }

                /**
                 * Clear error message when user starts typing
                 */
                const formInputs = contactForm.querySelectorAll('input, textarea');
                formInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        const errorEl = document.getElementById(`error_${this.name}`);
                        if (errorEl) {
                            errorEl.textContent = '';
                            errorEl.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
@endpush
