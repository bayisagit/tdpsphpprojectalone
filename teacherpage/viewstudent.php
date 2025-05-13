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
    <title>Teacher Dashboard - View Students</title>
    <link rel="stylesheet" type="text/css" href="css/viewstudent.css">
    <link rel="stylesheet" href="partials/teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="view-students-table">
            <h2>View Your Class Students</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody">
                    <!-- Students will be loaded here via JavaScript -->
                </tbody>
            </table>
        </section>
    </main>

    <script>
        async function loadStudents() {
            try {
                const response = await fetch('api/fetchstudents.php');
                if (!response.ok) {
                    throw new Error("Failed to load students: " + response.status);
                }

                const students = await response.json();
                const tbody = document.getElementById("studentTableBody");
                tbody.innerHTML = "";

                if (students.length === 0) {
                    tbody.innerHTML = "<tr><td colspan='6'>No students found.</td></tr>";
                    return;
                }

                students.forEach(student => {
                    const row = `
                        <tr>
                            <td>${student.id}</td>
                            <td>${student.firstname}</td>
                            <td>${student.middlename}</td>
                            <td>${student.lastname}</td>
                            <td>${student.gender}</td>
                            <td>${student.class}</td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            } catch (error) {
                console.error(error);
                document.getElementById("studentTableBody").innerHTML =
                    "<tr><td colspan='6'>Failed to load students.</td></tr>";
            }
        }

        // Load students when page loads
        window.onload = loadStudents;
    </script>
</body>
</html>
