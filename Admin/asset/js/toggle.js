// Function to open a popup
function openPopup(element) {
  const popupId = element.getAttribute("data-popup-id"); // Get the popup ID from the clicked link
  const userId = element.getAttribute("data-user-id"); // Get the user ID from the clicked link

  // Show the popup
  const popup = document.getElementById(popupId);
  if (popup) {
    popup.classList.add("pop"); // Display the popup
  }

  // Set the user ID in the hidden input field
  const userIdInput = document.querySelector(`#${popupId} #user_id_${popupId}`);
  if (userIdInput) {
    userIdInput.value = userId;
  }

  // Debugging: Log the IDs to verify
  console.log("Popup ID:", popupId);
  console.log("User ID:", userId);
}

// Event listener for closing the popup
document.addEventListener("click", function (event) {
  if (event.target.classList.contains("close-btn")) {
    const popup = event.target.closest(".addbalance"); // Find the closest popup element
    if (popup) {
      popup.classList.remove("pop"); // Hide the popup
    }
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const manualCheckbox = document.getElementById("manualprofit");
  const automaticCheckbox = document.getElementById("automaticprofit");
  const manualSection = document.getElementById("manualSection");
  const automaticSection = document.getElementById("automaticSection");

  function updateSections() {
    if (manualCheckbox.checked) {
      manualSection.style.display = "block";
      automaticSection.style.display = "none";
      automaticCheckbox.checked = false;
    } else if (automaticCheckbox.checked) {
      automaticSection.style.display = "block";
      manualSection.style.display = "none";
      manualCheckbox.checked = false;
    } else {
      manualSection.style.display = "none";
      automaticSection.style.display = "none";
    }
  }

  manualCheckbox.addEventListener("change", updateSections);
  automaticCheckbox.addEventListener("change", updateSections);

  updateSections();
});

// Function to hide messages after 5 seconds
function hideMessages() {
  // Select all messages with the classes 'success-message' and 'error-message'
  const messages = document.querySelectorAll(
    ".message.success-message, .message.error-message"
  );

  messages.forEach((message) => {
    // Set a timeout to hide the message after 5 seconds
    setTimeout(() => {
      message.style.opacity = 0;
      // After the fade-out animation (if any), remove the message from the DOM
      setTimeout(() => {
        message.style.display = "none";
      }, 500); // Matches the duration of any fade-out animation (0.5s here)
    }, 5000); // 5 seconds delay
  });
}

// Call the function when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", hideMessages);
