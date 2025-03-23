// Function to validate email format
function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}

// Function to handle email submission
function sendEmail() {
    const emailInput = document.querySelector('.input-box input[type="email"]');
    const email = emailInput.value;

    // Check if the email is valid
    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        emailInput.focus(); // Highlight the input for correction
        return;
    }

    // Simulate email sending process
    alert(`A reset password link has been sent to ${email}. Please check your inbox.`);

    // Clear the email input field
    emailInput.value = "";
}

// Attach event listener to the submit button
document.addEventListener("DOMContentLoaded", () => {
    const sendEmailButton = document.querySelector(".btn");
    sendEmailButton.addEventListener("click", (event) => {
        event.preventDefault();zz
        sendEmail(); // Call the email sending function
    });
});
