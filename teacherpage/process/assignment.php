<?php

require '../../configure/dbconnection.php';  // Ensure the database connection is included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $assignment_title = mysqli_real_escape_string($conn, $_POST['assignment-title']);
    $assignment_details = mysqli_real_escape_string($conn, $_POST['assignment-details']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due-date']);

    $sql = "INSERT INTO assignment (subject, assignment_title, assignment_details, due_date) 
            VALUES ('$subject', '$assignment_title', '$assignment_details', '$due_date')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../home.php?status=success");  // Redirect with success status
    } else {
        header("Location: ../home.php?status=error");  // Redirect with error status
    }
    exit();
}
