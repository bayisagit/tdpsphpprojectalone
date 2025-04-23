<?php
session_start();
if ($_SESSION['user_type'] == "teacher"){
require '../configure/dbconnection.php';

$teacher_announcements_query = "SELECT * FROM member_announcement WHERE announcement_for = 'Teacher' ORDER BY created_at DESC";
$teacher_announcements_result = mysqli_query($conn, $teacher_announcements_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/teacherpage.css">
    <link rel="stylesheet" href="partials/teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Teacher Dashboard</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="teacher-dashboard">
            <h2>Teacher Dashboard</h2>
            
            <div class="teacher-announcements">
                <h3>Latest Announcements</h3>
                <form action="process/announcement.php" method="POST">
                    <textarea id="teacher-announcement" name="teacher-announcement" rows="4" placeholder="Enter your latest announcement here..." required></textarea>
                    <button type="submit" class="btn-submit">Post Announcement</button>
                </form>
            </div>

            <div class="assignments">
                <h3>Assignments</h3>
                <form action="process/assignment.php" method="POST">
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
                <?php
                if (mysqli_num_rows($teacher_announcements_result) > 0) {
                    while ($announcement = mysqli_fetch_assoc($teacher_announcements_result)) {
                        echo "<div class='news-item'>
                                <p><strong>Announcement:</strong> {$announcement['announcement_content']}</p>
                              </div>";
                    }
                } else {
                    echo "<p>No announcements available from the admin.</p>";
                }
                ?>
            </div>

            <div class="teacher-comment">
                <h3>Post a Comment to Admin</h3>
                <form action="process/comment.php" method="POST">
                    <textarea id="teacher-comment" name="teacher-comment" rows="4" placeholder="Enter your comment here..." required></textarea>
                    <button type="submit" class="btn-submit">Post Comment</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
<?php
}
else {
    header("location: ../homepage/login.php");
    exit();
}
?>
