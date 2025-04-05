<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" type="text/css" href="css/addteacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="add-teacher-form">
            <h2>Register New Teacher</h2>
            <div class="central">
                <div class="phot"><img src="../images/studentregister.jpeg" alt="teacherregister"> </div>
                <form action="process_addteacher.php" method="POST">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name:</label>
                        <input type="text" id="middlename" name="middlename" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class:</label>
                        <select id="class" name="class" required>
                            <option value="" disabled selected>Select Class</option>
                            <option value="Class 1">Class 1</option>
                            <option value="Class 2">Class 2</option>
                            <option value="Class 3">Class 3</option>
                            <option value="class 4">Class 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject Taught:</label>
                        <select id="subject" name="subject" required>
                            <option value="" disabled selected>Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="GeneralScience">Science</option>
                            <option value="English">English</option>
                            <option value="Sport"></option>
                            <option value="History">History</option>
                            <!-- Add more subjects as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Register Teacher</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>