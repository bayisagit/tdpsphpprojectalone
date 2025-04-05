<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/familypage.css">
	<link rel="stylesheet" href="partials/family.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
	<?php
	include("partials/header.php");
	?>
	<main class="main-content">
        <section class="family-announcements">
            <h2>Announcements</h2>
            <div class="announcement-card">
                <div class="announcement-header">
                    <h3>Admin Announcement</h3>
                    <span class="announcement-date">March 31, 2025</span>
                </div>
                <p class="announcement-content">
                    School will be closed on April 5th for the annual sports day. Please plan accordingly.
                </p>
                <div class="comments">
                    <div class="comment">
                        <strong>Teacher John Doe:</strong>
                        <p>Make sure all students are aware of this schedule change.</p>
                    </div>
                </div>
            </div>

            <div class="announcement-card">
                <div class="announcement-header">
                    <h3>Teacher Announcement</h3>
                    <span class="announcement-date">March 30, 2025</span>
                </div>
                <p class="announcement-content">
                    Don't forget to submit the assignment for Science by April 3rd.
                </p>
                <div class="comments">
                    <div class="comment">
                        <strong>Teacher Jane Smith:</strong>
                        <p>Let's ensure all students have the necessary resources for this assignment.</p>
                    </div>
                </div>
            </div>

            <div class="comment-form">
                <h3>Add a Comment (Family only)</h3>
                <form action="process_comment.php" method="POST">
                    <textarea name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
                    <button type="submit" class="btn-submit">Submit Comment</button>
                </form>
            </div>

        </section>
	</main>
</body>
</html>