<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewcourses.css">
    <link rel="stylesheet" href="partials/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
    <section class="view-courses-table">
            <h2>View Registered Courses</h2>
            <!-- Table for Displaying Courses -->
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
                    <!-- Sample Data for Courses -->
                    <tr>
                        <td>101</td>
                        <td>Mathematics 101</td>
                        <td>MTH101</td>
                        <td>Math</td>
                        <td>Class 1</td>
                        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Science 101</td>
                        <td>SCI101</td>
                        <td>Science</td>
                        <td>Class 2</td>
                        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>103</td>
                        <td>English 101</td>
                        <td>ENG101</td>
                        <td>English</td>
                        <td>Class 3</td>
                        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>104</td>
                        <td>History 101</td>
                        <td>HIS101</td>
                        <td>History</td>
                        <td>Class 4</td>
                        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>