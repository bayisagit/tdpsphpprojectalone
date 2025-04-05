<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/takeresult.css">
    <link rel="stylesheet" href="partials/teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
    <section class="teacher-results">
            <h2>Results for Mathematics</h2>
            <form action="process_results.php" method="POST">
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
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="john_math_id" value="S1001" readonly></td>
                            <td>John Doe</td>
                            <td><input type="number" name="john_math_mid" value="18" min="0" max="20" required></td>
                            <td><input type="number" name="john_math_assignment" value="17" min="0" max="20" required></td>
                            <td><input type="number" name="john_math_quiz" value="9" min="0" max="10" required></td>
                            <td><input type="number" name="john_math_final" value="45" min="0" max="50" required></td>
                            <td><input type="number" name="john_math_total" value="89" min="0" max="100" readonly></td>
                            <td><input type="text" name="john_math_grade" value="B" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="jane_math_id" value="S1002" readonly></td>
                            <td>Jane Smith</td>
                            <td><input type="number" name="jane_math_mid" value="19" min="0" max="20" required></td>
                            <td><input type="number" name="jane_math_assignment" value="18" min="0" max="20" required></td>
                            <td><input type="number" name="jane_math_quiz" value="10" min="0" max="10" required></td>
                            <td><input type="number" name="jane_math_final" value="48" min="0" max="50" required></td>
                            <td><input type="number" name="jane_math_total" value="95" min="0" max="100" readonly></td>
                            <td><input type="text" name="jane_math_grade" value="A" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="mike_math_id" value="S1003" readonly></td>
                            <td>Mike Jordan</td>
                            <td><input type="number" name="mike_math_mid" value="17" min="0" max="20" required></td>
                            <td><input type="number" name="mike_math_assignment" value="16" min="0" max="20" required></td>
                            <td><input type="number" name="mike_math_quiz" value="8" min="0" max="10" required></td>
                            <td><input type="number" name="mike_math_final" value="40" min="0" max="50" required></td>
                            <td><input type="number" name="mike_math_total" value="81" min="0" max="100" readonly></td>
                            <td><input type="text" name="mike_math_grade" value="B" readonly></td>
                        </tr>
                        <!-- Add more rows for other students as needed -->
                    </tbody>
                </table>
                <button type="submit" class="btn-submit">Save Results</button>
            </form>
        </section>
    </main>
</body>
</html>