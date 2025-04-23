<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../configure/dbconnection.php';
include("partials/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/viewcourses.css" />
    <link rel="stylesheet" href="partials/admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Admin Dashboard - View Courses</title>
</head>
<body>
    <main class="main-content">
        <section class="view-courses-table">
            <h2>View Registered Courses</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Subject</th>
                        <th>Class Level</th>
                        <th>Teacher ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM course";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['course_id']}</td>
                                <td>{$row['subject']}</td>
                                <td>{$row['class_level']}</td>
                                <td>{$row['teacher_id']}</td>
                                <td>
                                    <a href='editcourses.php?course_id={$row['course_id']}'><i class='fas fa-edit'></i> Edit</a> | 
                                    <a href='delete/deletecourse.php?id={$row['course_id']}' onclick=\"return confirm('Are you sure you want to delete this course?');\">
                                        <i class='fas fa-trash'></i> Delete
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No courses found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
