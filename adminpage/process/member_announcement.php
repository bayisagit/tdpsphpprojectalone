<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $audience = mysqli_real_escape_string($conn, trim($_POST['audience']));
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $content = mysqli_real_escape_string($conn, trim($_POST['content']));

    if (empty($audience) || empty($title) || empty($content)) {
        echo "<script>
                alert('All fields are required!');
                window.location.href='../member_announcement.php';
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO member_announcement (announcement_for, title, announcement_content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $audience, $title, $content);

    if ($stmt->execute()) {
        echo "<script>
                alert('Announcement posted successfully!');
                window.location.href='../member_announcement.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
