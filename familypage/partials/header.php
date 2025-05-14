<?php
require '../configure/dbconnection.php'; 
$familyid = $_SESSION['user_id']; 

$query = "SELECT firstname,lastname,student_id FROM family WHERE id = ?";
$stmt = $conn->prepare($query);  
$stmt->bind_param("i", $familyid);  
$stmt->execute(); 
$result = $stmt->get_result();  
$row = $result->fetch_assoc();  

$familyname = $row["firstname"] ." ". $row["lastname"];
$studentid = $row["student_id"];
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

        <li class="<?= ($current_page == 'myresult.php') ? 'active' : ''; ?>">
            <i class="fa fa-graduation-cap"></i><a href="yourchildresult.php"> Your Child Results</a>
        </li>
    </ul>
</aside>
<header>
    <div class="navs">
        <ul class="navss">
            <li><a href="../home.php">Home</a></li>
            <li><a href="../homepage/announcement.php">Announcement</a></li>
            <li><a href="../homepage/about.php">About</a></li>
            <li><a href="../familypage/partials/logout.php" class="logout"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
	<div class="schol">Welcome To Your Family Page</div>
	<div class="user">
		<span><i class="fa fa-user"></i>Family</span>
        <p>Name: <?= htmlspecialchars($familyname) ?></p>
        <p>Your ID: <?= htmlspecialchars($familyid) ?></p>
        <p>Your Child ID: <?=htmlspecialchars(string: $studentid) ?></p>
	</div>
</header>


