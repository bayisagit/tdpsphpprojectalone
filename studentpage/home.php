<?php

session_start();
if ($_SESSION['user_type'] == "student"){
require '../configure/dbconnection.php';

$announcements_query = "SELECT * FROM member_announcement WHERE announcement_for = 'Student' ORDER BY created_at DESC";
$announcements_result = mysqli_query($conn, $announcements_query);

$assignments_query = "SELECT * FROM assignment ORDER BY due_date ASC";
$assignments_result = mysqli_query($conn, $assignments_query);

$teacher_announcements_query = "SELECT * FROM teacher_announcements ORDER BY created_at DESC";
$teacher_announcements_result = mysqli_query($conn, $teacher_announcements_query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/studentpage.css">
    <link rel="stylesheet" href="partials/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Student Dashboard</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="announcements">
            <h3>Latest Announcements</h3>
            <?php
            if (mysqli_num_rows($announcements_result) > 0) {
                while ($announcement = mysqli_fetch_assoc($announcements_result)) {
                    echo "<div class='announcement-item'>
                            <strong>Announcement</strong>
                            <p>{$announcement['announcement_content']}</p>
                          </div>";
                }
            } else {
                echo "<p>No announcements available.</p>";
            }
            ?>
        </section>

        <section class="teacher-announcements">
            <h3>Teacher Announcements</h3>
            <?php
            if (mysqli_num_rows($teacher_announcements_result) > 0) {
                while ($teacher_announcement = mysqli_fetch_assoc($teacher_announcements_result)) {
                    echo "<div class='teacher-announcement-item'>
                            <strong>{$teacher_announcement['subject']}</strong>
                            <p>{$teacher_announcement['announcement_text']}</p>
                          </div>";
                }
            } else {
                echo "<p>No teacher announcements available.</p>";
            }
            ?>
        </section>

<!--         <section class="your-progress">
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
        </section>
 -->
        <section class="assignments">
            <h3>Upcoming Assignments</h3>
            <?php
            if (mysqli_num_rows($assignments_result) > 0) {
                while ($assignment = mysqli_fetch_assoc($assignments_result)) {
                    echo "<div class='assignment-item'>
                            <h4>{$assignment['assignment_title']}</h4>
                            <p><strong>Due Date:</strong> {$assignment['due_date']}</p>
                            <p><strong>Description:</strong> {$assignment['assignment_details']}</p>
                          </div>";
                }
            } else {
                echo "<p>No upcoming assignments.</p>";
            }
            ?>
        </section>

            <section class="student-comments">
            <h3>Leave a Comment</h3>
            <form action="process/submit_comment.php" method="POST">
                <textarea name="comment_text" rows="4" placeholder="Write your comment here..." required></textarea>
                <button type="submit" class="btn-submit">Submit Comment</button>
            </form>
        </section>
    </main>
</body>
</html>
<?php
} else {
    header("location: ../homepage/login.php");
    exit();
}
