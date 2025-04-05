<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mycourses.css">
    <link rel="stylesheet" href="partials/student.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="my-courses">
            <h3>My Courses</h3>
            <table class="course-table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Instructor</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mathematics</td>
                        <td>Mr. Johnson</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 80%;"></div>
                            </div>
                            80%
                        </td>
                    </tr>
                    <tr>
                        <td>Physics</td>
                        <td>Dr. Emily Carter</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%;"></div>
                            </div>
                            65%
                        </td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td>Prof. Anderson</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 50%;"></div>
                            </div>
                            50%
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>