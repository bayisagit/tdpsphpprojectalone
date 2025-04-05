<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/teacherpage.css">
	<link rel="stylesheet" href="partials/teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
	<?php
	include("partials/header.php");
	?>
	<main class="main-content">
        <section class="teacher-dashboard">
            <h2>Teacher Dashboard</h2>
            <div class="teacher-announcements">
                <h3>Latest Announcements</h3>
                <ul>
                    <li>
                        <p><strong>Class 2 Math Exam</strong> - The Math exam will be held on the 15th of next month. Please prepare your students accordingly.</p>
                    </li>
                    <li>
                        <p><strong>Parent-Teacher Meeting</strong> - The next Parent-Teacher meeting will take place on the 20th. Please prepare the necessary reports.</p>
                    </li>
                </ul>
            </div>

            <div class="assignments">
                <h3>Assignments</h3>
                <form action="process_assignment.php" method="POST">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <label for="assignment-title">Assignment Title:</label>
                        <input type="text" id="assignment-title" name="assignment-title" placeholder="Title of the assignment" required>
                    </div>
                    <div class="form-group">
                        <label for="assignment-details">Assignment Details:</label>
                        <textarea id="assignment-details" name="assignment-details" placeholder="Details about the assignment" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="due-date">Due Date:</label>
                        <input type="date" id="due-date" name="due-date" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Submit Assignment</button>
                    </div>
                </form>
            </div>

            <div class="admin-news">
                <h3>News from Admin</h3>
                <div class="news-item">
                    <p><strong>New School Policy</strong> - The school has introduced a new policy regarding student attendance. Please review the policy on the school portal.</p>
                </div>
                <div class="news-item">
                    <p><strong>Updated Curriculum</strong> - The curriculum for the upcoming semester has been updated. Make sure to check the new guidelines.</p>
                </div>
            </div>
        </section>
	</main>
</body>
</html>