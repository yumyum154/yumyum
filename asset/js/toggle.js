document.addEventListener("DOMContentLoaded", function () {
  let toggleButtons = document.querySelectorAll(".togglebtn");
  let togglesubmenu = document.querySelectorAll(".submenutoggle");
  let toggleIconBtn = document.querySelector(".openmenu");
  let currentlyOpen = null;

  // Handle toggle buttons
  toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = document.querySelector(button.getAttribute("data-target"));
      const openIcon = button.querySelector(".open");
      const closeIcon = button.querySelector(".close");

      // Toggle the icon button's class
      button.classList.toggle("active");

      if (currentlyOpen && currentlyOpen !== target) {
        currentlyOpen.classList.remove("show");
        currentlyOpen.previousElementSibling.querySelector(
          ".open"
        ).style.display = "block";
        currentlyOpen.previousElementSibling.querySelector(
          ".close"
        ).style.display = "none";
      }

      if (target.classList.contains("show")) {
        target.classList.remove("show");
        openIcon.style.display = "block";
        closeIcon.style.display = "none";
        currentlyOpen = null;
      } else {
        target.classList.add("show");
        openIcon.style.display = "none";
        closeIcon.style.display = "block";
        currentlyOpen = target;
      }
    });
  });

  // Handle submenu toggles
  togglesubmenu.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.querySelector(".submenu"); // Assuming .submenu is a child of .submenutoggle

      if (currentlyOpen && currentlyOpen !== target) {
        currentlyOpen.classList.remove("active");
        currentlyOpen.parentNode.classList.remove("active"); // Remove active from the previously active button
      }

      if (target.classList.contains("active")) {
        target.classList.remove("active");
        currentlyOpen = null;
      } else {
        target.classList.add("active");
        currentlyOpen = target;
      }

      // Ensure arrow rotation is applied
      button.classList.toggle("active");
    });
  });
});
