<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $middlename = mysqli_real_escape_string($conn, trim($_POST['middlename']));
    $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $class = mysqli_real_escape_string($conn, trim($_POST['class']));
    $subject = mysqli_real_escape_string($conn, trim($_POST['subject']));

    if (empty($firstname) || empty($middlename) || empty($lastname) || empty($email) || empty($phone) || empty($gender) || empty($class) || empty($subject)) {
        echo "<script>
                alert('All fields are required!');
                window.location.href='../addteacher.php';
              </script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format!');
                window.location.href='../addteacher.php';
              </script>";
        exit();
    }

    $email_check_query = "SELECT id FROM teacher WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $email_check_query);
    $teacher = mysqli_fetch_assoc($result);

    if ($teacher) {
        echo "<script>
                alert('Email is already registered!');
                window.location.href='../addteacher.php';
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO teacher (firstname, middlename, lastname, email, phone, gender, class, subject) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $firstname, $middlename, $lastname, $email, $phone, $gender, $class, $subject);

    if ($stmt->execute()) {
        echo "<script>
                alert('Teacher registered successfully!');
                window.location.href='../addteacher.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
