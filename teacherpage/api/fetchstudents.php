<?php
session_start();
header('Content-Type: application/json');
require '../../configure/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Unauthorized"]);
    http_response_code(401);
    exit();
}

$teacher_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT class FROM teacher WHERE id = ?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["error" => "Teacher not found"]);
    http_response_code(404);
    exit();
}

$teacher = $result->fetch_assoc();
$class = $teacher['class'];

$stmt = $conn->prepare("SELECT id, firstname, middlename, lastname, gender, class FROM student WHERE class = ?");
$stmt->bind_param("s", $class);
$stmt->execute();
$studentsResult = $stmt->get_result();

$students = [];
while ($row = $studentsResult->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode($students);
?>
