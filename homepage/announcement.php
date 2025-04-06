<?php
require '../configure/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/announcement.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="icon" href="../images/favicon.png">
    <title>TDPSchool</title>
</head>
<body>
<?php include('../shared/header.php') ?>
<main class="container">
    <article class="hero">
        <h1 class="hero-header">Creating The Future</h1>
        <p class="hero-paragraph">
            Dive into the heart of Tullu Dimtu Primary School's dynamic news scene. From groundbreaking achievements to heartwarming stories, our news section brings you the latest and greatest from the Gallanguraa community. Explore the stories that make us proud to be part of this exceptional educational journey.
        </p>
    </article>

    <article class="img-container">
        <?php
        // Fetch and display each announcement
		$sql = "SELECT * FROM general_announcement ORDER BY date_posted DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $image = $row['image_url'];
                $title = $row['title'];
                $content = $row['content'];

                echo '<section class="hold img-1-section">
                        <figure class="image-1">
                            <img src="../adminpage/process/' .$image. '" alt="image" width="400" height="249" />
                            <figcaption>
                                <h3>'.$title.'</h3>
                            </figcaption>
                        </figure>
                        <p class="img-1-paragraph">'.$content.'</p>
                      </section>';
            }
        } else {
            echo "<p>No announcements found.</p>";
        }

        $conn->close();
        ?>
    </article>
</main>

<?php include('../shared/footer.php') ?>
<script src="./js/homepage.js"></script>
</body>
</html>
