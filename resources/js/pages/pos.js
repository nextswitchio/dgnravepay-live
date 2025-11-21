import Swiper from "swiper/bundle";
import "swiper/css/bundle";

// Import all images from the resources/images directory eagerly.
const images = import.meta.glob("../../images/*", {
    eager: true,
    import: "default",
});

// Create a helper function to get an image URL by name.
const getImageUrl = (name) => {
    // Construct the path and look it up in the images object.
    const path = `../../images/${name}`;
    const imageUrl = images[path];

    // In production, Vite returns paths like "/assets/..." but they should be "/build/assets/..."
    // In development, paths are correct with /@fs/ prefix
    if (imageUrl && !import.meta.env.DEV && imageUrl.startsWith("/assets/")) {
        return "/build" + imageUrl;
    }

    return imageUrl;
};

const joinOptions = document.querySelectorAll(".join-option");
const joinImg = document.getElementById("join-img");
const joinImages = [
    getImageUrl("setup-img-1.png"),
    getImageUrl("setup-img-2.png"),
    getImageUrl("setup-img-3.png"),
    getImageUrl("setup-img-4.png"),
];
let currentJoinKey = 1;
let intervalId;

if (joinOptions.length && joinImg) {
    joinOptions.forEach((option, key) => {
        option.addEventListener("click", function () {
            joinOptions.forEach((option) => {
                if (option.classList.contains("join-active")) {
                    option.classList.remove("join-active");
                    const text = option.querySelector(".join-text");
                    if (text) text.classList.add("max-h-0");
                }
            });
            this.classList.add("join-active");
            const text = option.querySelector(".join-text");
            if (text) text.classList.remove("max-h-0");
            joinImg.src = joinImages[key];
            currentJoinKey++;
            clearInterval(intervalId);
            startJoinInterval();
        });
    });
}

function startJoinInterval() {
    if (!joinOptions.length || !joinImg) return;
    intervalId = setInterval(() => {
        if (currentJoinKey === 4) currentJoinKey = 0;
        const target = joinOptions.item(currentJoinKey);
        if (target) target.click();
    }, 5000);
}

if (joinOptions.length && joinImg) {
    startJoinInterval();
}

const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal", // or 'vertical'
    loop: true, // Enable continuous looping

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true, // Allow clicking on bullets to navigate
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },

    // Other options like slidesPerView, spaceBetween, etc.
    slidesPerView: 1,
    spaceBetween: 30,
    breakpoints: {
        // When window width is >= 640px
        640: {
            slidesPerView: 1.2,
            spaceBetween: 30,
        },
        // When window width is >= 768px
        768: {
            slidesPerView: 1.5,
            spaceBetween: 30,
        },
        // When window width is >= 1024px
        1024: {
            slidesPerView: 1.7,
            spaceBetween: 30,
        },
    },
});
