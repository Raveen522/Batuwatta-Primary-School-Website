/* +++++++++++++++ Slideshow ++++++++++++++++ */

const sliderWrapper = document.querySelector('.slider-wrapper');
const sliderImages = sliderWrapper.querySelectorAll('img');
const sliderControls = document.querySelector('.slider-controls');
const prevSlideBtn = document.querySelector('.prev-slide');
const nextSlideBtn = document.querySelector('.next-slide');
const sliderDots = document.querySelector('.slider-dots');
const sliderDotItems = [];

let currentSlideIndex = 0;

function showSlide(slideIndex) {
  if (slideIndex >= sliderImages.length) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = sliderImages.length - 1;
  }

  sliderImages.forEach(img => img.classList.remove('active'));
  sliderImages[slideIndex].classList.add('active');

  sliderDotItems.forEach(dot => dot.classList.remove('active'));
  sliderDotItems[slideIndex].classList.add('active');

  currentSlideIndex = slideIndex;
}

function createSliderDots() {
  for (let i = 0; i < sliderImages.length; i++) {
    const dot = document.createElement('div');
    dot.classList.add('slider-dot');
    if (i === currentSlideIndex) {
      dot.classList.add('active');
    }
    dot.addEventListener('click', () => showSlide(i));
    sliderDots.appendChild(dot);
    sliderDotItems.push(dot);
  }
}

prevSlideBtn.addEventListener('click', () => showSlide(currentSlideIndex - 1));
nextSlideBtn.addEventListener('click', () => showSlide(currentSlideIndex + 1));

createSliderDots();

setInterval(() => {
  showSlide(currentSlideIndex + 1);
}, 6000);

/* ++++++++++++ End of Slideshow ++++++++++++ */