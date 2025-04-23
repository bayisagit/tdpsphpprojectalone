<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

$student_id = $_SESSION['user_id'];

$query = $conn->prepare("SELECT subject, mid_exam, assignment, quiz, final_exam, total FROM results WHERE student_id = ?");
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
    <title>My Exam Results</title>
    <link rel="stylesheet" href="css/myresult.css">
    <link rel="stylesheet" href="partials/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="student-results">
            <h2>Your Exam Results</h2>
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
                    <?php if (count($rows) > 0): ?>
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
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No results found for you yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
