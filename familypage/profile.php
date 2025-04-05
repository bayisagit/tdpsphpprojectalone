<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="partials/family.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="family-profile">
            <h2>Family Profile</h2>
            <div class="profile-details">
                <div class="profile-info">
                    <label for="firstname">First Name:</label>
                    <span id="firstname">John</span>
                </div>

                <div class="profile-info">
                    <label for="lastname">Last Name:</label>
                    <span id="lastname">Doe</span>
                </div>

                <div class="profile-info">
                    <label for="email">Email:</label>
                    <span id="email">johndoe@example.com</span>
                </div>

                <div class="profile-info">
                    <label for="phone">Phone Number:</label>
                    <span id="phone">+1234567890</span>
                </div>

                <div class="profile-info">
                    <label for="address">Address:</label>
                    <span id="address">123 Street, City, Country</span>
                </div>

                <div class="profile-info">
                    <label for="student_id">Student ID:</label>
                    <span id="student_id">12345</span>
                </div>
            </div>

            <button class="edit-btn" onclick="window.location.href='edit_family_profile.php'">Edit Profile</button>
        </section>
    </main>
</body>
</html>