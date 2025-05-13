<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../configure/dbconnection.php';

$familyid = $_SESSION['user_id'];
$query = "SELECT * FROM family WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $familyid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>No profile data found.</p>";
    exit();
}

$family = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Profile</title>
    <link rel="stylesheet" href="partials/family.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="profile">
        <h2>Family Profile</h2>
        <div class="profile-details">
            <div class="profile-info">
                <label>First Name:</label>
                <span><?= htmlspecialchars($family['firstname']) ?></span>
            </div>
            <div class="profile-info">
                <label>Last Name:</label>
                <span><?= htmlspecialchars($family['lastname']) ?></span>
            </div>
            <div class="profile-info">
                <label>Email:</label>
                <span><?= htmlspecialchars($family['email']) ?></span>
            </div>
            <div class="profile-info">
                <label>Phone Number:</label>
                <span><?= htmlspecialchars($family['phone']) ?></span>
            </div>
            <div class="profile-info">
                <label>Address:</label>
                <span><?= htmlspecialchars($family['address']) ?></span>
            </div>
            <div class="profile-info">
                <label>Student ID:</label>
                <span><?= htmlspecialchars($family['student_id']) ?></span>
            </div>
            <div class="profile-info">
                <label>Profile Photo:</label>
                <br>
                <img src="<?= htmlspecialchars($family['photo_url']) ?>" alt="Profile Photo" style="width:100px; height:100px; border-radius: 50%; margin-top: 10px;">
            </div>
        </div>
        <a href="editprofile.php" class="edit-btn">Edit Profile</a>
    </main>
</body>
</html>
