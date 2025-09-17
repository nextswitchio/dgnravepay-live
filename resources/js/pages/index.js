import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";

// Import all images from the resources/images directory eagerly.
const images = import.meta.glob("../../images/*", {
    eager: true,
    import: "default",
});

// Create a helper function to get an image URL by name.
const getImageUrl = (name) => {
    // Construct the path and look it up in the images object.
    const path = `../../images/${name}`;
    return images[path];
};

const joinOptions = document.querySelectorAll(".join-option");
const joinImg = document.getElementById("join-img");
const joinImages = [
    getImageUrl("black woman smiling while pressing phone.png"),
    getImageUrl("face scan.png"),
    getImageUrl("man smiling.png"),
];
let currentJoinKey = 1;
let intervalId;

joinOptions.forEach((option, key) => {
    option.addEventListener("click", function () {
        joinOptions.forEach((option) => {
            if (option.classList.contains("join-active")) {
                option.classList.remove("join-active");
                option.querySelector(".join-text").classList.add("max-h-0");
            }
        });
        this.classList.add("join-active");
        option.querySelector(".join-text").classList.remove("max-h-0");
        joinImg.src = joinImages[key];
        currentJoinKey++;
        clearInterval(intervalId);
        startJoinInterval();
    });
});

function startJoinInterval() {
    intervalId = setInterval(() => {
        if (currentJoinKey === 3) currentJoinKey = 0;
        joinOptions.item(currentJoinKey).click();
    }, 5000);
}

startJoinInterval();
/*
const container = document.getElementById("bottom-to-top-slide");
const list = container.querySelector(".bottom-to-top-list");
const articles = Array.from(list.children);
const gap = 24; // Tailwind space-y-6 = 1.5rem = 24px
const articleHeight = articles[0].offsetHeight + gap;
let currentIndex = 0;

// Clone all articles and append to the end for seamless loop
articles.forEach((article) => {
    list.appendChild(article.cloneNode(true));
});

function doScroll() {
    currentIndex++;
    list.style.transition = "transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)";
    list.style.transform = `translateY(-${articleHeight * currentIndex}px)`;

    // When we reach the end of the original set, reset instantly and continue
    if (currentIndex === articles.length) {
        setTimeout(() => {
            list.style.transition = "none";
            list.style.transform = "translateY(0)";
            currentIndex = 0;
        }, 700); // Match transition duration
    }
}

setInterval(doScroll, 4000);
*/
