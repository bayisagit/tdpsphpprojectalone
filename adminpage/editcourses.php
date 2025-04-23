<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

if (!isset($_GET['course_id'])) {
    echo "No course selected.";
    exit();
}

$course_id = $_GET['course_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $class_level = $_POST['class_level'];
    $teacher_id = $_POST['teacher_id'];

    $stmt = $conn->prepare("UPDATE course SET subject=?, class_level=?, teacher_id=? WHERE course_id=?");
    $stmt->bind_param("sssi", $subject, $class_level, $teacher_id, $course_id);

    if ($stmt->execute()) {
        $updated = true;
    } else {
        $updated = false;
    }
}

$stmt = $conn->prepare("SELECT * FROM course WHERE course_id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Course not found.";
    exit();
}

$course = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="css/editcourse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="edit-course">
            <h2>Edit Course Details</h2>

            <?php if (isset($updated) && $updated): ?>
                <p style="color: green;">✔️ Course updated successfully! Redirecting...</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'viewcourses.php?updated=success';
                    }, 3000);
                </script>
            <?php elseif (isset($updated) && !$updated): ?>
                <p style="color: red;">❌ Failed to update course. Please try again.</p>
            <?php endif; ?>

            <form action="editcourses.php?course_id=<?= $course['course_id'] ?>" method="POST">
                <label>Subject:</label>
                <input type="text" name="subject" value="<?= htmlspecialchars($course['subject']) ?>" required><br>

                <label>Class Level:</label>
                <input type="text" name="class_level" value="<?= htmlspecialchars($course['class_level']) ?>" required><br>

                <label>Teacher ID:</label>
                <input type="text" name="teacher_id" value="<?= htmlspecialchars($course['teacher_id']) ?>" required><br><br>

                <button type="submit">Update Course</button>
            </form>
        </section>
    </main>
</body>
</html>
