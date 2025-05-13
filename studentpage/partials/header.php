<?php
require '../configure/dbconnection.php'; 
$studentid = $_SESSION['user_id']; 

$query = "SELECT firstname,middlename FROM student WHERE id = ?";
$stmt = $conn->prepare($query);  
$stmt->bind_param("i", $studentid);  
$stmt->execute(); 
$result = $stmt->get_result();  
$row = $result->fetch_assoc();  

$studentname = $row["firstname"] ." ". $row["middlename"];
?>
<aside class="sidebar">
    <div class="logo">
        <h2><i class="fa fa-user-graduate iconresponsive"></i></h2>
        <h2><a href="./home.php">TDPS</a></h2>
    </div>
    <ul>
        <?php 
        $current_page = basename($_SERVER['PHP_SELF']); 
        ?>
        <li class="<?= ($current_page == 'profile.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-circle"></i><a href="profile.php"> Profile</a>
        </li>

        <li class="<?= ($current_page == 'mycourses.php') ? 'active' : ''; ?>">
            <i class="fa fa-list"></i><a href="mycourses.php"> My Courses</a>
        </li>

        <li class="<?= ($current_page == 'myresult.php') ? 'active' : ''; ?>">
            <i class="fa fa-graduation-cap"></i><a href="myresult.php"> My Results</a>
        </li>
    </ul>
</aside>
<header>
    <div class="navs">
        <ul class="navss">
            <li><a href="../homepage/home.php">Home</a></li>
            <li><a href="../homepage/announcement.php">Announcement</a></li>
            <li><a href="../homepage/about.php">About</a></li>
            <li><a href="../studentpage/partials/logout.php" class="logout"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
	<div class="schol">Welcome To Your page</div>
	<div class="user">
		<span><i class="fa fa-user"></i>student</span>
        
        <p>Name: <?= htmlspecialchars($studentname) ?></p>
        <p>ID: <?= htmlspecialchars($studentid) ?></p>
	</div>
</header>

