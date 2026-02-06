<style>
    /* ==================== career section css ======================= */

    .career-section {
        background: #FAFBFB;
        font-family: Inter;
    }

    /* Heading */
    .career-heading {
        font-size: 55px;
        font-weight: 800;
        /* extra bold */
        line-height: 64px;
        color: #000;
    }

    /* Description */
    .career-desc {
        font-size: 20px;
        line-height: 174%;
        font-weight: 400;
        color: #000000;
    }

    /* Card */
    .career-card {
        width: 100%;
        max-width: 509px;
        height: 274px;
        background: #FFFFFF;
        border-radius: 5px;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* border: 1px solid #000000; */
        box-shadow: 0 0 25.9px rgba(0, 0, 0, 0.3);
    }

    .career-card-red {
        width: 100%;
        max-width: 509px;
        height: 274px;
        background: #F38B5C;
        border-radius: 5px;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* border: 1px solid #000000; */
        box-shadow: 0 0 25.9px rgba(0, 0, 0, 0.3);
    }

    /* Card Heading */
    .career-card h3 {
        font-size: 30px;
        font-weight: 700;
        line-height: 41px;
        letter-spacing: 0;
        color: #000000;
        max-width: 366px;
    }

    .career-card-red h3 {
        font-size: 30px;
        font-weight: 700;
        line-height: 41px;
        letter-spacing: 0;
        color: #000000;
        max-width: 366px;
    }

    /* Button */
    .join-btn {
        width: 226px;
        height: 56px;
        background: #F38B5C;
        border-radius: 14px;
        color: #000000;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
        line-height: 41px;
        letter-spacing: 0;
    }

    .join-black {
        width: 226px;
        height: 56px;
        background: #404959;
        border-radius: 14px;
        color: #ffffff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
        line-height: 41px;
        letter-spacing: 0;
    }

    .join-btn:hover {
        background: #e6794a;
        color: #fff;
    }

    /* ===================== brand slider ====================== */

    .brand-section {
        background: #FAFBFB;
    }

    .brand-item {
        height: 120px;
        width: 200px;
        background: transparent;
        border-radius: 10px;
        /* box-shadow: 0 0 25px rgba(0, 0, 0, 0.08); */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-item img {
        height: 100%;
        width: 100%;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.8;
        transition: 0.3s ease;
    }

    .brand-item:hover img {
        filter: grayscale(0);
        opacity: 1;
    }
</style>

<section class="career-section py-5">
    <div class="container">
        <!-- TOP ROW -->
        <div class="row align-items-center mb-5">
            <!-- LEFT -->
            <div class="col-lg-6">
                <h2 class="career-heading">
                    Committed staff are <br>
                    Ready to help you.
                </h2>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">
                <p class="career-desc">
                    Our team is built with passionate professionals who are dedicated
                    to delivering excellence. We believe in collaboration, innovation,
                    and continuous growth. Join a workplace where your skills are valued,
                    your ideas matter, and your career moves forward with confidence.
                </p>
            </div>
        </div>

        <!-- CARDS ROW -->
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="career-card ">
                    <h3>Build a greatest career with crafto marketing</h3>
                    <a href="#" class="join-btn">Join With Us</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-card-red ">
                    <h3>Build a greatest career with crafto marketing</h3>
                    <a href="#" class="join-black">Join With Us</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-card">
                    <h3>Build a greatest career with crafto marketing</h3>
                    <a href="#" class="join-btn">Join With Us</a>
                </div>
            </div>
        </div>
    </div>

    <section class="brand-section pt-2 mt-2">
        <div class="container">
            <div class="swiper brandSwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/paypal/000000" alt="PayPal">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/walmart/000000" alt="Walmart">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/amazon/000000" alt="Amazon">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/google/000000" alt="Google">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/microsoft/000000" alt="Microsoft">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/shopify/000000" alt="Shopify">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/netflix/000000" alt="Netflix">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/spotify/000000" alt="Spotify">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/meta/000000" alt="Meta">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/slack/000000" alt="Slack">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/intel/000000" alt="Intel">
                    </div>

                    <div class="swiper-slide brand-item">
                        <img src="https://cdn.simpleicons.org/adobe/000000" alt="Adobe">
                    </div>

                </div>
            </div>
        </div>
    </section>


</section>

<script></script>
