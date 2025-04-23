<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ..homepage/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" type="text/css" href="css/general_announcement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - Post Announcement</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="add-announcement-form">
            <h2>Post General Announcement</h2>
            <div class="central">
                <form action="process/general_announcement.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Announcement Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Announcement Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Announcement Content:</label>
                        <textarea id="content" name="content" rows="7" required></textarea>
                        <small>Max 7 lines</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-submit">Post Announcement</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
