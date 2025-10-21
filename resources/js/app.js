import "./bootstrap";

import Alpine from "alpinejs";
import AOS from "aos";
import "aos/dist/aos.css";

window.Alpine = Alpine;

Alpine.start();

// Auto-annotate public UI cards/components with AOS, skip when admin marks data-no-aos
document.addEventListener("DOMContentLoaded", () => {
    // Set --vh to handle mobile dynamic viewport height (address 100vh issues on mobile)
    const setVh = () => {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    };
    setVh();
    window.addEventListener('resize', setVh);
    const root = document.body;
    if (root && root.hasAttribute("data-no-aos")) {
        return; // Do not enable AOS on admin portal
    }

    // Persistent safety CSS: keep elements visible until we actively enable AOS hiding
    const safetyStyle = document.createElement("style");
    safetyStyle.id = "aos-safety-style";
    safetyStyle.textContent = `body:not(.aos-active) [data-aos]{opacity:1!important;transform:none!important}`;
    document.head.appendChild(safetyStyle);

    // Selectors for card-like components across pages
    const selectors = [
        // Only include valid CSS selectors (avoid Tailwind classes with `/` which break querySelector)
        ".rounded-xl, .rounded-2xl, .rounded-3xl",
        ".shadow, .shadow-sm, .shadow-md, .shadow-lg",
        ".bg-white, .bg-stone-100, .bg-primary",
        ".card, .article, article, section .card",
        ".aspect-video.rounded, .aspect-square.rounded, .object-cover.rounded",
    ];

    let nodes = [];
    try {
        nodes = Array.from(document.querySelectorAll(selectors.join(",")));
    } catch (e) {
        // Fallback to a minimal, always-valid selector set if any invalid selector sneaks in
        nodes = Array.from(
            document.querySelectorAll(".rounded-xl, .rounded-2xl, .shadow, .card, article")
        );
    }
    let idx = 0;
    nodes.forEach((el) => {
        // Don’t override explicit animations
        if (el.hasAttribute("data-aos")) return;
        // Skip interactive or nav-related elements
        if (
            el.closest("nav, header, footer, .nav-list, #navbar-product, .nav-drop-item") ||
            el.matches("a, button, input, select, textarea")
        )
            return;
        // Skip hidden elements/containers (will be handled when they become visible)
        if (el.closest('.hidden, [aria-hidden="true"], [x-cloak]')) return;
        const style = getComputedStyle(el);
        if (style.display === 'none' || el.offsetParent === null) return;
        // Avoid nested animations if a parent already has data-aos
        if (el.closest("[data-aos]")) return;
        // Avoid animating tiny chips/badges
        const rect = el.getBoundingClientRect();
        if (rect.width < 56 || rect.height < 56) return;

        // Preserve hover transforms: if element uses hover transform utilities, prefer animating its parent
        const cls = (el.getAttribute('class') || '').toLowerCase();
        const hasHoverTransform = (cls.includes('hover:') || cls.includes('group-hover:') || cls.includes('peer-hover:')) && (
            cls.includes('scale') || cls.includes('translate') || cls.includes('rotate') || cls.includes('skew') || cls.includes('transform') || cls.includes('transition-transform')
        );

        const annotate = (target, effect) => {
            if (!target || target.hasAttribute('data-aos')) return false;
            target.setAttribute('data-aos', effect);
            target.setAttribute('data-aos-delay', String((idx % 8) * 50));
            target.setAttribute('data-aos-duration', '600');
            idx++;
            return true;
        };

        if (hasHoverTransform) {
            const parent = el.parentElement;
            // Choose parent if it's similar in size (container) and safe
            if (
                parent &&
                !parent.closest('[data-aos]') &&
                !parent.closest('nav, header, footer') &&
                !parent.matches('a, button, input, select, textarea')
            ) {
                const pRect = parent.getBoundingClientRect();
                const sizeCloseEnough = Math.abs(pRect.width - rect.width) < 40 && Math.abs(pRect.height - rect.height) < 40;
                if (sizeCloseEnough && annotate(parent, 'fade-up')) {
                    return; // parent annotated, child remains free for hover transforms
                }
            }
            // Fallback: animate the element with opacity only if no safe parent
            annotate(el, 'fade');
            return;
        }

        // Default: animate the element itself with fade-up
        annotate(el, 'fade-up');
        idx++;
    });

    AOS.init({
        once: false,
        offset: 24,
        easing: "ease-out-cubic",
        duration: 600,
        anchorPlacement: "top-bottom",
        mirror: false,
        disable: false,
        startEvent: 'DOMContentLoaded',
    });

    // Refresh and enable AOS visibility immediately (avoid missing window.load timing)
    try {
        AOS.refreshHard();
    } catch (e) {
        AOS.refresh();
    }
    // Let layout settle, then allow AOS to control visibility/animation
    requestAnimationFrame(() => {
        document.body.classList.add('aos-active');
        // Kick a scroll event to ensure in-view elements animate immediately
        window.dispatchEvent(new Event('scroll'));
        // Extra nudge in case layout shifts shortly after
        setTimeout(() => window.dispatchEvent(new Event('scroll')), 60);
        if (!import.meta.env.PROD) {
            const count = document.querySelectorAll('[data-aos]').length;
            console.debug('[AOS] initialized, elements:', count);
        }
    });
    // Extra safety: refresh on full load, if it hasn't happened yet
    window.addEventListener("load", () => {
        try { AOS.refreshHard(); } catch { AOS.refresh(); }
    });
});

