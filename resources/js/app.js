import "./bootstrap";

import Alpine from "alpinejs";
import AOS from "aos";
import "aos/dist/aos.css";

window.Alpine = Alpine;

Alpine.start();
AOS.init();

import.meta.glob(["../images/**", "../fonts/**"]);

// Import all images from the resources/images directory eagerly.
const images = import.meta.glob("../images/*", {
    eager: true,
    import: "default",
});

// Create a helper function to get an image URL by name.
const getImageUrl = (name) => {
    // Construct the path and look it up in the images object.
    const path = `../images/${name}`;
    return images[path];
};

const individualTabButton = document.getElementById("for-individuals");
const businessTabButton = document.getElementById("for-business");

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
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
                                        <img id="nav-dropdown-product-loan-img" src="${getImageUrl(
                                            "loan.png"
                                        )}" alt="loan icon" class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">Loan</p>
                                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                                grow</span>
                                        </div>
                                    </a>
                                    <a href="#" class="rounded-xl p-3 flex items-start gap-5 nav-drop-item">
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
                                        )}" alt="POS & Terminals icon"
                                            class="size-6">

                                        <div class="text-left">
                                            <p class="font-bold text-sm mb-1.5 leading-1">POS & Terminals</p>
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
const lines = hamburger.querySelectorAll(".line");
let isMenuOpen = false;

hamburger.addEventListener("click", () => {
    isMenuOpen = !isMenuOpen;

    if (isMenuOpen) {
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
        // Hamburger to X animation
        lines[0].style.transform = "translateY(6px) rotate(45deg)";
        lines[1].style.opacity = "0";
        lines[2].style.transform = "translateY(-6px) rotate(-45deg)";
    } else {
        mobileMenu.style.maxHeight = "0px";
        // X back to hamburger animation
        lines[0].style.transform = "translateY(0) rotate(0)";
        lines[1].style.opacity = "1";
        lines[2].style.transform = "translateY(0) rotate(0)";
    }
});

// Dropdown functionality
function setupDropdown(btnId, contentId, arrowId) {
    const btn = document.getElementById(btnId);
    const content = document.getElementById(contentId);
    const arrow = document.getElementById(arrowId);
    let isOpen = false;

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

document.addEventListener("DOMContentLoaded", function () {
    const windowUrl = window.location.href;
    switch (true) {
        case windowUrl.includes("/virtual"):
            console.log("virtual");
            document.querySelector("#nav-dropdown-product-virtual-img").src =
                getImageUrl("user colored.png");
            break;
        case windowUrl.includes("/savings"):
            document.querySelector("#nav-dropdown-product-savings-img").src =
                getImageUrl("user colored.png");
            break;
        case windowUrl.includes("/business"):
            document.querySelector("#nav-dropdown-product-business-img").src =
                getImageUrl("briefcase colored.png");
            break;
        case windowUrl.includes("/whistleblower"):
            document.querySelector(
                "#nav-dropdown-resources-whistleblower-img"
            ).src = getImageUrl("whistle colored.png");
            break;
        case windowUrl.includes("/policy"):
            document.querySelector("#nav-dropdown-resources-policy-img").src =
                getImageUrl("policy colored.png");
            break;
        case windowUrl.includes("/help_center"):
            document.querySelector(
                "#nav-dropdown-resources-help_center-img"
            ).src = getImageUrl("help_center colored.png");
            break;
        case windowUrl.includes("/blog"):
            document.querySelector("#nav-dropdown-resources-blog-img").src =
                getImageUrl("blogger colored.png");
            break;
        case windowUrl.includes("/invoicing"):
            document.querySelector("#nav-dropdown-product-invoicing-img").src =
                getImageUrl("invoice colored.png");
            break;
        case windowUrl.includes("/hotel_travel"):
            document.querySelector(
                "#nav-dropdown-product-hotel_travel-img"
            ).src = getImageUrl("hotel-bed colored.png");
            break;
        case windowUrl.includes("/loan"):
            document.querySelector("#nav-dropdown-product-loan-img").src =
                getImageUrl("loan colored.png");
            break;
        case windowUrl.includes("/pos_terminal"):
            document.querySelector(
                "#nav-dropdown-product-pos_terminal-img"
            ).src = getImageUrl("pos_terminal colored.png");
            break;
    }
});

document.addEventListener("scroll", () => {
    const navbars = document.querySelectorAll("nav");
    const viewportHeight = window.innerHeight;
    const scrollY = window.scrollY;

    if (scrollY > viewportHeight) {
        navbars[0].classList.add("fixed");
        navbars[0].classList.remove("absolute");
        navbars[1].classList.add("fixed");
        navbars[1].classList.remove("absolute");
    } else {
        navbars[0].classList.remove("fixed");
        navbars[0].classList.add("absolute");
        navbars[1].classList.remove("fixed");
        navbars[1].classList.add("absolute");
    }
});
