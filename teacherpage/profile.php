<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];

// Fetch teacher data
$query = $conn->prepare("SELECT * FROM teacher WHERE id = ?");
$query->bind_param("i", $teacher_id);
$query->execute();
$result = $query->get_result();

if ($result && $result->num_rows > 0) {
    $teacher = $result->fetch_assoc();
} else {
    echo "Teacher profile not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="partials/teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Teacher Profile</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="teacher-profile">
            <h2>Teacher Profile</h2>
            <div class="profile-container">
                <div class="profile-image">
                    <img src="<?= $teacher['photo_url'] ?>" alt="Teacher Profile Image" >
                </div>
                <div class="profile-details">
                    <h3>Personal Information</h3>
                    <p><strong>Name:</strong> <?= htmlspecialchars($teacher['firstname'] . ' ' . $teacher['middlename'] . ' ' . $teacher['lastname']) ?></p>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($teacher['gender']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($teacher['email']) ?></p>
                    <p><strong>Phone:</strong> <?= htmlspecialchars($teacher['phone']) ?></p>

                    <h3>Class and Subjects</h3>
                    <p><strong>Class:</strong> <?= htmlspecialchars($teacher['class']) ?></p>
                    <p><strong>Subjects Taught:</strong> <?= htmlspecialchars($teacher['subject']) ?></p>

                    <a href="editprofile.php" class="edit-btn">Edit Profile</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