// Import all images from the resources/images directory eagerly.
// Also includes fonts for Vite processing.
const images = import.meta.glob("../images/*", {
    eager: true,
    import: "default",
});

const fonts = import.meta.glob("../fonts/**", {
    eager: true,
});

// Create a helper function to get an image URL by name.
const getImageUrl = (name) => {
    // Construct the path and look it up in the images object.
    const path = `../images/${name}`;
    return images[path];
};

const individualTabButton = document.getElementById("for-individuals");
const businessTabButton = document.getElementById("for-business");

if (individualTabButton && businessTabButton) {
    individualTabButton.addEventListener("click", () => {
        businessTabButton.classList.remove("tab-active");
        individualTabButton.classList.add("tab-active");
        window.location.href = "/";
    });

    businessTabButton.addEventListener("click", () => {
        individualTabButton.classList.remove("tab-active");
        businessTabButton.classList.add("tab-active");
        window.location.href = "/business";
    });
}

const navbarProductPersonal = `
    
                                    <a href="/" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-individual-img" src="${getImageUrl(
    "user.png"
)}" alt="user icon" class="size-6">
                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Personal Account</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="/virtual" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-virtual-img" src="${getImageUrl(
    "pos_terminal.png"
)}" alt="pos terminal icon" class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Virtual Cards</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="/savings" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-savings-img" src="${getImageUrl(
    "savings.png"
)}" alt="savings icon" class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Savings</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="/loan" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-loan-img" src="${getImageUrl(
    "loan.png"
)}" alt="loan icon" class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Loan</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="/travel" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-hotel-img" src="${getImageUrl(
    "hotel-bed.png"
)}" alt="hotel bed icon" class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Travel and Hotel</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
`;

const navbarProductBusiness = `
                                    <a href="/business" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-business-img" src="${getImageUrl(
    "briefcase.png"
)}" alt="briefcase icon" class="size-6">
                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Business Account</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-pos-img" src="${getImageUrl(
    "pos_terminal.png"
)}" alt="POS & Terminal icon"
                                            class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">POS & Terminal</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-graph-img" src="${getImageUrl(
    "graph-up.png"
)}" alt="Business graph up icon"
                                            class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Business Management</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-loan-img" src="${getImageUrl(
    "loan.png"
)}" alt="loan icon" class="size-6">


                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Payroll</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-invoice-img" src="${getImageUrl(
    "invoice.png"
)}" alt="invoice icon" class="size-6">


                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Invoicing</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
`;

