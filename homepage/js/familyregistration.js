// Function to validate full name
function validateFullName(name) {
    const nameParts = name.trim().split(" ");
    return nameParts.length >= 2; // Ensure at least two words
}

// Function to validate email format
function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}

// Function to validate password strength
function validatePassword(password) {
    // Minimum 8 characters, at least one uppercase letter, one number, and one special character
    const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}

// Function to handle form submission
function handleRegistration(event) {
    event.preventDefault(); // Prevent form submission

    const nameInput = document.querySelector('input[name="name"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    
    const name = nameInput.value;
    const email = emailInput.value;
    const password = passwordInput.value;

    let isValid = true;

    // Validate Full Name
    if (!validateFullName(name)) {
        alert("Full Name must include at least two words.");
        nameInput.focus();
        isValid = false;
    }

    // Validate Email
    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        emailInput.focus();
        isValid = false;
    }

    // Validate Password
    if (!validatePassword(password)) {
        alert("Password must be at least 8 characters long, include an uppercase letter, a number, and a special character.");
        passwordInput.focus();
        isValid = false;
    }

    // If all fields are valid
    if (isValid) {
        alert("Registration successful! Welcome to TDPSchool.");
        // Optionally, clear the form
        nameInput.value = "";
        emailInput.value = "";
        passwordInput.value = "";
        window.location.href = "login.php"; // Redirect to student login page
    }
}

// Attach event listener to the form
document.addEventListener("DOMContentLoaded", () => {
    const registrationForm = document.querySelector("form");
    registrationForm.addEventListener("submit", handleRegistration);
});
