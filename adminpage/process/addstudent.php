<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);

    if (empty($firstname) || empty($middlename) || empty($lastname) || empty($email) || empty($phone) || empty($gender) || empty($class)) {
        echo "<script>
                alert('Please fill in all required fields.');
                window.history.back();
              </script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format.');
                window.history.back();
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO student (firstname, middlename, lastname, email, phone, gender, class) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $email, $phone, $gender, $class);

    if ($stmt->execute()) {
        echo "<script>
                alert('Student registered successfully!');
                window.location.href='../addstudent.php'; // Redirect back to the add student form
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