function toggleNavbarProductShown() {
    const navbarProduct = document.getElementById("navbar-product");
    const navbarSelect = document.getElementById("navbar-select");
    if (!navbarProduct || !navbarSelect || navbarProduct.children.length < 2 || navbarSelect.children.length < 2) {
        return;
    }
    navbarProduct.children[1].innerHTML = navbarProductPersonal;

    const [navSelectChild1, navSelectChild2] = navbarSelect.children;

    navSelectChild1.addEventListener("click", function () {
        navSelectChild2.classList.remove("nav-selected");
        this.classList.add("nav-selected");
        document.querySelector("#nav-product-individual-img").src =
            getImageUrl("user colored.png");
        document.querySelector("#nav-product-business-img").src =
            getImageUrl("briefcase.svg");
        navbarProduct.children[1].innerHTML = navbarProductPersonal;
    });

    navSelectChild2.addEventListener("click", function () {
        navSelectChild1.classList.remove("nav-selected");
        this.classList.add("nav-selected");
        document.querySelector("#nav-product-individual-img").src =
            getImageUrl("user.png");
        document.querySelector("#nav-product-business-img").src = getImageUrl(
            "briefcase colored.png"
        );
        navbarProduct.children[1].innerHTML = navbarProductBusiness;
    });
}

toggleNavbarProductShown();

const navLists = document.querySelectorAll(".nav-list");
navLists.forEach((navList) => {
    navList.addEventListener("mouseover", function (e) {
        e.stopPropagation();
        navLists.forEach((nav) => {
            if (nav !== navList) nav.classList.remove("is-open");
        });
        if (e.target.closest(".nav-selected")) return;
        navList.classList.add("is-open");
    });
    navList.addEventListener("mouseleave", function (e) {
        e.stopPropagation();
        navLists.forEach((nav) => {
            if (nav !== navList) nav.classList.remove("is-open");
        });
        if (e.target.closest(".nav-selected")) return;
        navList.classList.remove("is-open");
    });
});

// ======== MOBILE NAVBAR ==============
// Mobile menu toggle
const hamburger = document.getElementById("hamburger");
const mobileMenu = document.getElementById("mobile-menu");
let lines = null;
let isMenuOpen = false;
if (hamburger && mobileMenu) {
    lines = hamburger.querySelectorAll(".line");
    hamburger.addEventListener("click", () => {
        isMenuOpen = !isMenuOpen;

        if (isMenuOpen) {
            // Lock page scroll and show overlay menu fixed under the mobile nav header
            document.body.style.overflow = 'hidden';
            const header = document.getElementById('mobile-nav');
            const topOffset = header ? header.offsetHeight : 0;
            Object.assign(mobileMenu.style, {
                position: 'fixed',
                top: `${topOffset}px`,
                left: '0',
                right: '0',
                height: `calc(100vh - ${topOffset}px)`,
                maxHeight: `calc(100vh - ${topOffset}px)`,
                zIndex: '10000',
            });
            // Hamburger to X animation
            if (lines[0]) lines[0].style.transform = "translateY(6px) rotate(45deg)";
            if (lines[1]) lines[1].style.opacity = "0";
            if (lines[2]) lines[2].style.transform = "translateY(-6px) rotate(-45deg)";
        } else {
            // Restore page scroll and collapse overlay
            document.body.style.overflow = '';
            mobileMenu.style.maxHeight = "0px";
            mobileMenu.style.height = "";
            mobileMenu.style.position = '';
            mobileMenu.style.top = '';
            mobileMenu.style.left = '';
            mobileMenu.style.right = '';
            mobileMenu.style.zIndex = '';
            // X back to hamburger animation
            if (lines[0]) lines[0].style.transform = "translateY(0) rotate(0)";
            if (lines[1]) lines[1].style.opacity = "1";
            if (lines[2]) lines[2].style.transform = "translateY(0) rotate(0)";
        }
    });
}

// Dropdown functionality
function setupDropdown(btnId, contentId, arrowId) {
    const btn = document.getElementById(btnId);
    const content = document.getElementById(contentId);
    const arrow = document.getElementById(arrowId);
    let isOpen = false;

    if (!btn || !content || !arrow) return;
    btn.addEventListener("click", () => {
        isOpen = !isOpen;

        if (isOpen) {
            content.style.maxHeight = content.scrollHeight + "px";
            arrow.style.transform = "rotate(180deg)";
        } else {
            content.style.maxHeight = "0px";
            arrow.style.transform = "rotate(0deg)";
        }
    });
}

// Setup all dropdowns
setupDropdown("dropdown1-btn", "dropdown1-content", "dropdown1-arrow");
setupDropdown("dropdown2-btn", "dropdown2-content", "dropdown2-arrow");
setupDropdown("dropdown3-btn", "dropdown3-content", "dropdown3-arrow");

