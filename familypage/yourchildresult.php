<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

$familyid = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT student_id FROM family WHERE id = ?");
$stmt->bind_param("i", $familyid);
$stmt->execute();
$studentResult = $stmt->get_result();

if ($studentResult->num_rows === 0) {
    echo "<p>No student linked to your profile.</p>";
    exit();
}

$student = $studentResult->fetch_assoc();
$student_id = $student['student_id'];

$query = $conn->prepare("
    SELECT subject, mid_exam, assignment, quiz, final_exam, 
           (mid_exam + assignment + quiz + final_exam) AS total 
    FROM results 
    WHERE student_id = ?
");
$query->bind_param("i", $student_id);
$query->execute();
$result = $query->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/yourchildresult.css">
    <link rel="stylesheet" href="partials/family.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Your Child Results</title>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="student-results">
            <h2>Your Child's Exam Results</h2>

            <?php if (count($rows) > 0): ?>
            <table class="results-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Mid Exam (20)</th>
                        <th>Assignment (20)</th>
                        <th>Quiz (10)</th>
                        <th>Final Exam (50)</th>
                        <th>Total (100)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['subject']) ?></td>
                            <td><?= htmlspecialchars($row['mid_exam'] ?? 0) ?></td>
                            <td><?= htmlspecialchars($row['assignment'] ?? 0) ?></td>
                            <td><?= htmlspecialchars($row['quiz'] ?? 0) ?></td>
                            <td><?= htmlspecialchars($row['final_exam'] ?? 0) ?></td>
                            <td><strong><?= htmlspecialchars($row['total'] ?? 0) ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>No results found for your child yet.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
