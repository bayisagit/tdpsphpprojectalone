<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../../configure/dbconnection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bind_param("i", $studentId);

    if ($stmt->execute()) {
        header("Location: ../viewstudent.php?status=deleted");
        exit();
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Invalid student ID.";
}
?>
