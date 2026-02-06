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
        },
    },
});

// ============ model js ================

// ======================== faqs js ===============================

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".faq-item").forEach((faqItem) => {
        const header = faqItem.querySelector(".faq-header");
        const icon = faqItem.querySelector(".faq-toggle i");

        if (!header || !icon) return;

        header.addEventListener("click", () => {
            const parentSection = faqItem.closest(".faq-section") || document;

            // Close others inside same section only
            parentSection.querySelectorAll(".faq-item").forEach((item) => {
                const itemIcon = item.querySelector(".faq-toggle i");

                if (item !== faqItem && itemIcon) {
                    item.classList.remove("active");
                    itemIcon.classList.remove("fa-minus");
                    itemIcon.classList.add("fa-plus");
                }
            });

            // Toggle current
            faqItem.classList.toggle("active");

            if (faqItem.classList.contains("active")) {
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            } else {
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
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

    counters.forEach((counter) => {
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
});

// ================================ offer slider ==================================

var swiper = new Swiper(".myCardSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true, // 👈 hover par pause
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

// ================== Project modal + calendar + AJAX handling ==================
(function () {
    const monthNames = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];

    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth();
    let currentDay = today.getDate();

    const calendarYearEl = document.getElementById("calendarYear");
    const calendarDaysEl = document.getElementById("calendarDays");
    const dateBtn = document.querySelector(".date-btn");

    function generateCalendar() {
        if (!calendarDaysEl) return;
        calendarDaysEl.innerHTML = "";
        if (calendarYearEl)
            calendarYearEl.innerText = `${monthNames[month]} ${year}`;

        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay(); // 0=Sunday, 1=Monday, etc.

        // Convert to Monday-based index (0=Monday, 6=Sunday)
        const startOffset = firstDay === 0 ? 6 : firstDay - 1;

        // Add empty cells before the 1st to align with calendar week
        for (let i = 0; i < startOffset; i++) {
            const emptyCell = document.createElement("div");
            emptyCell.classList.add("calendar-day", "empty");
            emptyCell.style.visibility = "hidden";
            calendarDaysEl.appendChild(emptyCell);
        }

        // Add actual day numbers
        for (let i = 1; i <= daysInMonth; i++) {
            const day = document.createElement("div");
            day.classList.add("calendar-day");
            day.innerText = i;

            if (
                i === currentDay &&
                year === today.getFullYear() &&
                month === today.getMonth()
            ) {
                day.classList.add("active");
            }

            calendarDaysEl.appendChild(day);
        }
    }

    document.addEventListener("click", function (e) {
        // calendar day click (delegation)
        if (e.target && e.target.classList.contains("calendar-day")) {
            document
                .querySelectorAll(".calendar-day")
                .forEach((d) => d.classList.remove("active"));
            e.target.classList.add("active");
            currentDay = parseInt(e.target.innerText, 10);
            if (dateBtn)
                dateBtn.innerText = `${currentDay}-${monthNames[month]}-${year}`;
            // set hidden input if present
            const sel = document.getElementById("selected_date");
            if (sel) sel.value = dateBtn ? dateBtn.innerText : "";
            const err = document.getElementById("error_selected_date");
            if (err) err.innerText = "";

            // Auto-select weekday button based on selected date
            const selectedDate = new Date(year, month, currentDay);
            const dayOfWeek = selectedDate.getDay(); // 0=Sun, 1=Mon, ..., 6=Sat
            const dayNames = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ];
            const selectedDayName = dayNames[dayOfWeek];

            // Remove active from all day buttons and select the matching one
            document
                .querySelectorAll(".day-btn")
                .forEach((b) => b.classList.remove("active"));
            const matchingDayBtn = Array.from(
                document.querySelectorAll(".day-btn"),
            ).find((btn) => btn.innerText.trim() === selectedDayName);
            if (matchingDayBtn) {
                matchingDayBtn.classList.add("active");
                const weekdayInput =
                    document.getElementById("selected_weekday");
                if (weekdayInput) weekdayInput.value = selectedDayName;
            }
        }

        // day-btn click - DISABLED: weekday is now auto-selected from calendar date
        // Users cannot manually change the day; it must match the selected date
    });

    // prev/next month
    const prevBtn = document.getElementById("prevYear");
    const nextBtn = document.getElementById("nextYear");
    if (prevBtn)
        prevBtn.addEventListener("click", function () {
            if (month === 0) {
                month = 11;
                year--;
            } else {
                month--;
            }
            generateCalendar();
        });
    if (nextBtn)
        nextBtn.addEventListener("click", function () {
            if (month === 11) {
                month = 0;
                year++;
            } else {
                month++;
            }
            generateCalendar();
        });

    generateCalendar();

    // Project modal -> Confirm modal flow
    const projectSubmitBtn = document.getElementById("projectSubmitBtn");
    const projectModalEl = document.getElementById("projectModal");
    const confirmModalEl = document.getElementById("confirmModal");
    
    let projectCaptchaRendered = false;

    // Reset state when project modal is shown (make modal reusable anywhere)
    if (projectModalEl) {
        projectModalEl.addEventListener("shown.bs.modal", function () {
            // regenerate calendar for current month/year
            today = new Date();
            year = today.getFullYear();
            month = today.getMonth();
            currentDay = today.getDate();
            generateCalendar();

            // clear previous selections/errors
            const sel = document.getElementById("selected_date");
            if (sel) sel.value = "";
            const wk = document.getElementById("selected_weekday");
            if (wk) wk.value = "";
            document
                .querySelectorAll(".calendar-day")
                .forEach((d) => d.classList.remove("active"));
            document
                .querySelectorAll(".day-btn")
                .forEach((b) => b.classList.remove("active"));
            if (dateBtn) dateBtn.innerText = "Select Date";
            [
                "error_selected_date",
                "error_weekday",
                "error_first_name",
                "error_last_name",
                "error_email",
                "error_phone",
                "error_company_name",
                "error_website_url",
                "error_message",
                "error_grecaptcha",
            ].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.innerText = "";
            });
            // reset grecaptcha if present
            if (window.grecaptcha)
                try {
                    grecaptcha.reset();
                } catch (e) { }
        });
    }
    
    // Render reCAPTCHA when confirm modal is shown
    if (confirmModalEl) {
        confirmModalEl.addEventListener("shown.bs.modal", function () {
            if (!projectCaptchaRendered && window.grecaptcha) {
                const captchaEl = document.getElementById("footerCaptcha");
                if (captchaEl && captchaEl.innerHTML === "") {
                    try {
                        grecaptcha.render("footerCaptcha", {
                            sitekey: captchaEl.getAttribute("data-sitekey"),
                        });
                        projectCaptchaRendered = true;
                    } catch (e) {
                        console.warn("Failed to render project captcha", e);
                    }
                }
            }
        });
        
        confirmModalEl.addEventListener("hidden.bs.modal", function () {
            if (window.grecaptcha) {
                try {
                    grecaptcha.reset();
                } catch (e) { }
            }
        });
    }

    function showConfirmModal() {
        // clear any previous backdrop remnants
        document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
        document.body.classList.remove("modal-open");
        document.body.style.overflow = "";
        document.body.style.paddingRight = "";

        const confirmModal = new bootstrap.Modal(confirmModalEl);
        confirmModal.show();
    }

    if (projectSubmitBtn) {
        projectSubmitBtn.addEventListener("click", function () {
            const selDate = document.getElementById("selected_date")
                ? document.getElementById("selected_date").value
                : dateBtn
                    ? dateBtn.innerText
                    : "";
            const selWeek = document.getElementById("selected_weekday")
                ? document.getElementById("selected_weekday").value
                : "";

            let valid = true;
            if (!selDate || selDate.trim() === "") {
                const err = document.getElementById("error_selected_date");
                if (err) err.innerText = "Please select a date.";
                valid = false;
            }
            if (!selWeek || selWeek.trim() === "") {
                const err = document.getElementById("error_weekday");
                if (err) err.innerText = "Please select a weekday.";
                valid = false;
            }

            if (!valid) return;

            // hide project modal then show confirm
            const projectModal =
                bootstrap.Modal.getInstance(projectModalEl) ||
                new bootstrap.Modal(projectModalEl);
            projectModal.hide();

            projectModalEl.addEventListener(
                "hidden.bs.modal",
                function handler() {
                    // populate confirm hidden inputs
                    const selInput = document.getElementById("selected_date");
                    if (selInput && dateBtn) selInput.value = dateBtn.innerText;
                    const wkInput = document.getElementById("selected_weekday");
                    if (wkInput) {
                        // find active day
                        const activeDay =
                            document.querySelector(".day-btn.active");
                        wkInput.value = activeDay
                            ? activeDay.innerText.trim()
                            : wkInput.value;
                    }

                    // Update the form subtitle with selected date and weekday
                    const formSubtitle = document.querySelector(".form-subtitle");
                    if (formSubtitle && dateBtn && wkInput) {
                        const selectedDateText = dateBtn.innerText; // e.g., "18-sep-2025"
                        const selectedWeekday = wkInput.value; // e.g., "Monday"
                        formSubtitle.innerHTML = `${selectedWeekday}, ${selectedDateText}<a href="#" class="edit-link">Edit</a>`;
                    }

                    showConfirmModal();
                    projectModalEl.removeEventListener(
                        "hidden.bs.modal",
                        handler,
                    );
                },
            );
        });
    }

    // Back button on confirm modal - go back to project modal
    const confirmBackBtn = document.getElementById("confirmBackBtn");
    if (confirmBackBtn) {
        confirmBackBtn.addEventListener("click", function () {
            const confirmModal =
                bootstrap.Modal.getInstance(confirmModalEl) ||
                new bootstrap.Modal(confirmModalEl);
            confirmModal.hide();

            confirmModalEl.addEventListener(
                "hidden.bs.modal",
                function handler() {
                    // show project modal again
                    const projectModal = new bootstrap.Modal(projectModalEl);
                    projectModal.show();
                    confirmModalEl.removeEventListener(
                        "hidden.bs.modal",
                        handler,
                    );
                },
            );
        });
    }

    // Edit link on confirm modal - go back to project modal
    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("edit-link")) {
            e.preventDefault();
            const confirmModal =
                bootstrap.Modal.getInstance(confirmModalEl) ||
                new bootstrap.Modal(confirmModalEl);
            confirmModal.hide();

            confirmModalEl.addEventListener(
                "hidden.bs.modal",
                function handler() {
                    // show project modal again
                    const projectModal = new bootstrap.Modal(projectModalEl);
                    projectModal.show();
                    confirmModalEl.removeEventListener(
                        "hidden.bs.modal",
                        handler,
                    );
                },
            );
        }
    });

    // Form submission via AJAX
    const projectForm = document.getElementById("projectConfirmForm");
    if (projectForm) {
        projectForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // clear previous errors
            [
                "first_name",
                "last_name",
                "email",
                "phone",
                "company_name",
                "website_url",
                "message",
                "g-recaptcha-response",
            ].forEach((k) => {
                const el = document.getElementById(
                    "error_" + k.replace(/\-/g, "_"),
                );
                if (el) el.innerText = "";
            });

            const formData = new FormData(projectForm);
            // add grecaptcha value if exists
            if (window.grecaptcha) {
                const resp = grecaptcha.getResponse();
                formData.set("g-recaptcha-response", resp);
            }

            // CSRF
            const token = document.querySelector('meta[name="csrf-token"]')
                ? document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content")
                : null;

            fetch("/ajax/project/submit", {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token,
                },
                body: formData,
            })
                .then(async (res) => {
                    if (res.status === 422) {
                        const data = await res.json();
                        if (data.errors) {
                            Object.keys(data.errors).forEach((key) => {
                                const rid = "error_" + key.replace(/\./g, "_");
                                const el =
                                    document.getElementById(rid) ||
                                    document.getElementById(
                                        "error_" + key.replace(/\-/g, "_"),
                                    );
                                if (el)
                                    el.innerText = Array.isArray(
                                        data.errors[key],
                                    )
                                        ? data.errors[key][0]
                                        : data.errors[key];
                            });
                        }
                        // reset captcha
                        if (window.grecaptcha)
                            try {
                                if (
                                    qCaptchaWidget !== null &&
                                    typeof grecaptcha.reset === "function"
                                ) {
                                    grecaptcha.reset(qCaptchaWidget);
                                } else {
                                    grecaptcha.reset();
                                }
                            } catch (e) { }
                        // show toastr error
                        if (typeof toastr !== "undefined")
                            toastr.error(
                                "Please correct the errors and try again.",
                            );
                        return Promise.reject("validation");
                    }

                    if (!res.ok) {
                        if (typeof toastr !== "undefined")
                            toastr.error(
                                "An error occurred. Please try again.",
                            );
                        return Promise.reject("network");
                    }
                    return res.json();
                })
                .then((json) => {
                    // Show success toast
                    if (typeof toastr !== "undefined" && json.message) {
                        toastr.success(json.message);
                    }

                    // success: reset forms and modals
                    projectForm.reset();
                    const sel = document.getElementById("selected_date");
                    if (sel) sel.value = "";
                    const wk = document.getElementById("selected_weekday");
                    if (wk) wk.value = "";
                    document
                        .querySelectorAll(".calendar-day")
                        .forEach((d) => d.classList.remove("active"));
                    document
                        .querySelectorAll(".day-btn")
                        .forEach((b) => b.classList.remove("active"));
                    if (dateBtn) dateBtn.innerText = "Select Date";

                    if (window.grecaptcha)
                        try {
                            grecaptcha.reset();
                        } catch (e) { }

                    // Close both modals properly and cleanup
                    const confirmModal =
                        bootstrap.Modal.getInstance(confirmModalEl);
                    if (confirmModal) confirmModal.hide();

                    const projectModal =
                        bootstrap.Modal.getInstance(projectModalEl);
                    if (projectModal) projectModal.hide();

                    // Remove all modal backdrops and reset body
                    setTimeout(() => {
                        document
                            .querySelectorAll(".modal-backdrop")
                            .forEach((b) => b.remove());
                        document.body.classList.remove("modal-open");
                        document.body.style.overflow = "";
                        document.body.style.paddingRight = "";
                    }, 300);
                })
                .catch((err) => {
                    // keep modal open on validation/network errors
                    console.warn(err);
                });
        });
    }

    // ---------------- Question modal AJAX + client-side validation ----------------
    const questionForm = document.getElementById("questionForm");
    const questionModalEl = document.getElementById("questionModal");

    let qCaptchaWidget = null;
    const qCaptchaEl = document.getElementById("questionCaptcha");

    function renderQuestionCaptcha() {
        if (!qCaptchaEl) return;

        if (window.grecaptcha && qCaptchaWidget === null) {
            try {
                qCaptchaWidget = grecaptcha.render(qCaptchaEl, {
                    sitekey: qCaptchaEl.getAttribute("data-sitekey"),
                });
            } catch (e) {
                console.warn("Failed to render captcha", e);
            }
        }
    }

    if (questionModalEl) {
        questionModalEl.addEventListener("shown.bs.modal", function () {
            renderQuestionCaptcha();
        });

        questionModalEl.addEventListener("hidden.bs.modal", function () {
            if (window.grecaptcha && qCaptchaWidget !== null) {
                grecaptcha.reset(qCaptchaWidget);
            }
        });
    }

    if (!questionForm) return;

    questionForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // ---------------- Clear previous errors ----------------
        ["name", "country", "email", "message", "grecaptcha"].forEach((k) => {
            const el = document.getElementById("error_" + k);
            if (el) el.innerText = "";
        });

        let valid = true;

        // ---------------- Required fields validation ----------------
        questionForm.querySelectorAll(".required").forEach((input) => {
            if (!input.value.trim()) {
                valid = false;
                const errEl = document.getElementById("error_" + input.name);
                if (errEl) errEl.innerText = "This field is required.";
            }
        });

        // ---------------- reCAPTCHA validation ----------------
        if (!window.grecaptcha || qCaptchaWidget === null) {
            valid = false;
            document.getElementById("error_grecaptcha").innerText =
                "Captcha not loaded. Please try again.";
        } else {
            const captchaResponse = grecaptcha.getResponse(qCaptchaWidget);
            if (!captchaResponse) {
                valid = false;
                document.getElementById("error_grecaptcha").innerText =
                    "Please complete the captcha.";
            }
        }

        if (!valid) {
            toastr.error("Please correct the errors and try again.");
            return;
        }

        // ---------------- Prepare form data ----------------
        const formData = new FormData(questionForm);
        formData.set(
            "g-recaptcha-response",
            grecaptcha.getResponse(qCaptchaWidget),
        );
        
        // Add checkbox value (0 if unchecked, 1 if checked)
        const agreeCheckbox = document.getElementById('agree');
        formData.set('agree', agreeCheckbox && agreeCheckbox.checked ? '1' : '0');

        const token = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");

        fetch("/ajax/question/submit", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            body: formData,
        })
            .then(async (res) => {
                if (res.status === 422) {
                    const data = await res.json();

                    if (data.errors) {
                        Object.keys(data.errors).forEach((key) => {
                            const id =
                                key === "g-recaptcha-response"
                                    ? "error_grecaptcha"
                                    : "error_" + key;
                            const el = document.getElementById(id);
                            if (el) el.innerText = data.errors[key][0];
                        });
                    }

                    // Reset captcha on validation error
                    if (window.grecaptcha && qCaptchaWidget !== null) {
                        try {
                            grecaptcha.reset(qCaptchaWidget);
                        } catch (e) {
                            console.warn('Error resetting captcha on error', e);
                        }
                    }
                    toastr.error("Please correct the errors and try again.");
                    throw "validation";
                }

                if (!res.ok) {
                    toastr.error("An error occurred. Please try again.");
                    throw "network";
                }

                return res.json();
            })
            .then((json) => {
                toastr.success(json.message);

                // Reset form and captcha
                questionForm.reset();

                // Reload page after 2 seconds (2000 milliseconds)
                setTimeout(() => {
                    window.location.reload();
                }, 1000);

                // Clear captcha widget and DOM so it can be re-rendered on next open
                if (window.grecaptcha && qCaptchaWidget !== null) {
                    try {
                        grecaptcha.reset(qCaptchaWidget);
                    } catch (e) {
                        console.warn('Error resetting captcha', e);
                    }
                }
                qCaptchaWidget = null; // Allow re-render next time modal opens
                if (qCaptchaEl) qCaptchaEl.innerHTML = ''; // Clear captcha div

                // Hide modal
                const modal = bootstrap.Modal.getInstance(questionModalEl);
                if (modal) modal.hide();

                // Properly cleanup modal state, backdrops, and body styles after modal hides
                setTimeout(() => {
                    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                }, 300);
            })
            .catch((err) => {
                console.warn(err);
            });
    });
})();
