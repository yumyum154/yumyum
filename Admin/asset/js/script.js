document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the 'toggle-active' class
  let toggleElements = document.querySelectorAll(".toggle-active");
  let header = document.getElementById("header");
  let open = document.querySelectorAll(".openheader"); // NodeList of elements that will trigger the action
  let close = document.querySelector(".mobileclose"); // Single close element
  let menubtn = document.querySelector(".openheader img");
  let sideBar = document.getElementById("header");
  let darkmode = document.querySelector(".dark-mode");
  let toggleButtons = document.querySelectorAll(".toggle-btn");
  let currentlyOpen = null;

  toggleElements.forEach((item) => {
    item.addEventListener("click", () => {
      let isActive = item.classList.contains("active");

      // Remove the 'active' class from all elements
      toggleElements.forEach((el) => {
        el.classList.remove("active");
      });

      // Toggle the 'active' class on the clicked element
      if (isActive) {
        item.classList.remove("active");
      } else {
        item.classList.add("active");
      }
    });
  });

  toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = document.querySelector(button.getAttribute("data-target"));
      // If a section is currently open and it is not the one being clicked
      if (currentlyOpen && currentlyOpen !== target) {
        currentlyOpen.classList.remove("show");
      }

      // Toggle the clicked section
      if (target.classList.contains("show")) {
        target.classList.remove("show");
        currentlyOpen = null;
      } else {
        target.classList.add("show");
        currentlyOpen = target;
      }
    });
  });
  // Add event listener to each openheader element
  open.forEach((button) => {
    button.addEventListener("click", (event) => {
      header.classList.add("show");
    });
  });

  menubtn.addEventListener("click", () => {
    sideBar.classList.toggle("active");
  });

  // Add event listener to the close element
  if (close) {
    close.addEventListener("click", () => {
      header.classList.remove("show");
    });
  }

  const allprogressbar = document.querySelectorAll(".main .card .progress");
  allprogressbar.forEach((item) => {
    item.style.setProperty("--value", item.dataset.value);
  });

  darkmode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode-variants");
    darkmode.classList.toggle("dark-mode-variants");
  });
});
