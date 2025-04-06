<?php
// Include the database connection
include('../configure/dbconnection.php');

// Fetch Admin Announcements for Family
$admin_announcements_query = "SELECT * FROM member_announcement WHERE announcement_for = 'Family' ORDER BY created_at DESC";
$admin_announcements_result = mysqli_query($conn, $admin_announcements_query);

// Fetch Teacher Announcements for Family
$teacher_announcements_query = "SELECT * FROM teacher_announcements ORDER BY created_at DESC";
$teacher_announcements_result = mysqli_query($conn, $teacher_announcements_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/familypage.css">
    <link rel="stylesheet" href="partials/family.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Family Announcements</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="family-announcements">
            <h2>Announcements</h2>

            <!-- Admin Announcements -->
            <div class="admin-announcements">
                <h3>Admin Announcements</h3>
                <?php
                // Check if there are Admin announcements for Family
                if (mysqli_num_rows($admin_announcements_result) > 0) {
                    while ($announcement = mysqli_fetch_assoc($admin_announcements_result)) {
                        echo "<div class='announcement-card'>
                                <div class='announcement-header'>
                                    <h3>Admin Announcement</h3>
                                    <span class='announcement-date'>{$announcement['created_at']}</span>
                                </div>
                                <p class='announcement-content'>{$announcement['announcement_content']}</p>
                              </div>";
                    }
                } else {
                    echo "<p>No announcements available from the admin.</p>";
                }
                ?>
            </div>

            <!-- Teacher Announcements -->
            <div class="teacher-announcements">
                <h3>Teacher Announcements</h3>
                <?php
                // Check if there are Teacher announcements for Family
                if (mysqli_num_rows($teacher_announcements_result) > 0) {
                    while ($announcement = mysqli_fetch_assoc($teacher_announcements_result)) {
                        echo "<div class='announcement-card'>
                                <div class='announcement-header'>
                                    <h3>Teacher Announcement</h3>
                                    <span class='announcement-date'>{$announcement['created_at']}</span>
                                </div>
                                <p class='announcement-content'>{$announcement['announcement_text']}</p>
                              </div>";
                    }
                } else {
                    echo "<p>No announcements available from the teachers.</p>";
                }
                ?>
            </div>

            <!-- Comment Form -->
            <div class="comment-form">
                <h3>Add a Comment (Family only)</h3>
                <form action="process/comment.php" method="POST">
                    <textarea name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
                    <button type="submit" class="btn-submit">Submit Comment</button>
                </form>
            </div>

        </section>
    </main>
</body>
</html>
