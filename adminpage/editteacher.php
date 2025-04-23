<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No teacher selected.";
    exit();
}

$teacher_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];

    $stmt = $conn->prepare("UPDATE teacher SET firstname=?, middlename=?, lastname=?, email=?, phone=?, gender=?, class=?, subject=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $firstname, $middlename, $lastname, $email, $phone, $gender, $class, $subject, $teacher_id);

    if ($stmt->execute()) {
        $updated = true;
    } else {
        $updated = false;
    }
}

$stmt = $conn->prepare("SELECT * FROM teacher WHERE id = ?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Teacher not found.";
    exit();
}

$teacher = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="css/editteacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - editteacher</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="edit-teacher">
            <h2>Edit Teacher Details</h2>

            <?php if (isset($updated) && $updated): ?>
                <p style="color: green;">✔️ Teacher updated successfully! Redirecting...</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'viewteacher.php?updated=success';
                    }, 3000); 
                </script>
            <?php elseif (isset($updated) && !$updated): ?>
                <p style="color: red;">❌ Failed to update teacher. Please try again.</p>
            <?php endif; ?>

            <form action="editteacher.php?id=<?= $teacher['id'] ?>" method="POST">
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?= htmlspecialchars($teacher['firstname']) ?>" required><br>

                <label>Middle Name:</label>
                <input type="text" name="middlename" value="<?= htmlspecialchars($teacher['middlename']) ?>"><br>

                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?= htmlspecialchars($teacher['lastname']) ?>" required><br>

                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($teacher['email']) ?>" required><br>

                <label>Phone:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($teacher['phone']) ?>" required><br>

                <label>Gender:</label>
                <input type="text" name="gender" value="<?= htmlspecialchars($teacher['gender']) ?>" required><br>

                <label>Class:</label>
                <input type="text" name="class" value="<?= htmlspecialchars($teacher['class']) ?>" required><br>

                <label>Subject:</label>
                <input type="text" name="subject" value="<?= htmlspecialchars($teacher['subject']) ?>" required><br><br>

                <button type="submit">Update Teacher</button>
            </form>
        </section>
    </main>
</body>
</html>
