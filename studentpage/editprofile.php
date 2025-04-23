<?php
session_start();
require '../configure/dbconnection.php';
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$table = $user_type;
$id_field = 'id';

$success = "";
$errors = [];

// Fetch user info
$stmt = $conn->prepare("SELECT * FROM $table WHERE $id_field = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? $user['email']);
    $phone = trim($_POST['phone'] ?? $user['phone']);
    $photo_url = $user['photo_url'];

    // Handle file upload
    if (!empty($_FILES['photo']['name'])) {
        $target_dir = "uploads/";
        $filename = time() . "_" . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $photo_url = $target_file;
        } else {
            $errors[] = "Failed to upload the image.";
        }
    }

    if (empty($errors)) {
        $query = "UPDATE $table SET email = ?, phone = ?, photo_url = ? WHERE $id_field = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $email, $phone, $photo_url, $user_id);

        if ($stmt->execute()) {
            $success = "Profile updated successfully!";
            // Refresh updated data
            $user['email'] = $email;
            $user['phone'] = $phone;
            $user['photo_url'] = $photo_url;
        } else {
            $errors[] = "Update failed: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="partials/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Edit Profile</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <h2>Edit Profile</h2>
    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <?php if ($errors): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
        <label>Photo:</label>
        <?php if ($user['photo_url']): ?>
            <img src="<?= $user['photo_url'] ?>" alt="Profile Photo">
        <?php endif; ?>
        <input type="file" name="photo">
        <br><br>
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
