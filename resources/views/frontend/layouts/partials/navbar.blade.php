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
        transition: transform 0.3s ease;
        font-size: 16px;
        font-weight: 700;
        line-height: 140%;
        letter-spacing: 0;
        font-family: Inter;
    }

    /* hover effect */
    .mega-links a:hover span {
        transform: translateX(6px);
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
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container  position-relative">
        <a class="navbar-brand nav-logo-wrap" href="{{ route('home') }}">
            <img src="{{ asset('storage/' . setting('site_logo', 'frontend/images/logo.png')) }}" alt="{{ setting('site_name') }}" class="nav-logo">
        </a>

        <button class="navbar-toggler ms-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mega-item">
                    <a class="nav-link mega-trigger" href="#">
                        Home
                    </a>
                </li>
                <li class="nav-item mega-item" data-mega="industry">
                    <a class="nav-link mega-trigger" href="{{ route('industries') }}">
                        Industry <i class="fas fa-chevron-down"></i>
                    </a>
                </li>

                <li class="nav-item mega-item" data-mega="services">
                    <a class="nav-link mega-trigger" href="{{ route('services') }}">
                        Services <i class="fas fa-chevron-down"></i>
                    </a>
                </li>

                <li class="nav-item mega-item" data-mega="about">
                    <a class="nav-link mega-trigger" href="{{ route('about-us') }}">
                        About MetaIt <i class="fas fa-chevron-down"></i>
                    </a>
                </li>
            </ul>

            <div class="">
                <a href="{{ route('contact-us') }}" class="btn btn-contact">Contact</a>
            </div>

            <!-- ============ MEGA DROPDOWNS ============ -->

            <!-- INDUSTRY -->


            <!-- INDUSTRY -->
            <div class="mega-dropdown" id="mega-industry">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="mega-card">
                                <h3>Get Growing!</h3>
                                <p>Make Your Business Impossible To Ignore</p>
                                <a href="#" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row">
                                <h2 class="Ind-title">Industries We Serves</h2>
                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Industries</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Healthcare</span></a>
                                        <a href="#"><span>Finance</span></a>
                                        <a href="#"><span>E-Commerce</span></a>
                                        <a href="#"><span>Education</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Enterprise</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Retail</span></a>
                                        <a href="#"><span>Manufacturing</span></a>
                                        <a href="#"><span>Logistics</span></a>
                                        <a href="#"><span>Real Estate</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Startup</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>MVP Development</span></a>
                                        <a href="#"><span>Product Design</span></a>
                                        <a href="#"><span>Scaling</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Startup</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>MVP Development</span></a>
                                        <a href="#"><span>Product Design</span></a>
                                        <a href="#"><span>Scaling</span></a>
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
                                <h3>Get Growing!</h3>
                                <p>Make Your Business Impossible To Ignore</p>
                                <a href="#" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Software Development</h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Marketing</h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Advanced Tech</h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Software Development</h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Marketing</h5>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Advanced Tech</h5>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <h2 class="Ind-title">Choose Yours</h2>

                                <div class="col-lg-4 col-md-6">

                                    <h5 class="mega-title">Software Development</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Web App Development</span></a>
                                        <a href="#"><span>Mobile App Development</span></a>
                                        <a href="#"><span>Mulesoft</span></a>
                                        <a href="#"><span>Payment Integrations</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Marketing</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>SEO / AEO / GEO</span></a>
                                        <a href="#"><span>Graphic Designing</span></a>
                                        <a href="#"><span>Content Writing</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h5 class="mega-title">Advanced Tech</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Blockchain</span></a>
                                        <a href="#"><span>IoT</span></a>
                                        <a href="#"><span>Web 3</span></a>
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
                                <h3>Get Growing!</h3>
                                <p>Make Your Business Impossible To Ignore</p>
                                <a href="#" class="talk-btn">Let’s Talk</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="row g-4">
                                <h2 class="Ind-title">Meta It Services Info</h2>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Company</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Who We Are</span></a>
                                        <a href="#"><span>Mission & Vision</span></a>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Careers</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Life at MetaIt</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Resources</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Blogs</span></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h5 class="mega-title">Resources</h5>
                                    <div class="mega-links">
                                        <a href="#"><span>Blogs</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h2 class="mega-title2">Metait Portfolio</h2>

                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h2 class="mega-title2">Case Studies</h2>

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

        const navbar = document.querySelector('.custom-navbar');
        const navItems = document.querySelectorAll('.mega-item');
        const dropdowns = document.querySelectorAll('.mega-dropdown');

        let hoverTimer = null;
        let closeTimer = null;

        function closeAll() {
            dropdowns.forEach(d => d.classList.remove('show'));
            navItems.forEach(item => {
                const icon = item.querySelector('i');
                if (icon) icon.style.transform = 'rotate(0deg)';
            });
        }

        function openDropdown(item) {
            const key = item.dataset.mega;
            const dropdown = document.getElementById('mega-' + key);
            const icon = item.querySelector('i');

            if (!dropdown) return;

            closeAll();
            dropdown.classList.add('show');
            if (icon) icon.style.transform = 'rotate(180deg)';

            /* 📱 Mobile / MD → Services ke bilkul neeche */
            if (window.innerWidth <= 991) {
                item.after(dropdown);
            }
        }

        /* ================= DESKTOP HOVER ================= */

        navItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                if (window.innerWidth <= 991) return;

                clearTimeout(hoverTimer);
                hoverTimer = setTimeout(() => {
                    openDropdown(item);
                }, 150);
            });

            item.addEventListener('mouseleave', () => {
                if (window.innerWidth <= 991) return;
                closeTimer = setTimeout(closeAll, 150);
            });
        });

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('mouseenter', () => clearTimeout(closeTimer));
            dropdown.addEventListener('mouseleave', () => closeTimer = setTimeout(closeAll, 150));
        });

        /* ================= MOBILE CLICK ================= */

        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                if (window.innerWidth > 991) return;

                e.preventDefault();

                const key = item.dataset.mega;
                const dropdown = document.getElementById('mega-' + key);
                const icon = item.querySelector('i');

                const isOpen = dropdown.classList.contains('show');
                closeAll();

                if (!isOpen) {
                    dropdown.classList.add('show');
                    if (icon) icon.style.transform = 'rotate(180deg)';
                    item.after(dropdown);
                }
            });
        });

        /* ================= RESIZE RESET ================= */

        window.addEventListener('resize', () => {
            closeAll();

            if (window.innerWidth > 991) {
                dropdowns.forEach(d => navbar.appendChild(d));
            }
        });

    });
</script>
