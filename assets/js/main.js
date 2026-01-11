document.addEventListener("DOMContentLoaded", function () {
    const $ = jQuery;

    /**
     * Logic for multi-level menus in Bootstrap 5.
     */
    function setupMultiLevelMenu() {
        // Prevents the parent menu from closing when a nested dropdown is clicked.
        // Works on both desktop and mobile.
        $(".gbyte-header__menu .dropdown-menu .dropdown-toggle").on("click", function (e) {
            e.stopPropagation();
        });

        // Submenu animation on mobile is now handled by CSS.
    }
    setupMultiLevelMenu();

    /**
     * Optimized scroll handler for the site header.
     * Uses requestAnimationFrame for performance and simplified logic.
     */
    function setupHeaderScroll() {
        const $header = $(".gbyte-header");
        const $body = $("body");

        if (!$header.length) return;

        // On pages other than home, just add the class and finish.
        if (!$body.hasClass("home")) {
            $header.addClass("gbyte-header--scrolled").removeClass("fixed-top").addClass("sticky-top");
            return;
        }

        // Homepage-specific logic
        const $heroSection = $(".gbyte-hero");
        if (!$heroSection.length) return;

        let heroHeight = $heroSection.height();
        let lastScrollY = 0;
        let ticking = false;

        function updateHeader() {
            const isHeroScrolling = lastScrollY > 0 && lastScrollY <= heroHeight;
            const isScrolledPastHero = lastScrollY > heroHeight;

            // Use toggleClass for cleaner logic
            $header.toggleClass("gbyte-header--hero-scrolling", isHeroScrolling);
            $header.toggleClass("gbyte-header--scrolled", isScrolledPastHero);

            ticking = false;
        }

        // Update hero height on resize
        $(window).on("resize", function () {
            heroHeight = $heroSection.height();
        });

        // Listen to scroll events
        $(window).on("scroll", function () {
            lastScrollY = $(this).scrollTop();
            if (!ticking) {
                window.requestAnimationFrame(updateHeader);
                ticking = true;
            }
        });
    }
    setupHeaderScroll();

    /**
     * Initialize Swiper.js carousel.
     */
    function setupImageCarousel() {
        // Check if a carousel element exists on the page
        const $carousel = $(".gbyte-carousel__slider");
        if ($carousel.length) {
            const rootStyles = getComputedStyle(document.documentElement);
            const offsetBeforeRem = rootStyles.getPropertyValue("--swiper-offset-before").trim() || "1.875rem";
            const offsetAfterRem = rootStyles.getPropertyValue("--swiper-offset-after").trim() || "1.875rem";

            // Transform to pixels
            const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
            const offsetBeforePx = parseFloat(offsetBeforeRem) * rootFontSize;
            const offsetAfterPx = parseFloat(offsetAfterRem) * rootFontSize;

            const swiper = new Swiper(".gbyte-carousel__slider", {
                // Optional parameters
                loop: false, // Disable loop to use slidesOffsetBefore
                autoplay: false, // Optional
                slidesOffsetBefore: offsetBeforePx,
                slidesOffsetAfter: offsetAfterPx,
                slidesPerView: 2.5, // Default number of slides (mobile)
                spaceBetween: 15, // Space between slides (mobile)

                // Hide pagination and enable arrows
                pagination: {
                    el: ".gbyte-carousel__pagination",
                    type: "progressbar",
                },
                navigation: {
                    nextEl: ".gbyte-carousel__nav-btn--next",
                    prevEl: ".gbyte-carousel__nav-btn--prev",
                },

                // Responsive settings
                breakpoints: {
                    768: {
                        // For tablet
                        slidesPerView: 4.5,
                        spaceBetween: 15,
                    },
                    992: {
                        // For desktop
                        slidesPerView: 5.5,
                        spaceBetween: 15,
                    },
                },
            });
        }
    }
    setupImageCarousel();

    /**
     * Initialize scroll animations (Intersection Observer).
     */
    function setupScrollAnimations() {
        const $animatedElements = $(".gbyte-image-collage");

        if (!$animatedElements.length) {
            return;
        }

        function checkVisibility() {
            const windowTop = $(window).scrollTop();
            const windowHeight = $(window).height();
            const windowBottom = windowTop + windowHeight;

            $animatedElements.each(function () {
                const $el = $(this);

                // Check if the element already has the class to avoid re-animation
                if ($el.hasClass("is-visible")) {
                    return;
                }

                const elementTop = $el.offset().top;
                // Trigger the animation when 10% of the element appears on the screen
                const triggerPoint = elementTop + $el.height() * 0.1;

                if (triggerPoint < windowBottom) {
                    $el.addClass("is-visible");
                }
            });
        }

        // Run the check on page load and on every scroll
        $(window).on("scroll resize", checkVisibility);
        checkVisibility(); // Check immediately on load
    }
    setupScrollAnimations();

    /**
     * Adds an SVG icon to the submit button in Contact Form 7.
     * CF7 defaults to an <input type="submit">, which cannot contain an SVG.
     * This script replaces it with a <button>, preserving all classes and adding the icon.
     */
    function addSvgToCf7Button() {
        const $submitInput = $('.gbyte-form input[type="submit"]');

        if ($submitInput.length) {
            const buttonText = $submitInput.val();
            const buttonClasses = $submitInput.attr("class");
            const svgIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#ffffff;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>';

            // Create a new <button> element
            const $newButton = $('<button type="submit" class="' + buttonClasses + '"></button>');

            // Set the content of the new button (text + SVG)
            $newButton.html("<span>" + buttonText + "</span> " + svgIcon);

            // Replace the old <input> with the new <button>
            $submitInput.replaceWith($newButton);
        }
    }
    addSvgToCf7Button();

    /**
     * Logic for the custom file input field.
     * Updates the label text with the name of the selected file.
     */
    function setupCustomFileInput() {
        // Iterate through each wrapper to maintain context for the input and label
        $(".gbyte-file-upload-wrapper").each(function () {
            const $wrapper = $(this);
            const $input = $wrapper.find('input[type="file"]');
            const $textElement = $wrapper.find(".gbyte-file-upload-text");

            // Check if both elements are found
            if (!$input.length || !$textElement.length) return;

            const originalText = $textElement.text();

            $input.on("change", function (e) {
                const file = e.target.files[0];
                const fileName = file ? file.name : originalText;
                $textElement.text(fileName);
            });
        });
    }
    setupCustomFileInput();

    /**
     * Smooth scroll to the next section on hero button click.
     */
    function setupHeroScrollButton() {
        const $scrollButton = $(".js-scroll-to-next-section");

        if ($scrollButton.length) {
            $scrollButton.on("click", function (e) {
                e.preventDefault();
                const $target = $(".gbyte-hero").next("section"); // Target the main content of the page
                if ($target.length) {
                    $("html, body").animate(
                        {
                            scrollTop: $target.offset().top,
                        },
                        800
                    ); // Animation duration in ms
                }
            });
        }
    }
    setupHeroScrollButton();

    /**
     * Sets the header height as a CSS variable (--header-height).
     * This allows for precise calculations in CSS, e.g., height: calc(100vh - var(--header-height)).
     */
    function setHeaderHeightProperty() {
        const $header = $(".gbyte-header");
        if ($header.length) {
            // Use outerHeight() to include padding
            const headerHeight = $header.outerHeight();
            $("html").css("--header-height", `${headerHeight}px`);
        }
    }
    // Run on page load and on window resize
    $(window).on("load resize", setHeaderHeightProperty);
    setHeaderHeightProperty(); // Run immediately

    /**
     * Logic for the "sticky" apply bar on the job offer page.
     * The bar is visible at the bottom of the screen only when the main content of the offer is visible.
     */
    function setupStickyApplyBar() {
        const $contentToObserve = $(".gbyte-single-job-offer__content");
        const $stickyWrapper = $(".gbyte-single-job-offer__sidebar-wrapper");

        if (!$contentToObserve.length || !$stickyWrapper.length) {
            return;
        }

        // Use IntersectionObserver only for mobile logic
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    // Mobile logic: observe content and show the bar when visible
                    if (window.innerWidth < 992) {
                        if (entry.target === $contentToObserve[0]) {
                            $stickyWrapper.toggleClass("is-visible", entry.isIntersecting);
                        }
                    }
                });
            },
            // Threshold 0 means the event fires as soon as the first pixel of the element appears in view
            { root: null, threshold: [0, 0.1] }
        );

        observer.observe($contentToObserve[0]); // Always observe content for mobile logic
    }
    setupStickyApplyBar();

    /**
     * Handles Contact Form 7 validation errors to perfectly align floating labels.
     * When a validation error appears, it pushes the label down. This script calculates
     * the error message's height and sets a CSS variable to compensate for the shift.
     */
    function setupCf7LabelCorrection() {
        const forms = document.querySelectorAll(".wpcf7-form");
        const root = document.documentElement;

        forms.forEach((form) => {
            const handleValidation = () => {
                const firstErrorSpan = form.querySelector(".wpcf7-not-valid-tip");
                if (firstErrorSpan) {
                    // Get styles to access margins
                    const style = window.getComputedStyle(firstErrorSpan);
                    const marginTop = parseFloat(style.marginTop);
                    const marginBottom = parseFloat(style.marginBottom);
                    // Calculate full height: offsetHeight (content + padding + border) + margins
                    const totalHeight = firstErrorSpan.offsetHeight + marginTop + marginBottom;
                    root.style.setProperty("--error-span-height", `${totalHeight}px`);
                } else {
                    root.style.setProperty("--error-span-height", "0px");
                }
            };

            // Use MutationObserver to track "live" changes in the form
            // (appearance and disappearance of error messages).
            const observer = new MutationObserver(() => {
                // On every DOM change in the form, give the browser a moment
                // to recalculate layout and run our check function.
                // Debounce to avoid multiple calls.
                clearTimeout(form.debounceTimer);
                form.debounceTimer = setTimeout(handleValidation, 50);
            });

            // Start observing the form
            observer.observe(form, {
                childList: true, // Observe addition/removal of elements
                subtree: true, // Observe also in nested elements
            });

            // Additionally, run the check function after CF7 events
            form.addEventListener("wpcf7invalid", () => {
                setTimeout(handleValidation, 50);
            });

            form.addEventListener("wpcf7mailsent", () => {
                setTimeout(handleValidation, 50);
            });
        });
    }

    // Run the setup function.
    setupCf7LabelCorrection();

    /**
     * Handles the "expand" functionality for long consent texts in forms.
     * After expanding the text, the button disappears.
     */
    function setupConsentToggle() {
        $(".consent-toggle-button").on("click", function (e) {
            e.preventDefault(); // Prevent the default link action

            const $button = $(this);
            const $hiddenText = $button.siblings(".consent-hidden-text");

            $hiddenText.slideDown(200); // Expand the hidden text
            $button.hide(); // Hide the button
        });
    }
    setupConsentToggle();
});
