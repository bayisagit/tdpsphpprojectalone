<?php
require '../configure/dbconnection.php'; 
$admin_id = $_SESSION['user_id']; 

$query = "SELECT image_url, firstname, lastname FROM admin WHERE id = ?";
$stmt = $conn->prepare($query);  
$stmt->bind_param("i", $admin_id);  
$stmt->execute(); 
$result = $stmt->get_result();  
$row = $result->fetch_assoc();  

$image_url = $row['image_url'];  
$admin_name = $row['firstname'];
$lastname = $row['lastname'];
?>

<aside class="sidebar">
    <div class="logo">
        <h2>
            <img src="<?= $image_url  ?>" alt="Admin Logo" class="logo-image">
        </h2>
        <h2>
            <a href="./home.php">TDPS</a>
        </h2>
    </div>
    <ul>
        <?php 
        $current_page = basename($_SERVER['PHP_SELF']); 
        ?>
        <li class="<?= ($current_page == 'addstudent.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-plus"></i><a href="addstudent.php"> Add Student</a>
        </li>

        <li class="<?= ($current_page == 'viewstudent.php') ? 'active' : ''; ?>">
            <i class="fa fa-users"></i><a href="viewstudent.php"> View Students</a>
        </li>

        <li class="<?= ($current_page == 'addteacher.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-plus"></i><a href="addteacher.php"> Add Teacher</a>
        </li>

        <li class="<?= ($current_page == 'viewteacher.php') ? 'active' : ''; ?>">
            <i class="fa fa-chalkboard-teacher"></i><a href="viewteacher.php"> View Teachers</a>
        </li>

        <li class="<?= ($current_page == 'addcourses.php') ? 'active' : ''; ?>">
            <i class="fa fa-book"></i><a href="addcourses.php"> Add Courses</a>
        </li>

        <li class="<?= ($current_page == 'viewcourses.php') ? 'active' : ''; ?>">
            <i class="fa fa-book-open"></i><a href="viewcourses.php"> View Courses</a>
        </li>

        <li class="<?= ($current_page == 'addfamily.php') ? 'active' : ''; ?>">
            <i class="fa fa-users"></i><a href="addfamily.php"> Add Family</a>
        </li>

        <li class="<?= ($current_page == 'viewfamily.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-friends"></i><a href="viewfamily.php"> View Familys</a>
        </li>
        <li class="<?= ($current_page == 'general_announcement.php') ? 'active' : ''; ?>">
            <i class="fa fa-bullhorn"></i><a href="general_announcement.php"> General Announcement</a>
        </li>

        <li class="<?= ($current_page == 'member_announcement.php') ? 'active' : ''; ?>">
            <i class="fa fa-bullhorn"></i><a href="member_announcement.php"> Member Announcement</a>
        </li>
    </ul>
</aside>

<header>
    <div class="navs">
        <ul class="navss">
            <li><a href="../home.php">Home</a></li>
            <li><a href="../homepage/announcement.php">Announcement</a></li>
            <li><a href="../homepage/about.php">About</a></li>
            <li><a href="../adminpage/partials/logout.php" class="logout"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="schol">School Management System</div>
    <div class="user">
        <span><i class="fa fa-user"></i>Admin</span>
        <span><?= ucfirst(strtolower($admin_name)) . " " . ucfirst(strtolower($lastname)) ?></span>
    </div>
</header>
