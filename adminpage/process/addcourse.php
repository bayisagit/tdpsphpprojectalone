<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../homepage/login.php");
    exit();
}

require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = mysqli_real_escape_string($conn, trim($_POST['teacher_id']));
    $subject = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $class_level = mysqli_real_escape_string($conn, trim($_POST['class_level']));

    if (empty($teacher_id) || empty($subject) || empty($class_level)) {
        echo "<script>
                alert('All fields are required!');
                window.location.href='../addcourse.php';
              </script>";
        exit();
    }

    $teacher_check_query = "SELECT id FROM teacher WHERE id = '$teacher_id' LIMIT 1";
    $result = mysqli_query($conn, $teacher_check_query);
    $teacher = mysqli_fetch_assoc($result);

    if (!$teacher) {
        echo "<script>
                alert('Error: Teacher ID not found!');
                window.location.href='../addcourse.php';
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO course (subject, class_level, teacher_id) 
                            VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $subject, $class_level, $teacher_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Course added successfully!');
                window.location.href='../addcourses.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
