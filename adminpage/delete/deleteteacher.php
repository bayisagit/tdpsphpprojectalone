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

    if ($type == 'teacher') {
        $query = "DELETE FROM teacher WHERE id = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                header("Location: ../viewteacher.php?message=Teacher%20deleted%20successfully");
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
