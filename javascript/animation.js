// Function to check if the element is in the viewport
function isInViewport(element) {
const rect = element.getBoundingClientRect();
return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
);
}

// Function to handle the scroll event
function handleScroll() {
const fadeInElements = document.querySelectorAll('.fade-in-element');

fadeInElements.forEach((element) => {
    if (isInViewport(element)) {
    element.classList.add('fade-in-visible');
    }
});
}

// Add the scroll event listener
window.addEventListener('scroll', handleScroll);