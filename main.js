const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

const takeTourBtn = document.getElementById("take-tour-btn");
const slideshow = document.querySelector(".slideshow");
const slides = document.querySelectorAll(".slide");

let currentSlide = 0;

takeTourBtn.addEventListener("click", () => {
  slideshow.style.display = "block";
  showSlide(currentSlide);
});

function showSlide(index) {
  slides.forEach((slide) => (slide.style.display = "none"));
  slides[index].style.display = "block";
}

function nextSlide() {
  currentSlide++;
  if (currentSlide >= slides.length) {
    currentSlide = 0;
  }
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slides.length - 1;
  }
  showSlide(currentSlide);
}

slideshow.addEventListener("click", (e) => {
  if (e.target.tagName === "IMG") {
    nextSlide();
  }
});

document.querySelector(".prev").addEventListener("click", () => prevSlide());
document.querySelector(".next").addEventListener("click", () => nextSlide());
navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});
//......................//
const fileInput = document.getElementById('file-input');
const chk = document.getElementById('take-tour-btn');

chk.addEventListener('click', () => {
  fileInput.click();
});

const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

// Get the "Book Now" button element
const bookNowBtn = document.getElementById('book-now-btn');

// Add a click event listener to the "Book Now" button
bookNowBtn.addEventListener('click', () => {
  // Change the current page to the booking page
  window.location.href = 'index1.html';
});

// header container
ScrollReveal().reveal(".header__container .section__subheader", {
  ...scrollRevealOption,
});

ScrollReveal().reveal(".header__container h1", {
  ...scrollRevealOption,
  delay: 500,
});

ScrollReveal().reveal(".header__container .btn", {
  ...scrollRevealOption,
  delay: 1000,
});

// room container
ScrollReveal().reveal(".room__card", {
  ...scrollRevealOption,
  interval: 500,
});

// feature container
ScrollReveal().reveal(".feature__card", {
  ...scrollRevealOption,
  interval: 500,
});

// news container
ScrollReveal().reveal(".news__card", {
  ...scrollRevealOption,
  interval: 500,
});
