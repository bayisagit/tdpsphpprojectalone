<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" type="text/css" href="css/member_announcement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - Member Announcement</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="add-announcement-form">
            <h2>Post Member Announcement</h2>
            <div class="central">
                <div class="phot"><img src="../images/announcement.png" alt="announcement"> </div>
                <form action="process/member_announcement.php" method="POST">
                    <div class="form-group">
                        <label for="audience">Select Audience:</label>
                        <select id="audience" name="audience" required>
                            <option value="" disabled selected>Select Audience</option>
                            <option value="family">Family</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Announcement Content:</label>
                        <textarea id="content" name="content" rows="7" required></textarea>
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
