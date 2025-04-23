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
			<div class="image">
				<img src="../images/image10.png" alt="signin">
		    </div>    
			<div class="login-container">
					<h1 class="login-title">Welcome to the Login Page</h1>
					<form action="handlelogin.php" method="POST" class="login-form">
						<label for="user_type">Select Your Role:</label>
						<select name="user_type" id="user_type" required>
							<option value="">-- Select Role --</option>
							<option value="admin">Admin</option>
							<option value="teacher">Teacher</option>
							<option value="student">Student</option>
							<option value="family">Family</option>
						</select>

						<label for="username">Email:</label>
						<input type="text" id="email" name="email" required placeholder="Email .....">

						<label for="password">Id:</label>
						<input type="password" id="id" name="id" required placeholder="Id ....">

						<input type="submit" value="Login"></input>
					</form>
				</div>
			</div>
		<?php include ('../shared/footer.php') ?>
		<script src="./js/homepage.js"></script>	
		<script src="./js/login.js"></script>	
	</body>
</html>  
