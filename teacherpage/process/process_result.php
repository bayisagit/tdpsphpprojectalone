<?php
session_start();
require '../../configure/dbconnection.php';

$teacherid = $_SESSION['user_id'];
$subject = $_POST['subject'];
$student_ids = $_POST['student_ids'];
echo'hello';

foreach ($student_ids as $student_id) {
    $mid_exam = $_POST['mid_exam'][$student_id] ?? 0;
    $assignment = $_POST['assignment'][$student_id] ?? 0;
    $quiz = $_POST['quiz'][$student_id] ?? 0;
    $final_exam = $_POST['final_exam'][$student_id] ?? 0;

    // Check if a result already exists
    $checkQuery = "SELECT result_id FROM results WHERE student_id = ? AND subject = ? AND teacher_id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("isi", $student_id, $subject, $teacherid);
    $stmt->execute();
    $existing = $stmt->get_result()->fetch_assoc();

    if ($existing) {
        // Update
        $update = "UPDATE results SET mid_exam = ?, assignment = ?, quiz = ?, final_exam = ? WHERE result_id = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("iiiii", $mid_exam, $assignment, $quiz, $final_exam, $existing['result_id']);
        $stmt->execute();
    } else {
        // Insert
        $insert = "INSERT INTO results (student_id, subject, mid_exam, assignment, quiz, final_exam, teacher_id)
                   VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("isiiiii", $student_id, $subject, $mid_exam, $assignment, $quiz, $final_exam, $teacherid);
        $stmt->execute();
    }
}

header("Location: ../takeresult.php?success=1");
exit();
