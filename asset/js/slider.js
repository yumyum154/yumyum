function changeSlide(slides, buttons, index) {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  buttons.forEach((button) => {
    button.classList.remove("active");
  });
  slides[index].classList.add("active");
  buttons[index].classList.add("active");
}

function setupSlider(slider) {
  const slides = slider.querySelectorAll(".imgwrap_slide"); // Correct class name for slides
  const buttons = slider.parentNode.querySelectorAll(".buttons .button"); // Correct class name for buttons
  let currentSlide = 0;

  function nextSlide() {
    let nextIndex = (currentSlide + 1) % slides.length;
    changeSlide(slides, buttons, nextIndex);
    currentSlide = nextIndex;
  }

  let slideInterval = setInterval(nextSlide, 8000);

  buttons.forEach((button, index) => {
    button.addEventListener("click", function () {
      clearInterval(slideInterval);
      changeSlide(slides, buttons, index);
      currentSlide = index;
      slideInterval = setInterval(nextSlide, 8000);
    });
  });
}

function setupSliders() {
  const sliders = document.querySelectorAll(".imgwrap_slider");
  sliders.forEach(setupSlider);
}

setupSliders();

class AutoSlider {
  constructor({
    sliderSelector,
    slideSelector,
    navDotSelector,
    prevButtonSelector = null,
    nextButtonSelector = null,
    autoSlideInterval = 10000,
    resumeDelay = 15000,
  }) {
    this.slider = document.querySelector(sliderSelector);
    this.slides = this.slider.querySelectorAll(slideSelector);
    this.navDots = document.querySelectorAll(navDotSelector);
    this.prevButton = prevButtonSelector
      ? document.querySelector(prevButtonSelector)
      : null;
    this.nextButton = nextButtonSelector
      ? document.querySelector(nextButtonSelector)
      : null;
    this.autoSlideIntervalDuration = autoSlideInterval;
    this.resumeDelay = resumeDelay;

    this.currentIndex = 0;
    this.autoSlideInterval = null;
    this.resumeAutoSlideTimeout = null;

    this.init();
  }

  init() {
    this.updateActiveDot();
    this.addEventListeners();
    this.startAutoSlide();
  }

  updateActiveDot() {
    this.navDots.forEach((dot, index) => {
      dot.classList.toggle("active", index === this.currentIndex);
    });
  }

  goToSlide(index) {
    if (this.slides[index]) {
      this.slider.scrollTo({
        left: this.slides[index].offsetLeft,
        behavior: "smooth",
      });
      this.currentIndex = index;
      this.updateActiveDot();
    }
  }

  showNextSlide() {
    this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    this.goToSlide(this.currentIndex);
  }

  showPreviousSlide() {
    this.currentIndex =
      (this.currentIndex - 1 + this.slides.length) % this.slides.length;
    this.goToSlide(this.currentIndex);
  }

  startAutoSlide() {
    clearTimeout(this.resumeAutoSlideTimeout);
    this.autoSlideInterval = setInterval(() => {
      this.showNextSlide();
    }, this.autoSlideIntervalDuration);
  }

  stopAutoSlide() {
    clearInterval(this.autoSlideInterval);
    this.resumeAutoSlideTimeout = setTimeout(() => {
      this.startAutoSlide();
    }, this.resumeDelay);
  }

  addEventListeners() {
    this.navDots.forEach((dot, index) => {
      dot.addEventListener("click", (event) => {
        event.preventDefault();
        this.stopAutoSlide();
        this.goToSlide(index);
      });
    });

    if (this.nextButton) {
      this.nextButton.addEventListener("click", () => {
        this.stopAutoSlide();
        this.showNextSlide();
      });
    }

    if (this.prevButton) {
      this.prevButton.addEventListener("click", () => {
        this.stopAutoSlide();
        this.showPreviousSlide();
      });
    }
  }
}

// Initialize sliders
document.addEventListener("DOMContentLoaded", () => {
  new AutoSlider({
    sliderSelector: ".location-slider",
    slideSelector: ".slider-item",
    navDotSelector: "#slider_nav1 a",
    prevButtonSelector: ".control .previous",
    nextButtonSelector: ".control .next",
  });

  new AutoSlider({
    sliderSelector: ".project_wrapper",
    slideSelector: ".project_item",
    navDotSelector: "#slider_nav a",
    prevButtonSelector: ".control .previous",
    nextButtonSelector: ".control .next",
  });

  new AutoSlider({
    sliderSelector: ".slider.contain",
    slideSelector: ".slide.item",
    navDotSelector: "#slider_nav2 a",
    prevButtonSelector: ".control .previous",
    nextButtonSelector: ".control .next",
  });
});
