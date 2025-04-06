<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/footer.css" />
		<link rel="stylesheet" href="css/nav.css" />
		<link rel="stylesheet" href="css/loginpages.css" />

		<link rel="icon" href="../images/favicon.png">
		
		<title>TDPSchool</title>
	</head>
	<body>
	<?php include ('../shared/header.php')?>
		<div class="main">
			<div>
				<form action="../configure/teacher-login.php" method="POST">
					<h1>Teacher Login</h1>
					<div class="input-box">
						<input type="email" name="email" placeholder="Email" required>
						<i class='bx bxs-envelope'></i>
					</div>
					<div class="input-box">
						<input type="number" name="id" placeholder="Id" required>
						<i class='bx bxs-lock-alt'></i>
					</div>
					<div class="remember-forgot">
						<label>
							<input type="checkbox">Remember me
						</label>
						<a href="./forgot.php">Forgot password?</a>
					</div>
					<button type="submit" class="btn">Login</button>
				</form>
			</div>
		</div>
		<?php include ('../shared/footer.php') ?>
		<script src="./js/homepage.js"></script>	
		<script src="./js/login.js"></script>	
	</body>
</html>  
