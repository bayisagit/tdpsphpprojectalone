<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ..homepage/login.php");
    exit();
}
?>
<?php
require '../configure/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewstudent.css">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - View Students</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="view-students-table">
            <h2>View Registered Students</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM student";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['middlename']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['class']}</td>
                                <td>
                                    <a href='editstudent.php?id={$row['id']}'><i class='fas fa-edit'></i> Edit</a> |
                                    <a href='delete/studentdelete.php?id={$row['id']}&type=student' onclick=\"return confirm('Are you sure you want to delete this student?')\">
                                        <i class='fas fa-trash'></i> Delete
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No students found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
