<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = mysqli_real_escape_string($conn, trim($_POST['course_name']));
    $teacher_id = mysqli_real_escape_string($conn, trim($_POST['teacher_id']));
    $subject = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $class_level = mysqli_real_escape_string($conn, trim($_POST['class']));

    if (empty($course_name) || empty($teacher_id) || empty($subject) || empty($class_level)) {
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

    $stmt = $conn->prepare("INSERT INTO course (course_name, subject, class_level, teacher_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $course_name, $subject, $class_level, $teacher_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Course added successfully!');
                window.location.href='../addcourse.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
