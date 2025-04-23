<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/addcourses.css">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - Register Course</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="add-course-form">
            <h2>Add New Course</h2>
            <div class="central">
                <form action="process/addcourse.php" method="POST">
                    <div class="form-group">
                        <label for="teacher_id">Teacher Id:</label>
                        <input type="number" id="teacher_id" name="teacher_id" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject" required>
                            <option value="" disabled selected>Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="History">History</option>
                            <option value="Geography">Geography</option>
                            <option value="Art">Art</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class Level:</label>
                        <select id="class" name="class_level" required>
                            <option value="" disabled selected>Select Class Level</option>
                            <option value="Class 1">Class 1</option>
                            <option value="Class 2">Class 2</option>
                            <option value="Class 3">Class 3</option>
                            <option value="Class 4">Class 4</option>
                            <option value="Class 5">Class 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Add Course</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
