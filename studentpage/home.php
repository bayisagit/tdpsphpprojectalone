<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/studentpage.css">
	<link rel="stylesheet" href="partials/student.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
	<?php
	include("partials/header.php");
	?>
	<main class="main-content">
        <section class="announcements">
            <h3>Latest Announcements</h3>
            <div class="announcement-item">
                <strong>New Course Registration Deadline:</strong>
                <p>Don't forget to register for your next semester courses by Friday, March 25th. Late registration will incur a fee.</p>
            </div>
            <div class="announcement-item">
                <strong>Examination Schedule Released:</strong>
                <p>The schedule for your upcoming exams has been released. Check your student portal for the full timetable.</p>
            </div>
            <div class="announcement-item">
                <strong>Summer Internship Opportunities:</strong>
                <p>Applications for summer internships are now open. Make sure to submit your application by April 1st.</p>
            </div>
            <a href="announcements.php" class="see-all">See All Announcements</a>
        </section>

        <!-- Your Progress Section -->
        <section class="your-progress">
            <h3>Your Progress</h3>
            <div class="progress">
                <h4>Course Completion</h4>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 75%;"></div>
                </div>
                <p>75% of courses completed for this semester.</p>
            </div>
            <div class="progress">
                <h4>Assignments Completed</h4>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 60%;"></div>
                </div>
                <p>60% of assignments completed.</p>
            </div>
            <a href="progress.php" class="see-all">View Detailed Progress</a>
        </section>

        <!-- Assignments Section -->
        <section class="assignments">
            <h3>Upcoming Assignments</h3>
            <div class="assignment-item">
                <h4>Math Homework 2</h4>
                <p><strong>Due Date:</strong> April 5th, 2025</p>
                <p><strong>Description:</strong> Complete exercises on integration methods from chapter 3.</p>
            </div>
            <div class="assignment-item">
                <h4>Physics Lab Report</h4>
                <p><strong>Due Date:</strong> April 10th, 2025</p>
                <p><strong>Description:</strong> Submit your final report on the recent lab experiment on projectile motion.</p>
            </div>
            <div class="assignment-item">
                <h4>History Essay</h4>
                <p><strong>Due Date:</strong> April 12th, 2025</p>
                <p><strong>Description:</strong> Write an essay on the impact of the industrial revolution on modern society.</p>
            </div>
            <a href="assignments.php" class="see-all">See All Assignments</a>
        </section>
	</main>
</body>
</html>