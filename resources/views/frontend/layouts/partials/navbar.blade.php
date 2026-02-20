<style>
    /* ======= mega === */
    /* NAV ICON */
    .mega-trigger i {
        margin-left: 6px;
        transition: transform 0.3s ease;
        font-size: 12px;
    }

    /* MEGA DROPDOWN */
    .mega-dropdown {
        position: absolute;
        top: 108%;
        left: 0;
        width: 100%;
        background: #3E4959;
        padding: 40px 0;
        z-index: 999;

        border-top-left-radius: 82px;
        border-bottom-right-radius: 82px;
        border-bottom-left-radius: 8px;

        opacity: 0;
        transform: translateY(150px);
        pointer-events: none;
        transition: opacity 0.5s ease, transform 0.5s ease;
        overflow-y: hidden;
    }

    .mega-dropdown.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    @media (max-width: 991px) {
        .mega-dropdown {
            position: static;
            width: 100%;
            padding: 25px 15px;
            margin-top: 10px;
            border-radius: 16px;

            display: none;
            transform: none;
            opacity: 1;
            pointer-events: auto;

            max-height: 70vh;
            /* screen ka 70% */
            overflow-y: auto;
            /* vertical scroll */
            -webkit-overflow-scrolling: touch;
            /* smooth iOS scroll */
        }

        .mega-dropdown.show {
            display: block;
        }
    }




    /* CARD */
    .mega-card {
        background: #FBF5E3;
        width: 100%;
        max-width: 327px;
        height: 343px;
        border-radius: 11px;
        padding: 30px;
    }

    .mega-card h3 {
        font-size: 32px;
        font-weight: 700;
        line-height: 140%;
        font-family: Inter;
        color: #404959;
        letter-spacing: 0;
    }

    .mega-card p {
        font-size: 20px;
        font-weight: 400;
        line-height: 160%;
        font-family: Inter;
        color: #000;
        margin: 15px 0 30px;
    }

    .talk-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 195px;
        height: 54px;
        background: #FF6036;
        color: #FBF5E3;
        text-decoration: none;
        border-radius: 11px;
        font-family: Inter;
        font-size: 32px;
        font-weight: 700;
        line-height: 140%;
    }

    /* TITLES */
    .mega-title {
        color: #FBF5E3;
        padding-bottom: 10px;
        margin-bottom: 15px;
        border-bottom: 2px solid #FBF5E3;
        display: inline-block;
        font-size: 25px;
        font-weight: 700;
        line-height: 140%;
        letter-spacing: 0;
        font-family: Inter;

    }

    .mega-title a {
        text-decoration: none;
        color: #FBF5E3;

    }

    .mega-title2 {
        color: #FBF5E3;
        padding-bottom: 10px;
        margin-bottom: 15px;
        border-bottom: 2px solid #FBF5E3;
        display: inline-block;
        font-size: 40px;
        font-weight: 700;
        line-height: 140%;
        letter-spacing: 0;
        font-family: Inter;

    }

    /* LINKS */
    /* ===== Mega Links ===== */
    .mega-links a {
        display: block;
        /* layout safe */
        color: #FBF5E3;
        text-decoration: none;
        padding: 8px 0;
        position: relative;
    }

    /* underline only under text using span */
    .mega-links a span {
        display: inline-block;
        /* text ke width tak */
        border-bottom: 2px solid #FBF5E3;
        padding-bottom: 3px;
        /* thoda gap */
        transition: transform 0.4s ease;
        font-size: 16px;
        font-weight: 700;
        line-height: 140%;
        letter-spacing: 0;
        font-family: Inter;
    }

    /* hover effect */
    .mega-links a:hover span {
        transform: translateX(6px);
        color: #FF6036;
        /* text ke saath border slide */
    }



    .Ind-title {
        font-size: 50px;
        font-weight: 700;
        line-height: 120%;
        letter-spacing: 0;
        font-family: Inter;
        color: #FFFFFF;
        margin-bottom: 20px;
    }

    @media (max-width: 991px) {
        .custom-navbar .navbar-collapse {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;

            width: 100%;
            background: #3E4959;

            padding: 20px;
            z-index: 998;

            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .custom-navbar .navbar-collapse>* {
            max-width: 100%;
            margin: 0;
        }
    }


    .nav-link-wrap {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .mega-icon {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .mega-icon i {
        transition: transform 0.3s ease;
        color: #FFFFFF;
    }

    .nav-link {
        position: relative;
        padding: 6px 0;
    }

    /* Underline luxury animation */
    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #fff, #FF6036);
        transition: width 0.35s ease;
    }

    .nav-item:hover .nav-link::after {
        width: 100%;
    }
</style>

<nav class="navbar navbar-expand-lg custom-navbar fixed-top">
    <div class="container  position-relative">
        <a class="navbar-brand nav-logo-wrap" href="{{ route('home') }}">
            <img src="{{ asset('storage/' . setting('site_logo', 'frontend/images/logo.png')) }}"
                alt="{{ setting('site_name') }}" class="nav-logo">
        </a>

        <button class="navbar-toggler ms-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto">

                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <!-- INDUSTRY -->
                <li class="nav-item mega-item">
                    <div class="nav-link-wrap">
                        <a class="nav-link" href="{{ route('industries') }}">Industry</a>
                        <span class="mega-icon" data-mega="industry">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </div>
                    <a class="nav-link mega-trigger" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <!-- SERVICES -->
                <li class="nav-item mega-item">
                    <div class="nav-link-wrap">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                        <span class="mega-icon" data-mega="services">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </div>
                </li>

                <!-- ABOUT -->
                <li class="nav-item mega-item">
                    <div class="nav-link-wrap">
                        <a class="nav-link" href="{{ route('about-us') }}">About MetaIt</a>
                        <span class="mega-icon" data-mega="about">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </div>
                </li>

            </ul>


            {{-- <div class="">
                <a href="{{ route('contact-us') }}" class="bt btn-contact">Contact</a>
            </div> --}}
            <div>
                <a href="{{ route('contact-us') }}" class="btnn btn-outline">
                    <em>Contact</em>
                </a>


            </div>


            <!-- ============ MEGA DROPDOWNS ============ -->

            <!-- INDUSTRY -->


            <!-- INDUSTRY -->
            <div class="mega-dropdown" id="mega-industry">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="mega-card">
                                <h3>See Impact!</h3>
                                <p> Start Building A Stronger Brand</p>
                                <a href="{{ route('contact-us') }}" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row">
                                <h2 class="Ind-title">Industries We Serves</h2>
                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Industries</h5> --}}
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/industry/healthcare"><span>Healthcare &
                                                Life</span></a>


                                        <a href="https://metaitservices.co/industry/startups-saas"><span>Startup &
                                                SaaS</span> </a>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Enterprise</h5> --}}
                                    <div class="mega-links">
                                        {{-- <a href="#"><span>Retail</span></a>
                                        <a href="#"><span>Manufacturing</span></a>
                                        <a href="#"><span>Logistics</span></a>
                                        <a href="#"><span>Real Estate</span></a> --}}
                                        <a href="https://metaitservices.co/industry/finance-and-fintech"><span>Finance &
                                                Tech</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Startup</h5> --}}
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/industry/retail-and-ecommerce"><span>Retail &
                                                E-Commerce</span></a>
                                        {{-- <a href="#"><span>MVP Development</span></a>
                                        <a href="#"><span>Product Design</span></a>
                                        <a href="#"><span>Scaling</span></a> --}}
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Startup</h5> --}}
                                    <div class="mega-links">

                                        <a href="https://metaitservices.co/industry/education-and-edtech"><span>Education
                                                & Tech</span></a>
                                        {{-- <a href="#"><span>MVP Development</span></a>
                                        <a href="#"><span>Product Design</span></a>
                                        <a href="#"><span>Scaling</span></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SERVICES -->
            <div class="mega-dropdown" id="mega-services">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="mega-card">
                                <h3>See Impact!</h3>
                                <p> Start Building A Stronger Brand</p>
                                <a href="{{ route('contact-us') }}" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title"><a
                                            href="https://metaitservices.co/service/software-development">Software
                                            Development</a></h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title"><a
                                            href="https://metaitservices.co/service/digital-marketing">Digital
                                            Marketing</a></h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title"><a
                                            href="https://metaitservices.co/service/artificial-intelligence">Artificial
                                            Intelligence</a></h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title"><a
                                            href="https://metaitservices.co/service/cloud-devops">Cloud DevOps</a></h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title"><a
                                            href="https://metaitservices.co/service/advisory-strategy">Advisory
                                            Strategy</a></h5>

                                </div>


                            </div>
                            <div class="row mt-4">
                                <h2 class="Ind-title">Choose Yours</h2>

                                <div class="col-lg-4 col-md-6">

                                    <div class="mega-links">
                                        <a
                                            href="https://metaitservices.co/service/software-development/web-application"><span>Web
                                                App Development</span></a>
                                        <a
                                            href="https://metaitservices.co/service/software-development/mobile-application"><span>Mobile
                                                App Development</span></a>
                                        <a href="https://metaitservices.co/service/data-analytics/data-engineering"><span>Data
                                                Engineering</span></a>
                                        <a
                                            href="https://metaitservices.co/service/artificial-intelligence/machine-learning"><span>Machine
                                                Learning</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/service/digital-marketing/seo-services"><span>SEO
                                                / AEO / GEO</span></a>
                                        <a
                                            href="https://metaitservices.co/service/artificial-intelligence/ai-integration"><span>AI
                                                Integration</span></a>
                                        <a href="https://metaitservices.co/service/cloud-devops/cloud-solutions"><span>Cloud
                                                Solutions</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/service/digital-marketing/social-media"><span>Social
                                                Media (SMM)</span></a>
                                        <a href="https://metaitservices.co/service/digital-marketing/content-writing"><span>Content
                                                Writing</span></a>
                                        <a href="https://metaitservices.co/service/digital-marketing/website-design"><span>Web
                                                Designing</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ABOUT -->
            <div class="mega-dropdown" id="mega-about">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="mega-card">
                                <h3>See Impact!</h3>
                                <p> Start Building A Stronger Brand</p>
                                <a href="{{ route('contact-us') }}" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row g-4">
                                <h2 class="Ind-title">Meta It Services Info</h2>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Company</h5> --}}
                                    <div class="mega-links">
                                        {{-- <a href="#"><span>Who We Are</span></a>
                                        <a href="#"><span>Mission & Vision</span></a> --}}
                                        <a href="https://metaitservices.co/case-studies"><span>Case-studies</span></a>
                                        <a href="https://metaitservices.co/services"><span>Services</span></a>
                                        <a href="https://metaitservices.co/blogs"><span>Blogs</span></a>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Careers</h5> --}}
                                    <div class="mega-links">
                                        {{-- <a href="#"><span>Life at MetaIt</span></a> --}}
                                        <a href="https://metaitservices.co/blogs/write-for-us"><span>Write For
                                                Us</span></a>


                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Resources</h5> --}}
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/portfolio"><span>Portfolio</span></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    {{-- <h5 class="mega-title">Resources</h5> --}}
                                    <div class="mega-links">
                                        <a href="https://metaitservices.co/contact-us"><span>Contact Us</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    {{-- <h2 class="mega-title2">Metait Portfolio</h2> --}}

                                </div>
                                {{-- <div class="col-lg-4 col-md-6">
                                    <h2 class="mega-title2">Case Studies</h2>

                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

</nav>
</header>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        const toggler = document.querySelector('.navbar-toggler');
        const bsCollapse = new bootstrap.Collapse(navbar, {
            toggle: false
        });

        // Only toggle on button click
        toggler.addEventListener('click', function() {
            if (navbar.classList.contains('show')) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const icons = document.querySelectorAll('.mega-icon');
        const dropdowns = document.querySelectorAll('.mega-dropdown');
        const navbar = document.querySelector('.custom-navbar');

        let closeTimer;

        function closeAll() {
            dropdowns.forEach(d => d.classList.remove('show'));
            icons.forEach(icon => {
                icon.querySelector('i').style.transform = 'rotate(0deg)';
            });
        }

        icons.forEach(icon => {

            const key = icon.dataset.mega;
            const dropdown = document.getElementById('mega-' + key);
            const chevron = icon.querySelector('i');

            /* ===== DESKTOP HOVER ===== */
            icon.addEventListener('mouseenter', () => {
                if (window.innerWidth <= 991) return;
                closeAll();
                dropdown.classList.add('show');
                chevron.style.transform = 'rotate(180deg)';
            });

            icon.addEventListener('mouseleave', () => {
                if (window.innerWidth <= 991) return;
                closeTimer = setTimeout(closeAll, 200);
            });

            dropdown.addEventListener('mouseenter', () => {
                clearTimeout(closeTimer);
            });

            dropdown.addEventListener('mouseleave', () => {
                closeTimer = setTimeout(closeAll, 200);
            });

            /* ===== MOBILE CLICK ===== */
            icon.addEventListener('click', (e) => {
                if (window.innerWidth > 991) return;
                e.preventDefault();

                const isOpen = dropdown.classList.contains('show');
                closeAll();

                if (!isOpen) {
                    dropdown.classList.add('show');
                    chevron.style.transform = 'rotate(180deg)';
                    icon.closest('.nav-item').after(dropdown);
                }
            });

        });

        /* RESET ON RESIZE */
        window.addEventListener('resize', () => {
            closeAll();
            if (window.innerWidth > 991) {
                dropdowns.forEach(d => navbar.appendChild(d));
            }
        });

    });
</script>
