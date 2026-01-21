<style>
    .site-footer {
        background: #404959;
        padding: 90px 0;
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
        font-size: 30px;
    }

    /* SOCIAL */
    .footer-social {
        display: flex;
        gap: 12px;
    }

    .footer-social i {
        font-size: 29px;
    }

    .footer-social a {
        width: 79.3px;
        height: 79.3px;
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
        position: absolute;
        bottom: 20px;
    }

    .footer-question img {
        width: 40px;
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
        height: 130px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* LEFT TEXT */
    .footer-cta-left {
        color: #fff;
        font-size: 55px;
        font-weight: 600;
        line-height: 100%;
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
        width: 100px;
        height: 100px;
        background: #ffffff;
        color: #F38B5C;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .cta-icon i {
        font-size: 70px;
    }

    /* TEXT */
    .cta-text span {
        display: block;
        color: #fff;
        font-size: 25px;
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
</style>
<footer class="site-footer">
    <!-- FOOTER CTA -->
    <div class="footer-cta-wrapper">
        <div class="footer-cta">
            <div class="footer-cta-left">
                Let’s talk about how we can <br>
                transform your business!
            </div>

            <div class="footer-cta-right">
                <div class="cta-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="cta-text">
                    <span>Interested in working?</span>
                    <p>Metait@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row ">

            <!-- COLUMN 1 (WIDE) -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-logo-box">
                    <img src="{{ asset('frontend/images/navbar-logo.png') }}" alt="Logo">
                </div>

                <p class="footer-desc">
                    We help businesses grow through digital solutions,
                    marketing strategies, and innovative technology.
                </p>

                <ul class="footer-contact">
                    <li><i class="fa-solid fa-envelope"></i> Metait@gmail.com</li>
                    <li><i class="fa-solid fa-phone"></i> 122345678</li>
                    <li><i class="fa-solid fa-location-arrow"></i> USA</li>
                </ul>

                <div class="footer-social">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
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

                <div class="footer-question">
                    <img src="{{ asset('frontend/images/footer-img.png') }}" alt="">
                    <span class="">Have A Question</span>
                </div>
            </div>

        </div>
    </div>
</footer>
