<style>
    /* =====================project-section========================= */

    .project-section {
        background: rgba(244, 139, 92, 0.25);
        padding: 40px 0;
        font-family: Inter, sans-serif;
        margin-top: 20px;
    }

    /* HEADING */
    .project-heading {
        font-size: 55px;
        font-weight: 700;
        line-height: 59px;
        letter-spacing: 0;
        color: #000000;
        margin-bottom: 20px;
    }

    /* DESCRIPTION */
    .project-desc {
        font-size: 25px;
        font-weight: 400;
        line-height: 160%;
        max-width: 811px;
        margin: 0 auto 40px;
        color: #404959;
    }

    /* BUTTON */
    .contact-btn {
        width: 279px;
        height: 67px;
        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(90deg, #FF6036, #404959);
        border-radius: 12px;

        font-size: 28px;
        font-weight: 700;
        line-height: 25px;
        color: #ffffff;
        text-decoration: none;

        transition: all 0.3s ease;
    }

    .contact-btn:hover {
        transform: translateY(-2px);
        opacity: 0.95;
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .project-heading {
            font-size: 42px;
            line-height: 52px;
        }

        .project-desc {
            font-size: 20px;
        }

        .contact-btn {
            width: 100%;
            max-width: 320px;
            font-size: 22px;
        }
    }
</style>

{{-- ====================== project-section ========================= --}}


<section class="project-section">
    <div class="container text-center">

        <h2 class="project-heading">
            Have A Project In Mind?
        </h2>

        <p class="project-desc">
            We help brands turn ideas into impactful digital experiences.
            Our team delivers scalable, data-driven solutions tailored to
            your business goals and long-term growth.
        </p>

        <a href="#" class="contact-btn">
            Contact Us
        </a>

    </div>
</section>