// Products toggle functionality
const productsBtn1 = document.getElementById("products-btn1");
const productsBtn2 = document.getElementById("products-btn2");
const productsContent1 = document.getElementById("products-content1");
const productsContent2 = document.getElementById("products-content2");

if (productsBtn1 && productsBtn2 && productsContent1 && productsContent2) {
    productsBtn1.addEventListener("click", () => {
        productsBtn1.classList.remove("bg-gray-200", "text-gray-700");
        productsBtn1.classList.add("bg-primary", "text-white");
        productsBtn2.classList.remove("bg-primary", "text-white");
        productsBtn2.classList.add("bg-gray-200", "text-gray-700");

        productsContent1.classList.remove("hidden");
        productsContent2.classList.add("hidden");
    });

    productsBtn2.addEventListener("click", () => {
        productsBtn2.classList.remove("bg-gray-200", "text-gray-700");
        productsBtn2.classList.add("bg-primary", "text-white");
        productsBtn1.classList.remove("bg-primary", "text-white");
        productsBtn1.classList.add("bg-gray-200", "text-gray-700");

        productsContent2.classList.remove("hidden");
        productsContent1.classList.add("hidden");
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const windowUrl = window.location.href;
    switch (true) {
        case windowUrl.includes("/virtual"):
            {
                const el = document.querySelector("#nav-dropdown-product-virtual-img");
                if (el) el.src = getImageUrl("user colored.png");
            }
            break;
        case windowUrl.includes("/savings"):
            {
                const el = document.querySelector("#nav-dropdown-product-savings-img");
                if (el) el.src = getImageUrl("user colored.png");
            }
            break;
        case windowUrl.includes("/business"):
            {
                const el = document.querySelector("#nav-dropdown-product-business-img");
                if (el) el.src = getImageUrl("briefcase colored.png");
            }
            break;
        case windowUrl.includes("/whistleblower"):
            {
                const el = document.querySelector("#nav-dropdown-resources-whistleblower-img");
                if (el) el.src = getImageUrl("whistle colored.png");
            }
            break;
        case windowUrl.includes("/policy"):
            {
                const el = document.querySelector("#nav-dropdown-resources-policy-img");
                if (el) el.src = getImageUrl("policy colored.png");
            }
            break;
        case windowUrl.includes("/help_center"):
            {
                const el = document.querySelector("#nav-dropdown-resources-help_center-img");
                if (el) el.src = getImageUrl("help_center colored.png");
            }
            break;
        case windowUrl.includes("/blog"):
            {
                const el = document.querySelector("#nav-dropdown-resources-blog-img");
                if (el) el.src = getImageUrl("blogger colored.png");
            }
            break;
        case windowUrl.includes("/invoicing"):
            {
                const el = document.querySelector("#nav-dropdown-product-invoicing-img");
                if (el) el.src = getImageUrl("invoice colored.png");
            }
            break;
        case windowUrl.includes("/hotel_travel"):
            {
                const el = document.querySelector("#nav-dropdown-product-hotel_travel-img");
                if (el) el.src = getImageUrl("hotel-bed colored.png");
            }
            break;
        case windowUrl.includes("/loan"):
            {
                const el = document.querySelector("#nav-dropdown-product-loan-img");
                if (el) el.src = getImageUrl("loan colored.png");
            }
            break;
        case windowUrl.includes("/pos_terminal"):
            {
                const el = document.querySelector("#nav-dropdown-product-pos_terminal-img");
                if (el) el.src = getImageUrl("pos_terminal colored.png");
            }
            break;
    }
});

document.addEventListener("scroll", () => {
    const navbars = document.querySelectorAll("nav");
    if (!navbars || navbars.length === 0) return;
    const viewportHeight = window.innerHeight;
    const scrollY = window.scrollY;

    if (scrollY > viewportHeight) {
        if (navbars[0]) {
            navbars[0].classList.add("fixed");
            navbars[0].classList.remove("absolute");
        }
        if (navbars[1]) {
            navbars[1].classList.add("fixed");
            navbars[1].classList.remove("absolute");
        }
    } else {
        if (navbars[0]) {
            navbars[0].classList.remove("fixed");
            navbars[0].classList.add("absolute");
        }
        if (navbars[1]) {
            navbars[1].classList.remove("fixed");
            navbars[1].classList.add("absolute");
        }
    }
});
