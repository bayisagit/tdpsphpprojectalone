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
    <link rel="stylesheet" type="text/css" href="css/viewteacher.css">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - viewteacher</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
    <section class="view-teachers-table">
        <h2>View Registered Teachers</h2>
        <table>
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM teacher";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['middlename']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['class']}</td>
                                <td>{$row['subject']}</td>
                                <td>
                                    <a href='editteacher.php?id={$row['id']}'><i class='fas fa-edit'></i>Edit</a> |
                                    <a href='delete/deleteteacher.php?id={$row['id']}&type=teacher' onclick=\"return confirm('Are you sure you want to delete this teacher?')\"><i class='fas fa-trash'></i> Delete</a>                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No teachers found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    </main>
</body>
</html>
