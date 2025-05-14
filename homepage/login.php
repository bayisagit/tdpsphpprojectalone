<?php
session_start();

// 🚫 Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// ✅ If already logged in, redirect to homepage
if (isset($_SESSION['user_type'])) {
    header("Location: ../home.php");
    exit;
}

// Check if the "Remember Me" cookie is set
if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_type'])) {
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['user_type'] = $_COOKIE['user_type'];
    header("Location: ../home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="../images/favicon.png">	
	<link rel="stylesheet" href="css/login.css"/>	
	<link rel="stylesheet" href="css/nav.css"/>
	<link rel="stylesheet" href="css/footer.css"/>
	<title>TDPSchool</title>
</head>
<body>
	<?php include ('../shared/header.php') ?>

	<div class="main">
		<div class="image">
			<img src="../images/image10.png" alt="signin">
		</div>    

		<div class="login-container">
			<h1 class="login-title">Welcome to the Login Page</h1>
			<?php if (isset($_SESSION['error'])): ?>
				<p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
			<?php endif; ?>
			
			<form action="handlelogin.php" method="POST" class="login-form">
				<label for="user_type">Select Your Role:</label>
				<select name="user_type" id="user_type" required>
					<option value="">-- Select Role --</option>
					<option value="admin">Admin</option>
					<option value="teacher">Teacher</option>
					<option value="student">Student</option>
					<option value="family">Family</option>
				</select>

				<label for="email">Email:</label>
				<input type="text" id="email" name="email" required placeholder="Email .....">

				<label for="id">Id:</label>
				<input type="password" id="id" name="id" required placeholder="Id ....">

				<!-- Remember me checkbox -->
				<label for="remember_me">
					<input type="checkbox" name="remember_me" id="remember_me" /> Remember me for a month
				</label>

				<input type="submit" value="Login">
			</form>
		</div>
	</div>

	<?php include ('../shared/footer.php') ?>
	<script src="./js/homepage.js"></script>	
	<script src="./js/login.js"></script>	
</body>
</html>
