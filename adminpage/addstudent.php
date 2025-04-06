<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" type="text/css" href="css/addstudent.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - add student</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="add-student-form">
            <h2>Register New Student</h2>
            <div class="centeral">
                <div class="phot"><img src="../images/studentregister.jpeg" alt="studentregister"> </div>
                <form action="process/addstudent.php" method="POST">
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
                        <button type="submit" class="btn-submit">Register Student</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>