<?php
session_start();
require '../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

$teacherid = $_SESSION['user_id'];

// Get subject and class of the logged-in teacher
$query = "SELECT subject, class FROM teacher WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $teacherid);
$stmt->execute();
$teacherData = $stmt->get_result()->fetch_assoc();

$subject = $teacherData['subject'];
$class = $teacherData['class'];

// Get students of the same class
$query = "SELECT id, firstname, middlename FROM student WHERE class = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $class);
$stmt->execute();
$students = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Result</title>
    <link rel="stylesheet" href="css/takeresult.css">
    <link rel="stylesheet" href="partials/teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include("partials/header.php"); ?>
    <main class="main-content">
        <section class="teacher-results">
            <h2>Results for <?= htmlspecialchars($subject) ?></h2>
            <form action="process/process_result.php" method="POST">
                <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Mid Exam (20)</th>
                            <th>Assignment (20)</th>
                            <th>Quiz (10)</th>
                            <th>Final Exam (50)</th>
                            <th>Total (100)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $students->fetch_assoc()): 
                            $student_id = $row['id'];

                            // Fetch existing results for this student
                            $resultQuery = "SELECT mid_exam, assignment, quiz, final_exam FROM results WHERE student_id = ? AND subject = ? AND teacher_id = ?";
                            $resultStmt = $conn->prepare($resultQuery);
                            $resultStmt->bind_param("isi", $student_id, $subject, $teacherid);
                            $resultStmt->execute();
                            $resultData = $resultStmt->get_result()->fetch_assoc();

                            $mid_exam = $resultData['mid_exam'] ?? 0;
                            $assignment = $resultData['assignment'] ?? 0;
                            $quiz = $resultData['quiz'] ?? 0;
                            $final_exam = $resultData['final_exam'] ?? 0;
                            $total = $mid_exam + $assignment + $quiz + $final_exam;
                        ?>
                        <tr>
                            <td><input type="text" name="student_ids[]" value="<?= $student_id ?>" readonly></td>
                            <td><?= htmlspecialchars($row['firstname'] . ' ' . $row['middlename']) ?></td>
                            <td><input type="number" name="mid_exam[<?= $student_id ?>]" value="<?= $mid_exam ?>" min="0" max="20" class="score-input"></td>
                            <td><input type="number" name="assignment[<?= $student_id ?>]" value="<?= $assignment ?>" min="0" max="20" class="score-input"></td>
                            <td><input type="number" name="quiz[<?= $student_id ?>]" value="<?= $quiz ?>" min="0" max="10" class="score-input"></td>
                            <td><input type="number" name="final_exam[<?= $student_id ?>]" value="<?= $final_exam ?>" min="0" max="50" class="score-input"></td>
                            <td><input type="number" value="<?= $total ?>" readonly class="total-field"></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn-submit">Save Results</button>
            </form>
        </section>
    </main>

    <script>
        // Live total calculation
        document.querySelectorAll('tbody tr').forEach(row => {
            const inputs = row.querySelectorAll('.score-input');
            const totalField = row.querySelector('.total-field');

            const updateTotal = () => {
                const values = Array.from(inputs).map(input => parseInt(input.value) || 0);
                const total = values.reduce((sum, val) => sum + val, 0);
                totalField.value = total;
            };

            inputs.forEach(input => input.addEventListener('input', updateTotal));
            updateTotal(); // Initialize total on page load
        });
    </script>
</body>
</html>
