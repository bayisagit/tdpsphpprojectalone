<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No family selected.";
    exit();
}

$family_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $student_id = $_POST['student_id'];

    $stmt = $conn->prepare("UPDATE family SET firstname=?, lastname=?, email=?, phone=?, address=?, student_id=? WHERE id=?");
    $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $phone, $address, $student_id, $family_id);

    if ($stmt->execute()) {
        $updated = true;
    } else {
        $updated = false;
    }
}

$stmt = $conn->prepare("SELECT * FROM family WHERE id = ?");
$stmt->bind_param("i", $family_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Family not found.";
    exit();
}

$family = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Family</title>
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="css/editfamily.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="edit-family">
            <h2>Edit Family Details</h2>

            <?php if (isset($updated) && $updated): ?>
                <p style="color: green;">✔️ Family updated successfully! Redirecting...</p>
                <script>
                    setTimeout(() => window.location.href = 'viewfamily.php?updated=success', 3000);
                </script>
            <?php elseif (isset($updated) && !$updated): ?>
                <p style="color: red;">❌ Failed to update family. Please try again.</p>
            <?php endif; ?>

            <form action="editfamily.php?id=<?= $family['id'] ?>" method="POST">
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?= htmlspecialchars($family['firstname']) ?>" required><br>

                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?= htmlspecialchars($family['lastname']) ?>" required><br>

                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($family['email']) ?>" required><br>

                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($family['phone']) ?>" required><br>

                <label>Address:</label>
                <input type="text" name="address" value="<?= htmlspecialchars($family['address']) ?>" required><br>

                <label>Student ID:</label>
                <input type="text" name="student_id" value="<?= htmlspecialchars($family['student_id']) ?>" required><br><br>

                <button type="submit">Update Family</button>
            </form>
        </section>
    </main>
</body>
</html>
