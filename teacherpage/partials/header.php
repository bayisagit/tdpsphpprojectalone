<aside class="sidebar">
    <div class="logo">
        <h2><i class="fa fa-user-graduate fa-3x"></i></h2>
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
    </ul>
</aside>
<header>
	<div class="schol">Welcome To Your Teacher Page</div>
	<div class="user">
		<span><i class="fa fa-user"></i>Teacher</span>
		<button class="logout">Logout</button>
	</div>
</header>


