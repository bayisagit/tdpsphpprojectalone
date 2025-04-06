<?php
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
    <title>Admin Dashboard - viewcourses</title>
</head>
<body>
<main class="main-content">
    <section class="view-courses-table">
        <h2>View Registered Courses</h2>
        <table>
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Subject</th>
                    <th>Class Level</th>
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
                                <td>{$row['id']}</td>
                                <td>{$row['course_name']}</td>
                                <td>{$row['course_code']}</td>
                                <td>{$row['subject']}</td>
                                <td>{$row['class_level']}</td>
                                <td><a href='#'>Edit</a> | <a href='#'>Delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No courses found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>
</body>
</html>
