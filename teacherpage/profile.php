<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="partials/teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
        <section class="teacher-profile">
            <h2>Teacher Profile</h2>
            <div class="profile-container">
                <div class="profile-image">
                    <img src="../images/teacher-profile.jpg" alt="Teacher Profile Image">
                </div>
                <div class="profile-details">
                    <h3>Personal Information</h3>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Gender:</strong> Male</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    
                    <h3>Class and Subjects</h3>
                    <p><strong>Class:</strong> Class 3</p>
                    <p><strong>Subjects Taught:</strong> Mathematics</p>

                    <h3>Actions</h3>
                    <a href="edit_teacher_profile.php" class="btn-edit">Edit Profile</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>