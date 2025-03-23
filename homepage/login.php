<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/footer.css"/>
		<link rel="stylesheet" href="css/nav.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<link rel="icon" href="../images/favicon.png">

		<title>TDPSchool</title>
	</head>
	<body>
	<?php include ('../shared/header.php')?>
		<div class="main">
			<div class="login-container">
				<h1 class="login-title">Welcome to the Login Page</h1>
				<ul class="login-options">
					<li class="adminlogin"><a href="admin-login.php">Admin Login</a></li>
					<li class="teacherlogin"><a href="teacher-login.php">Teacher Login</a></li>
					<li class="studentlogin"><a href="student-login.php">Student Login</a></li>
					<li class="familylogin"><a href="family-login.php">Family Login</a></li>
				</ul>
				<hr class="hr">
				<p class="signup-text">Don't have an account? <a href="signup.php">Sign up</a></p>
			</div>					
		</div>
		<?php include ('../shared/footer.php') ?>
		<script src="./js/homepage.js"></script>	
		<script src="./js/login.js"></script>	
	</body>
</html>  
