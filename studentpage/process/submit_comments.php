<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = 'teacher'; 
    $comment_text = mysqli_real_escape_string($conn, trim($_POST['comment_text']));
    
    if (empty($comment_text)) {
        echo "<script>
                alert('Comment cannot be empty!');
                window.location.href='../home.php';  
              </script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO comments (user_type, comment_text) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_type, $comment_text); // 'ss' means two string parameters

    if ($stmt->execute()) {
        echo "<script>
                alert('Comment submitted successfully!');
                window.location.href='../home.php';  // Redirect to the comment page or desired page
              </script>";
    } else {
        echo "<script>
                alert('Error submitting comment!');
                window.location.href='../home.php';  // Redirect to the comment page
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
