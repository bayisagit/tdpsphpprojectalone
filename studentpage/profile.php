<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="partials/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Student Profile</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="profile">
            <h2>Your Profile</h2>
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="../images/student-picture.jpg" alt="Student Picture">
                </div>
                <div class="profile-details">
                    <div class="profile-info">
                        <label for="firstname">First Name:</label>
                        <span id="firstname">John</span>
                    </div>
                    <div class="profile-info">
                        <label for="middlename">Middle Name:</label>
                        <span id="middlename">Doe</span>
                    </div>
                    <div class="profile-info">
                        <label for="lastname">Last Name:</label>
                        <span id="lastname">Smith</span>
                    </div>
                    <div class="profile-info">
                        <label for="email">Email:</label>
                        <span id="email">john.smith@example.com</span>
                    </div>
                    <div class="profile-info">
                        <label for="phone">Phone Number:</label>
                        <span id="phone">+1234567890</span>
                    </div>
                    <div class="profile-info">
                        <label for="gender">Gender:</label>
                        <span id="gender">Male</span>
                    </div>
                    <div class="profile-info">
                        <label for="class">Class:</label>
                        <span id="class">Class 2</span>
                    </div>
                </div>
            </div>
            <button class="edit-btn" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
        </section>
    </main>
</body>
</html>
