<?php
require '../configure/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewfamily.css">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - View Families</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="view-families-table">
            <h2>View Registered Families</h2>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Student ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM family";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['firstname']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['student_id']}</td>
                                <td>
                                    <a href='editfamily.php?id={$row['id']}'><i class='fas fa-edit'></i> Edit</a> | 
                                    <a href='deletefamily.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this family record?')\">
                                        <i class='fas fa-trash-alt'></i> Delete
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No families registered yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
