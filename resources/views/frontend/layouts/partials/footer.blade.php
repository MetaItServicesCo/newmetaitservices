<style>
    .site-footer {
        background: #404959;
        padding: 60px 0;
        color: #fff;
        font-family: Inter;
        margin-top: 150px;
        position: relative;
    }

    /* LOGO BOX */
    .footer-logo-box {
        width: 213px;
        height: 149px;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .footer-logo-box img {
        width: 176px;
        height: 109px;
        object-fit: contain;
    }

    /* DESC */
    .footer-desc {
        color: #FFFFFF;
        font-size: 22px;
        font-weight: 400;
        letter-spacing: 0;
        line-height: 162%;
        margin-bottom: 20px;
        max-width: 405px;
    }

    /* CONTACT */
    .footer-contact {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .footer-contact li {
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 14px;
        color: #FFFFFF;
        font-size: 20px;
        font-weight: 300;
        letter-spacing: 0;
    }

    .footer-contact li i {
        color: #F96037;
        font-size: 20px;
    }

    /* SOCIAL */
    .footer-social {
        display: flex;
        gap: 12px;
    }

    .footer-social i {
        font-size: 20px;
    }

    .footer-social a {
        width: 45px;
        height: 45px;
        background: #FAFAFA;
        /* color: #404959; */
        color: #F38B5C;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
        text-decoration: none;
    }

    .footer-social a:hover {
        background: #404959;
        color: #fff;
    }

    /* TITLES */
    .footer-title {
        color: #FFFFFF;
        font-size: 25px;
        font-weight: 700;
        letter-spacing: 0;
        line-height: 25px;
        margin-bottom: 18px;
    }

    /* LINKS */
    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
        cursor: pointer;
        color: #FFFFFF;
        font-size: 20px;
        font-weight: 300;
        letter-spacing: 0;
        line-height: 162%;
    }

    .footer-links li:hover {
        color: #dcdcdc;
    }

    /* QUESTION */
    .footer-question {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
    }

    .footer-question span {
        color: #000000;
    }

    .footer-question img {
        width: 60px;
    }

    /* MOBILE */
    @media (max-width: 767px) {

        .footer-logo-box {
            margin: 0 auto 20px;
        }

        .footer-desc {
            text-align: center;
            margin: 0 auto 20px;
        }

        .footer-social {
            justify-content: center;
        }

        .footer-title {
            margin-top: 20px;
        }
    }

    /* CTA WRAPPER */
    .footer-cta-wrapper {
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        z-index: 10;
    }


    /* CTA BOX */
    .footer-cta {
        max-width: 1100px;
        margin: 0 auto;
        background: #F96037;
        padding: 35px 20px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        height: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* LEFT TEXT */
    .footer-cta-left {
        color: #fff;
        font-size: 30px;
        font-weight: 600;
        line-height: 1.35;
        max-width: 989px;
        letter-spacing: 0;
    }

    /* RIGHT */
    .footer-cta-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cta-icon {
        width: 80px;
        height: 80px;
        background: #ffffff;
        color: #F38B5C;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .cta-icon i {
        font-size: 50px;
    }

    /* TEXT */
    .cta-text span {
        display: block;
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        line-height: 100%;
        margin-top: 10px;

    }

    .cta-text p {
        display: block;
        color: #fff;
        font-size: 25px;
        font-weight: 600;
        line-height: 100%;
        margin-top: 10px;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .footer-cta {
            max-width: 600px;
        }

        .footer-cta-left {
            font-size: 24px;
        }

        .cta-icon {
            width: 60px;
            height: 60px;

        }

        .cta-icon i {
            font-size: 40px;
        }

        .cta-text span {

            font-size: 18px;

        }

        .cta-text p {

            font-size: 18px;
        }

        .footer-question {

            position: absolute;
            bottom: -75px;
        }
    }

    @media (max-width: 767px) {
        .footer-cta {
            max-width: 350px;
            height: auto;
        }

        .footer-cta-left {
            font-size: 13px;
        }

        .cta-icon {
            width: 25px;
            height: 25px;

        }

        .cta-icon i {
            font-size: 15px;
        }

        .cta-text span {

            font-size: 10px;

        }

        .cta-text p {

            font-size: 10px;
        }

        .footer-question {

            position: absolute;
            bottom: -75px;
        }

        .footer-cta-wrapper {
            position: absolute;
            top: -80px;
            left: 50%;
            transform: translateX(-50%);

        }
    }

    /* ================== model  css ===================== */

    /* MODAL SIZE */
    .question-modal {
        width: 100%;
        max-width: 330px;
        border-radius: 20px;
        overflow: hidden;
    }

    /* HEADER */
    .question-header {
        background: #404959;
        border: none;
    }

    .question-header img {
        width: 30px;
    }

    .question-header h6 {
        font-family: Inter;
        font-size: 11px;
        font-weight: 700px;
        line-height: 41px;
    }

    /* BODY */
    .question-body {
        background: #FCE2D6;
        padding: 20px 30px;

    }

    /* HEADING */
    .form-heading {
        font-family: Inter;
        font-size: 13px;
        font-weight: 500px;
        line-height: 18px;
        color: #000000;
        max-width: 364px;
    }

    /* INPUTS */
    .question-input {
        width: 100%;
        max-width: 381px;
        height: 30px;
        background: #FCE2D6;
        border: 1px solid #F96037;
        border-radius: 12px;
        padding: 0 15px;
        margin-bottom: 8px;
        font-family: 'Lexend Deca', sans-serif;
        font-size: 12px;
    }

    .question-input option {
        font-size: 12px;
        color: #000000;

    }

    .message-input {
        height: 60px;
        padding-top: 10px;

    }

    /* SEND BUTTON */
    .send-btn {
        width: 100px;
        height: 30px;
        background: #404959;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 14px;
    }

    /* MOBILE RESPONSIVE */
    @media (max-width: 576px) {
        .question-modal {
            width: 100%;
        }

        .question-input {
            width: 100%;
        }
    }

    .form-label-custom {
        font-family: Inter;
        font-size: 12px;
        font-weight: 700px;
        line-height: 41px;
        color: #000000;
        margin-bottom: 0px;
        display: block;
    }

    .small {
        font-family: Inter;
        font-size: 12px;
    }


    /* ❌ backdrop blur & dark bg remove */
    .modal-backdrop {
        background: transparent !important;
    }

    /* RIGHT aligned modal */
    .question-modal-right .modal-dialog {
        position: fixed;
        right: 20px;
        top: 53%;
        transform: translateY(-50%);
        margin: 0;
        max-width: 450px;
        /* adjust width */
    }

    /* Animation (right se slide) */
    .question-modal-right.fade .modal-dialog {
        transform: translate(100%, -50%);
        transition: transform 0.4s ease;
    }

    .question-modal-right.show .modal-dialog {
        transform: translate(0, -50%);
    }
</style>
<footer class="site-footer">
    <!-- FOOTER CTA -->
    <div class="footer-cta-wrapper">
        <div class="footer-cta">
            <div class="footer-cta-left">
                Let’s talk about how we can
                transform your business!
            </div>

            <div class="footer-cta-right">
                <div class="cta-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="cta-text">
                    <span>Interested in working?</span>
                    @if (setting('email'))
                        <p><a href="mailto:{{ setting('email') }}" class="text-white text-decoration-none hover-primary">
                                {{ setting('email') }}
                            </a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row ">

            <!-- COLUMN 1 (WIDE) -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-logo-box">
                    @if (setting('site_logo'))
                        <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="{{ setting('site_name') }}">
                    @endif
                </div>

                <p class="footer-desc">
                    We help businesses grow through digital solutions,
                    marketing strategies, and innovative technology.
                </p>

                <ul class="footer-contact">
                    @if (setting('email'))
                        <li><i class="fa-solid fa-envelope"></i> <a href="mailto:{{ setting('email') }}"
                                class="text-white text-decoration-none hover-primary">
                                {{ setting('email') }}
                            </a></li>
                    @endif
                    @if (setting('phone'))
                        <li><i class="fa-solid fa-phone"></i> <a href="tel:{{ cleanPhone(setting('phone')) }}"
                                class="text-white text-decoration-none hover-primary">
                                {{ setting('phone') }}
                            </a></li>
                    @endif
                    @if (setting('address'))
                        <li><i class="fa-solid fa-location-arrow"></i> {{ setting('address') }}</li>
                    @endif
                </ul>

                <div class="footer-social">
                    @if (setting('facebook'))
                        <a href="{{ setting('facebook') }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if (setting('twitter'))
                        <a href="{{ setting('twitter') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    @endif
                    @if (setting('linkedin'))
                        <a href="{{ setting('linkedin') }}" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    @endif
                    @if (setting('instagram'))
                        <a href="{{ setting('instagram') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                </div>
            </div>

            <!-- COLUMN 2 -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">Services</h5>
                <ul class="footer-links">
                    <li>SEO Services</li>
                    <li>Web Development</li>
                    <li>UI/UX Design</li>
                    <li>Digital Marketing</li>
                    <li>Brand Strategy</li>
                    <li>Content Writing</li>
                    <li>Performance Ads</li>
                </ul>
            </div>

            <!-- COLUMN 3 -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">Industries</h5>
                <ul class="footer-links">
                    <li>Healthcare</li>
                    <li>Ecommerce</li>
                    <li>Finance</li>
                    <li>Education</li>
                    <li>Real Estate</li>
                    <li>Technology</li>
                    <li>Logistics</li>
                </ul>
            </div>

            <!-- COLUMN 4 -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">Resources</h5>
                <ul class="footer-links">
                    <li>Blog</li>
                    <li>Case Studies</li>
                    <li>FAQs</li>
                    <li>Help Center</li>
                    <li>Privacy Policy</li>
                    <li>Terms & Conditions</li>
                </ul>
            </div>

            <!-- COLUMN 5 -->
            <div class="col-lg-2 col-md-6 mb-4 position-relative">
                <h5 class="footer-title">Locations</h5>
                <ul class="footer-links">
                    <li>USA</li>
                    <li>Canada</li>
                    <li>UK</li>
                    <li>Australia</li>
                </ul>



            </div>

        </div>
    </div>

    <div class="modal fade question-modal-right" id="questionModal" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content question-modal">

                <!-- HEADER -->
                <div class="modal-header question-header">
                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('frontend/images/footer-img.png') }}" alt="">
                        <h6 class="mb-0 text-white">Have A Question</h6>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body question-body">
                    <h6 class="form-heading">Enter your question below and a representative will get right back to you.
                    </h6>
                    <form class="mt" action="{{ route('question.submit') }}" method="post" id="questionForm">
                        @csrf

                        {{-- Name (required) --}}
                        <input id="q_name" name="name" type="text" class="question-input required" placeholder="Enter your name">
                        <span class="text-danger" id="error_name"></span>

                        {{-- Country (required) --}}
                        <select id="q_country" name="country" class="question-input required">
                            <option value="">Select country</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Canada">Canada</option>
                        </select>
                        <span class="text-danger" id="error_country"></span>

                        {{-- Email (required) --}}
                        <input id="q_email" name="email" type="email" class="question-input required" placeholder="Enter your email">
                        <span class="text-danger" id="error_email"></span>

                        {{-- Message (required) --}}
                        <textarea id="q_message" name="message" class="question-input message-input required" placeholder="Write your message"></textarea>
                        <span class="text-danger" id="error_message"></span>

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="agree" name="agree" value="1">
                            <label class="form-check-label small" for="agree">
                                By submitting you agree to receive SMS or emails for the provided channel.
                                Rates may be applied.
                            </label>
                        </div>

                        <div class="col-12 form-group mb-3">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="w-100" id="questionCaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                            </div>
                            <span class="text-danger" id="error_grecaptcha"></span>
                        </div>

                        <button type="submit" class="send-btn mt-2">Send</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="footer-question" data-bs-toggle="modal" data-bs-target="#questionModal">
        <img src="{{ asset('frontend/images/footer-img.png') }}" alt="">
        <span>Have A Question</span>
    </div>
</footer>
