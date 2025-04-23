<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../../configure/dbconnection.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == 'family') {
        $query = "DELETE FROM family WHERE id = ?";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                header("Location: ../viewfamily.php?message=Family%20deleted%20successfully");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Unable to prepare the query.";
        }
    } else {
        echo "Invalid type parameter.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
