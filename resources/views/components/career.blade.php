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
        /* background: #FFFFFF; */
        border-radius: 5px;
        padding: 30px;
        /* display: flex;
        flex-direction: column;
        justify-content: space-between; */
        /* border: 1px solid #000000; */
        box-shadow: 0 0 25.9px rgba(0, 0, 0, 0.3);
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;

        position: relative;
        box-sizing: border-box;
    }

    .career-card-red {
        width: 100%;
        max-width: 509px;
        height: 274px;

        border-radius: 5px;
        padding: 30px;

        /* display: flex;
        flex-direction: column;
        justify-content: space-between; */

        box-shadow: 0 0 25.9px rgba(0, 0, 0, 0.3);

        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;

        box-sizing: border-box;
        position: relative;

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
        position: absolute;
        bottom: 20px;
        transition: all 0.4s ease-in-out;

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
        position: absolute;
        bottom: 20px;
        transition: all 0.4s ease-in-out;
    }

    .join-black:hover {
        background: #303742;

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
                    Meta IT’s Marketing Pros <br> Ready To Level Up Your Brand!
                </h2>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">
                <p class="career-desc">
                    From social media strategy to novel AI-powered solutions, Meta IT harnesses fresher ways to dominate
                    industries on the web. Create a brand that is impossible to ignore.

                </p>
            </div>
        </div>

        <!-- CARDS ROW -->
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="career-card " style="background-image: url('{{ asset('frontend/images/bg-w-img.png') }}');">
                    <h3>Digital Marketing Consultation</h3>
                    <a href="#" class="join-btn">Join With Us</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="career-card-red"
                    style="background-image: url('{{ asset('frontend/images/bg-red.png') }}');">
                    <h3>AI-Powered Solutions</h3>
                    <a href="#" class="join-black">Discover more</a>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="career-card " style="background-image: url('{{ asset('frontend/images/bg-w-img.png') }}');">
                    <h3>Elevate Digital Presence
                    </h3>
                    <a href="#" class="join-btn">Connect now</a>
                </div>
            </div>
        </div>
    </div>

    @if (isset($brands) && $brands->count() > 0)
        <section class="brand-section py-5 my-3">
            <div class="container">
                <div class="swiper brandSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($brands as $brand)
                            <div class="swiper-slide brand-item">
                                <img src="{{ $brand->logo ? asset('storage/brands-we-carry/' . $brand->logo) : 'https://cdn.simpleicons.org/paypal/000000' }}"
                                    alt="{{ $brand->logo_alt ?? $brand->company_name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

</section>

<script></script>
