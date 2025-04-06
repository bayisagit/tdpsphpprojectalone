<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $student_id = mysqli_real_escape_string($conn, trim($_POST['student_id']));

    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($address) || empty($student_id)) {
        echo "<script>
                alert('All fields are required!');
                window.location.href='../addfamily.php';
              </script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format!');
                window.location.href='../addfamily.php';
              </script>";
        exit();
    }

    $student_check_query = "SELECT id FROM student WHERE id = '$student_id' LIMIT 1";
    $result = mysqli_query($conn, $student_check_query);
    $student = mysqli_fetch_assoc($result);

    if (!$student) {
        echo "<script>
                alert('Error: Student ID not found!');
                window.location.href='../addfamily.php';
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO family (firstname, lastname, email, phone, address, student_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstname, $lastname, $email, $phone, $address, $student_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Family registered successfully!');
                window.location.href='../addfamily.php'; // Redirect back to the family registration page
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
