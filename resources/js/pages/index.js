// Import all images from the resources/images directory eagerly.
const images = import.meta.glob('../../images/*', { eager: true, import: 'default' })

// Create a helper function to get an image URL by name.
const getImageUrl = (name) => {
    // Construct the path and look it up in the images object.
    const path = `../../images/${name}`;
    return images[path];
};

const joinOptions = document.querySelectorAll(".join-option");
const joinImg = document.getElementById("join-img")
const joinImages = [
    getImageUrl('black woman smiling while pressing phone.png'),
    getImageUrl('face scan.png'),
    getImageUrl('man smiling.png')
]
let currentJoinKey = 1;
let intervalId;

joinOptions.forEach((option, key) => {
    option.addEventListener("click", function () {
        joinOptions.forEach(option => {
            if (option.classList.contains("join-active")) {
                option.classList.remove("join-active")
                option.querySelector(".join-text").classList.add('max-h-0')
            }
        })
        this.classList.add("join-active")
        option.querySelector(".join-text").classList.remove('max-h-0')
        joinImg.src = joinImages[key]
        currentJoinKey++
        clearInterval(intervalId)
        startJoinInterval()
    })
})

function startJoinInterval() {
    intervalId = setInterval(() => {
        if (currentJoinKey === 3) currentJoinKey = 0;
        joinOptions.item(currentJoinKey).click()
    }, 5000);
}

startJoinInterval()