<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ..homepage/login.php");
    exit();
}
require '../configure/dbconnection.php';

// Fetch student data
$studentid = $_SESSION['user_id'];
$query = "SELECT firstname, middlename, lastname, email, phone, gender, class, photo_url FROM student WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $studentid);  
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$firstname = $row["firstname"];
$middlename = $row["middlename"];
$lastname = $row["lastname"];
$email = $row["email"];
$phone = $row["phone"];
$gender = $row["gender"];
$class = $row["class"];
$photo_url = $row["photo_url"];?>
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
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="profile">
            <h2>Your Profile</h2>
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="<?= htmlspecialchars($photo_url) ?>" alt="Student Picture">
                </div>
                <div class="profile-details">
                    <div class="profile-info">
                        <label for="firstname">First Name:</label>
                        <span id="firstname"><?= htmlspecialchars($firstname) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="middlename">Middle Name:</label>
                        <span id="middlename"><?= htmlspecialchars($middlename) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="lastname">Last Name:</label>
                        <span id="lastname"><?= htmlspecialchars($lastname) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="email">Email:</label>
                        <span id="email"><?= htmlspecialchars($email) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="phone">Phone Number:</label>
                        <span id="phone"><?= htmlspecialchars($phone) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="gender">Gender:</label>
                        <span id="gender"><?= htmlspecialchars($gender) ?></span>
                    </div>
                    <div class="profile-info">
                        <label for="class">Class:</label>
                        <span id="class"><?= htmlspecialchars($class) ?></span>
                    </div>
                </div>
            </div>
            <a href="editprofile.php" class="edit-btn">Edit Profile</a>
        </section>
    </main>
</body>
</html>
