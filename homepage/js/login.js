// Function to validate email format
function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}

// Function to handle the student login authorization
function authorize() {
    // Get values from the input fields
    const email1 = document.getElementById('email1').value;
    const password1 = document.getElementById('password1').value;
    const email2 = document.getElementById('email2').value;
    const password2 = document.getElementById('password2').value;
    const studentId = document.querySelector('input[name="student_id"]').value;

    // Student login validation
    if (email1 && password1 && validateEmail(email1)) {
        alert("Student login successful!");
        window.location.href = "studentinformation.html"; // Redirect to student information page
    }
    // Family login validation
    else if (email2 && password2 && studentId && validateEmail(email2)) {
        alert("Family login successful!");
        window.location.href = "studentinformation.html"; // Redirect to student information page
    } else {
        alert("Please enter valid credentials!");
    }
}

// Event listener to ensure the form doesn't submit if the function fails
document.addEventListener('DOMContentLoaded', () => {
    const loginButtons = document.querySelectorAll('.btn');
    loginButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent form from submitting automatically
            authorize(); // Call the authorization function
        });
    });
});
