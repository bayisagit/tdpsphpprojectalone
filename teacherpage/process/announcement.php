<?php

require '../../configure/dbconnection.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_SESSION['teacher_id'];  // Assume teacher_id is stored in session after login
    $announcement_text = mysqli_real_escape_string($conn, $_POST['teacher-announcement']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);  // Assuming teacher includes a subject

    $sql = "INSERT INTO teacher_announcements (teacher_id, subject, announcement_text) 
            VALUES ('$teacher_id', '$subject', '$announcement_text')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../home.php?status=success");  // Redirect with success status
    } else {
        header("Location: ../home.php?status=error");  // Redirect with error status
    }
    exit();
}
