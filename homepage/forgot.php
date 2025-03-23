<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="../images/favicon.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/forgot.css" />
		<link rel="stylesheet" href="./css/footer.css" />
		<link rel="stylesheet" href="./css/nav.css" />
		<title>TDPSchool</title>
	</head>
	<body>
	<?php include ('../shared/header.php')?>
		<main>
			<div class="wrapper">
				<form action="">
					<h1>Forgot password</h1>
					<div class="input-box">
						<input type="email" placeholder="Email" required>
						<i class='bx bxs-envelope'></i>
					</div>
					<div class="remember-forgot">
						<label>
							<input type="checkbox">Remember me
						</label>
					</div>
					<button type="submit" class="btn">Send Email</button>
				</form>
			</div>
		</main>
		<?php include ('../shared/footer.php') ?>
		<script src="./js/homepage.js"></script>
		<script src="./js/forgot.js"></script>		
	</body>
</html>
