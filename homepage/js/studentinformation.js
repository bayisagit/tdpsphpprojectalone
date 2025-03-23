// Calculate and display academic progress totals
function calculateAcademicProgress() {
    const rows = document.querySelectorAll(".progress-table tbody tr");
    rows.forEach((row) => {
        const testScore = parseFloat(row.cells[1].textContent) || 0;
        const homeworkScore = parseFloat(row.cells[2].textContent) || 0;
        const midExamScore = parseFloat(row.cells[3].textContent) || 0;
        const assignmentScore = parseFloat(row.cells[4].textContent) || 0;

        const finalExamScore = Math.random() * 50; // Simulate final exam scores
        const totalOutOf50 = (testScore + homeworkScore + midExamScore + assignmentScore) / 2;
        const totalOutOf100 = totalOutOf50 + finalExamScore;

        row.cells[5].textContent = finalExamScore.toFixed(1);
        row.cells[6].textContent = totalOutOf50.toFixed(1);
        row.cells[7].textContent = totalOutOf100.toFixed(1);
    });
}

// Visualize attendance as a progress bar
function visualizeAttendance() {
    const attendanceRate = 90; // Example attendance rate
    const attendanceContainer = document.querySelector("#attendance");
    const progressBar = document.createElement("div");
    progressBar.className = "progress-bar";
    progressBar.style.width = `${attendanceRate}%`;
    progressBar.style.backgroundColor = "green";
    progressBar.style.height = "20px";
    attendanceContainer.appendChild(progressBar);
}

// Add interactive star rating for behavior
function addStarRating() {
    const behaviorSection = document.querySelector("#behavior");
    const starsContainer = document.createElement("div");
    starsContainer.className = "stars-container";
    const behaviorRating = 4.5; // Example rating

    for (let i = 1; i <= 5; i++) {
        const star = document.createElement("i");
        star.className = i <= behaviorRating ? "fa fa-star" : "fa fa-star-o";
        starsContainer.appendChild(star);
    }

    behaviorSection.appendChild(starsContainer);
}

// Visualize participation rate as a bar
function visualizeParticipation() {
    const participationRate = 85; // Example participation rate
    const participationSection = document.querySelector("#participation");
    const progressBar = document.createElement("div");
    progressBar.className = "progress-bar";
    progressBar.style.width = `${participationRate}%`;
    progressBar.style.backgroundColor = "blue";
    progressBar.style.height = "20px";
    participationSection.appendChild(progressBar);
}

// Handle comments submission
function handleComments() {
    const commentForm = document.querySelector("#comments form");
    const commentList = document.createElement("ul");
    commentForm.insertAdjacentElement("afterend", commentList);

    commentForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const commentInput = document.querySelector("#familyComments");
        const commentText = commentInput.value.trim();
        if (commentText) {
            // Save to localStorage
            let comments = JSON.parse(localStorage.getItem("comments")) || [];
            comments.push(commentText);
            localStorage.setItem("comments", JSON.stringify(comments));

            // Display comment
            const listItem = document.createElement("li");
            listItem.textContent = commentText;
            commentList.appendChild(listItem);

            // Clear input
            commentInput.value = "";
        }
    });

    // Load saved comments
    const savedComments = JSON.parse(localStorage.getItem("comments")) || [];
    savedComments.forEach((comment) => {
        const listItem = document.createElement("li");
        listItem.textContent = comment;
        commentList.appendChild(listItem);
    });
}

// Initialize all functionalities
document.addEventListener("DOMContentLoaded", () => {
    calculateAcademicProgress();
    visualizeAttendance();
    addStarRating();
    visualizeParticipation();
    handleComments();
});
