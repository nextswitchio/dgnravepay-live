
  const aboutImgScroll = document.getElementById("aboutImgScroll")
  const originalWidth = aboutImgScroll.clientWidth

  document.addEventListener("DOMContentLoaded", () => {
      window.addEventListener("scroll", () => {
          const scrollPosition = window.scrollY
          const elementTop = aboutImgScroll.offsetTop
          const width = originalWidth + scrollPosition * 1.05
          aboutImgScroll.style.width = `${width}px`
      })
  })


function setupAboutGridSwipe(interval = 4000) {
    const grid = document.getElementById('about-grid-swipe');
    if (!grid) return;

    const loadingBar = document.getElementById("loading-bar")

    function animateLoadingBar() {
        setTimeout(() => {
            loadingBar.style.transition = `width ${interval}ms linear`;
            loadingBar.classList.add('w-full');
        }, 20);
    }

    function updateGrid() {
        let children = Array.from(grid.children);
        // Remove col-span-2 from all children
        children.forEach(child => {
            child.classList.remove('md:col-span-2')
        });
        // Move elements as described
        grid.appendChild(children[0]); // Move first to end
        if (children[2]) children[2].classList.add('md:col-span-2');
        loadingBar.classList.add('w-0');
    }

    animateLoadingBar();

    setInterval(() => {
        updateGrid();
        animateLoadingBar();
    }, interval);
}

// Call this after DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
    setupAboutGridSwipe(4000);
});
