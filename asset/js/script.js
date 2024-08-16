document.addEventListener("DOMContentLoaded", function () {
  const activepage = window.location.pathname;
  document.querySelectorAll("nav a").forEach((link) => {
    if (link.getAttribute("href").includes(activepage)) {
      link.classList.add("active");
    } else {
      link.classList.remove("active");
    }
  });

  window.addEventListener("scroll", function () {
    let header = document.querySelector(".header");
    const scrollPosition = window.scrollY; // Remove 'this.' as 'window' is global

    if (header) {
      header.classList.toggle("header-sticky", scrollPosition > 50);
    }
  });
});

document.querySelectorAll(".play-button").forEach((button) => {
  button.addEventListener("click", function () {
    const videoId = this.id.replace("play-button", "video");
    const video = document.getElementById(videoId);
    const videoRowId = this.id.replace("play-button", "video-row");
    const videoRow = document.getElementById(videoRowId);
    const preview = document.getElementById(
      "video-preview-" + videoId.split("-")[1]
    );
    const videoWrapper = video.closest(".video-wrapper");

    // Show the video row and play the video
    videoRow.classList.add("show");
    video.style.display = "block";
    video.play();

    // Ensure video wrapper is shown
    videoWrapper.style.display = "block";
  });
});

document.querySelectorAll(".close-button").forEach((button) => {
  button.addEventListener("click", function () {
    const videoRowId = this.id.replace("close-button", "video-row");
    const videoRow = document.getElementById(videoRowId);
    const video = videoRow.querySelector("video");
    const preview = document.getElementById(
      "video-preview-" + videoRowId.split("-")[1]
    );
    const videoWrapper = videoRow.closest(".video-wrapper");
    const playButton = document.getElementById(
      "play-button-" + videoRowId.split("-")[1]
    );

    // Hide the video row
    videoRow.classList.remove("show");

    // Pause the video and hide it
    video.pause();
    video.style.display = "none";

    // Show the preview image and play button
    preview.style.display = "block";
    playButton.style.display = "block";

    // Ensure video wrapper is shown
    videoWrapper.style.display = "block";
  });
});
