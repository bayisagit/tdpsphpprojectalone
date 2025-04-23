<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../configure/dbconnection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM course WHERE course_id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ../viewcourses.php?message=Course%20deleted%20successfully");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Unable to prepare the query.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
