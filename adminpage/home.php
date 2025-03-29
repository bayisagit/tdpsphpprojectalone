<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminpage.css">
	<link rel="stylesheet" href="partials/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
	<?php
	include("partials/header.php");
	?>
	<main class="main-content">
		<section class="dashboard">
			<h2>Admin Dashboard</h2>
			<div class="cards">
				<div class="card green">
					<h3>3600</h3>
					<p>Fees Collected</p>
				</div>
				<div class="card orange">
					<h3>14</h3>
					<p>Students</p>
				</div>
				<div class="card blue">
					<h3>9</h3>
					<p>Teachers</p>
				</div>
				<div class="card black">
					<h3>4</h3>
					<p>Available Classes</p>
				</div>
				<div class="card teal">
					<h3>0</h3>
					<p>Today's Attendance</p>
				</div>
				<div class="card purple">
					<h3>12</h3>
					<p>Parents</p>
				</div>
				<div class="card brown">
					<h3>2</h3>
					<p>Unpaid Fees</p>
				</div>
				<div class="card pink">
					<h3>1</h3>
					<p>Inbox</p>
				</div>
				<div class="card cyan">
					<h3>1</h3>
					<p>Notice</p>
				</div>
			</div>
		</section>
	</main>
</body>
</html>