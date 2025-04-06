<?php
session_start();

require '../configure/dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userType = mysqli_real_escape_string($conn, $_POST['user_type']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Assuming 'id' is the login password

    if (empty($userType) || empty($email) || empty($id)) {
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: login.php");
        exit();
    }

    switch ($userType) {
        case 'admin':
            $table = 'admin';
            break;
        case 'teacher':
            $table = 'teacher';
            break;
        case 'student':
            $table = 'student';
            break;
        case 'family':
            $table = 'family';
            break;
        default:
            $_SESSION['error'] = "Invalid user type.";
            header("Location: login.php");
            exit();
    }

    $query = "SELECT * FROM $table WHERE email = '$email' AND id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_type'] = $userType;

        switch ($userType) {
            case 'admin':
                header("Location: ../adminpage/home.php");
                break;
            case 'teacher':
                header("Location: ../teacherpage/home.php");
                break;
            case 'student':
                header("Location: ../studentpage/home.php");
                break;
            case 'family':
                header("Location: ../familypage/home.php");
                break;
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or ID.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
