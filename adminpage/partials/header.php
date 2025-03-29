<aside class="sidebar">
    <div class="logo">
        <h2><i class="fa fa-user-graduate fa-3x"></i></h2>
        <h2><a href="./home.php">TDPS</a></h2>
    </div>
    <ul>
        <?php 
        $current_page = basename($_SERVER['PHP_SELF']); 
        ?>

        <li class="<?= ($current_page == 'addstudent.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-plus"></i><a href="addstudent.php"> Add Student</a>
        </li>

        <li class="<?= ($current_page == 'viewstudent.php') ? 'active' : ''; ?>">
            <i class="fa fa-users"></i><a href="viewstudent.php"> View Student</a>
        </li>

        <li class="<?= ($current_page == 'addteacher.php') ? 'active' : ''; ?>">
            <i class="fa fa-user-plus"></i><a href="addteacher.php"> Add Teacher</a>
        </li>

        <li class="<?= ($current_page == 'viewteacher.php') ? 'active' : ''; ?>">
            <i class="fa fa-chalkboard-teacher"></i><a href="viewteacher.php"> View Teacher</a>
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
            <i class="fa fa-user-friends"></i><a href="viewfamily.php"> View Family</a>
        </li>
    </ul>
</aside>
<header>
	<div class="schol">School Management System</div>
	<div class="user">
		<span><i class="fa fa-user"></i>Admin</span>
		<button class="logout">Logout</button>
	</div>
</header>


