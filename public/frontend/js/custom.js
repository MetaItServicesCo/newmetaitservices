//================ brand slidder ==========================

var swiper = new Swiper(".brandSwiper", {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    speed: 4000, // smooth continuous speed
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },
    allowTouchMove: false, // auto slide only
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        576: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        }
    }
});


// ============ model js ================


// ======================== faqs js ===============================

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.faq-item').forEach(faqItem => {

        const header = faqItem.querySelector('.faq-header');
        const icon = faqItem.querySelector('.faq-toggle i');

        if (!header || !icon) return;

        header.addEventListener('click', () => {

            const parentSection = faqItem.closest('.faq-section') || document;

            // Close others inside same section only
            parentSection.querySelectorAll('.faq-item').forEach(item => {
                const itemIcon = item.querySelector('.faq-toggle i');

                if (item !== faqItem && itemIcon) {
                    item.classList.remove('active');
                    itemIcon.classList.remove('fa-minus');
                    itemIcon.classList.add('fa-plus');
                }
            });

            // Toggle current
            faqItem.classList.toggle('active');

            if (faqItem.classList.contains('active')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            }

        });
    });

});


// =================================== revenue js ===========================================

const impactSwiper = new Swiper(".impactSwiper", {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    navigation: {
        nextEl: ".impact-next",
        prevEl: ".impact-prev",
    },
    speed: 600,
});

//  ===================================== counter js =============================================


document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");

    counters.forEach(counter => {
        const target = +counter.getAttribute("data-target");
        let count = 0;
        const speed = 200; // lower = faster

        const updateCount = () => {
            const increment = target / speed;

            if (count < target) {
                count += increment;
                counter.innerText = Math.ceil(count);
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
})


// ================================ offer slider ==================================


var swiper = new Swiper(".myCardSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,  // 👈 hover par pause
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        },
    },
});