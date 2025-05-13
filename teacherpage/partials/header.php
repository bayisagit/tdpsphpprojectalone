<?php
require '../configure/dbconnection.php'; 
$teacherid = $_SESSION['user_id']; 

$query = "SELECT firstname, middlename, subject FROM teacher WHERE id = ?";
$stmt = $conn->prepare($query);  
$stmt->bind_param("i", $teacherid);  
$stmt->execute(); 
$result = $stmt->get_result();  
$row = $result->fetch_assoc();  

$teachername = $row["firstname"] ." ". $row["middlename"];
$teachersubject = $row["subject"];
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
        
        <li class="<?= ($current_page == 'takeresult.php') ? 'active' : ''; ?>">
            <i class="fa fa-graduation-cap"></i><a href="takeresult.php"> Take Results</a>
        </li>
        <li class="<?= ($current_page == 'viewstudent.php') ? 'active' : ''; ?>">
            <i class="fa fa-eye"></i><a href="viewstudent.php">View Students</a>
        </li>
    </ul>
</aside>
<header>
    <div class="navs">
        <ul class="navss">
            <li><a href="../homepage/home.php">Home</a></li>
            <li><a href="../homepage/announcement.php">Announcement</a></li>
            <li><a href="../homepage/about.php">About</a></li>
            <li><a href="../teacherpage/partials/logout.php" class="logout"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
	<div class="schol">Welcome To Your Teacher Page</div>
	<div class="user">
		<span><i class="fa fa-user"></i>Teacher</span>
        <p>Name: <?= htmlspecialchars($teachername) ?></p>
        <p>ID: <?= htmlspecialchars($teacherid) ?></p>
        <p>Subject: <?=htmlspecialchars($teachersubject)?></p>
	</div>
</header>


