<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = 'family';
    
    $comment_text = $_POST['comment'];

    $comment_text = trim($comment_text);

    if (empty($comment_text)) {
        echo "<script>
                alert('Comment cannot be empty!');
                window.location.href='../home.php'; // Redirect back to the family page
              </script>";
        exit();
    }

    $comment_text = mysqli_real_escape_string($conn, $comment_text);

    $sql = "INSERT INTO comments (user_type, comment_text) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $user_type, $comment_text);

        if ($stmt->execute()) {
            header("Location: ../home.php?status=success");
            exit();
        } else {
            echo "<script>
                    alert('Error submitting comment!');
                    window.location.href='../home.php'; // Redirect back
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Error preparing the query!');
                window.location.href='../home.php'; // Redirect back
              </script>";
    }

    $conn->close();
} else {
    echo "<script>
            alert('Invalid request method!');
            window.location.href='../home.php'; // Redirect back
          </script>";
}
?>
