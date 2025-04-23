<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ..homepage/login.php");
    exit();
}

$student_id = $_SESSION['user_id'];

$studentQuery = $conn->prepare("SELECT class FROM student WHERE id = ?");
$studentQuery->bind_param("i", $student_id);
$studentQuery->execute();
$studentResult = $studentQuery->get_result();
$student = $studentResult->fetch_assoc();

$class = $student['class'];

$courseQuery = $conn->prepare("
    SELECT c.course_id, c.subject, t.firstname AS teacher_fname, t.lastname AS teacher_lname
    FROM course c
    JOIN teacher t ON c.teacher_id = t.id
    WHERE c.class_level = ?
");
$courseQuery->bind_param("s", $class);
$courseQuery->execute();
$courses = $courseQuery->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mycourses.css">
    <link rel="stylesheet" href="partials/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>My Courses</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="my-courses">
            <h3>My Courses</h3>
            <table class="course-table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Instructor</th>
                        <th>Course ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($courses->num_rows > 0): ?>
                        <?php while ($course = $courses->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($course['subject']) ?></td>
                                <td><?= htmlspecialchars($course['teacher_fname'] . " " . $course['teacher_lname']) ?></td>
                                <td><?= str_pad($course['course_id'], 2, '0', STR_PAD_LEFT) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No courses found for your class.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
