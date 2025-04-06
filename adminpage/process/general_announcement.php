<?php
require '../../configure/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $content = mysqli_real_escape_string($conn, trim($_POST['content']));
    $image_url = "";

    if (empty($title) || empty($content)) {
        echo "<script>
                alert('Title and content are required!');
                window.location.href='../general_announcement.php';
              </script>";
        exit();
    }

    $content_lines = count(explode("\n", $content));
    if ($content_lines > 7) {
        echo "<script>
                alert('Announcement content must not exceed 7 lines!');
                window.location.href='../general_announcement.php';
              </script>";
        exit();
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "uploads/";
        $file_name = time() . "_" . basename($_FILES["image"]["name"]); 
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "<script>
                    alert('Uploaded file is not an image.');
                    window.location.href='../general_announcement.php';
                  </script>";
            exit();
        }

        $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_formats)) {
            echo "<script>
                    alert('Invalid image format! Only JPG, JPEG, PNG, and GIF are allowed.');
                    window.location.href='../general_announcement.php';
                  </script>";
            exit();
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;  // Store the image URL
        } else {
            echo "<script>
                    alert('Error uploading image.');
                    window.location.href='../general_announcement.php';
                  </script>";
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO general_announcement (title, content, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image_url);

    if ($stmt->execute()) {
        echo "<script>
                alert('Announcement posted successfully!');
                window.location.href='../general_announcement.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
