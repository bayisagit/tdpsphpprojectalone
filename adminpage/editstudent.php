<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No student selected.";
    exit();
}

$student_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $class = $_POST['class'];

    $stmt = $conn->prepare("UPDATE student SET firstname=?, middlename=?, lastname=?, email=?, phone=?, gender=?, class=? WHERE id=?");
    $stmt->bind_param("sssssssi", $firstname, $middlename, $lastname, $email, $phone, $gender, $class, $student_id);

    if ($stmt->execute()) {
        $updated = true;
    } else {
        $updated = false;
    }
}

$stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Student not found.";
    exit();
}

$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" href="css/editstudent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="edit-student">
            <h2>Edit Student Details</h2>

            <?php if (isset($updated) && $updated): ?>
                <p style="color: green;">✔️ Student updated successfully! Redirecting...</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'viewstudent.php?updated=success';
                    }, 3000);
                </script>
            <?php elseif (isset($updated) && !$updated): ?>
                <p style="color: red;">❌ Failed to update student. Please try again.</p>
            <?php endif; ?>

            <form action="editstudent.php?id=<?= $student['id'] ?>" method="POST">
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?= htmlspecialchars($student['firstname']) ?>" required><br>

                <label>Middle Name:</label>
                <input type="text" name="middlename" value="<?= htmlspecialchars($student['middlename']) ?>"><br>

                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?= htmlspecialchars($student['lastname']) ?>" required><br>

                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required><br>

                <label>Phone:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>" required><br>

                <label>Gender:</label>
                <input type="text" name="gender" value="<?= htmlspecialchars($student['gender']) ?>" required><br>

                <label>Class:</label>
                <input type="text" name="class" value="<?= htmlspecialchars($student['class']) ?>" required><br><br>

                <button type="submit">Update Student</button>
            </form>
        </section>
    </main>
</body>
</html>
