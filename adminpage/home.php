<?php
require '../configure/dbconnection.php';

$query_announcements = "SELECT COUNT(*) AS count FROM general_announcement WHERE date_posted >= CURDATE()";
$result_announcements = $conn->query($query_announcements);
$announcements_count = $result_announcements->fetch_assoc()['count'];

$query_teacher_comments = "SELECT COUNT(*) AS count FROM comments WHERE user_type = 'teacher'";
$result_teacher_comments = $conn->query($query_teacher_comments);
$teacher_comments_count = $result_teacher_comments->fetch_assoc()['count'];

$query_family_comments = "SELECT COUNT(*) AS count FROM comments WHERE user_type = 'family'";
$result_family_comments = $conn->query($query_family_comments);
$family_comments_count = $result_family_comments->fetch_assoc()['count'];

$query_policy_updates = "SELECT COUNT(*) AS count FROM general_announcement WHERE title LIKE '%policy%'";
$result_policy_updates = $conn->query($query_policy_updates);
$policy_updates_count = $result_policy_updates->fetch_assoc()['count'];

$query_assignments = "SELECT COUNT(*) AS count FROM assignment WHERE due_date >= CURDATE()";
$result_assignments = $conn->query($query_assignments);
$assignments_count = $result_assignments->fetch_assoc()['count'];

$query_teachers_available = "SELECT COUNT(*) AS count FROM teacher WHERE id IN (SELECT DISTINCT teacher_id FROM course)";
$result_teachers_available = $conn->query($query_teachers_available);
$teachers_available_count = $result_teachers_available->fetch_assoc()['count'];

$query_active_classes = "SELECT COUNT(*) AS count FROM course WHERE teacher_id IN (SELECT teacher_id FROM teacher)";
$result_active_classes = $conn->query($query_active_classes);
$active_classes_count = $result_active_classes->fetch_assoc()['count'];

$query_parent_participation = "SELECT COUNT(*) AS count FROM family WHERE student_id IN (SELECT DISTINCT student_id FROM comments WHERE user_type = 'family')";
$result_parent_participation = $conn->query($query_parent_participation);
$parent_participation_count = $result_parent_participation->fetch_assoc()['count'];

$query_important_notices = "SELECT COUNT(*) AS count FROM general_announcement WHERE title LIKE '%important%'";
$result_important_notices = $conn->query($query_important_notices);
$important_notices_count = $result_important_notices->fetch_assoc()['count'];
?>
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
					<h3><?= $announcements_count; ?></h3>
					<p>New Announcements</p>
				</div>

				<div class="card orange">
					<h3><?= $teacher_comments_count; ?></h3>
					<p>Teacher Comments</p>
				</div>

				<div class="card blue">
					<h3><?= $family_comments_count; ?></h3>
					<p>Family Comments</p>
				</div>

				<div class="card black">
					<h3><?= $policy_updates_count; ?></h3>
					<p>School Policy Updates</p>
				</div>

				<div class="card teal">
					<h3><?= $assignments_count; ?></h3>
					<p>Assignments Due</p>
				</div>

				<div class="card purple">
					<h3><?= $teachers_available_count; ?></h3>
					<p>Teachers Available</p>
				</div>

				<div class="card brown">
					<h3><?= $active_classes_count; ?></h3>
					<p>Active Classes</p>
				</div>

				<div class="card pink">
					<h3><?= $parent_participation_count; ?></h3>
					<p>Parents Engaged</p>
				</div>

				<div class="card cyan">
					<h3><?= $important_notices_count; ?></h3>
					<p>Important Notices</p>
				</div>
			</div>
			<div class="calendar-section">
				<h2>School Calendar</h2>
				<iframe 
					src="https://calendar.google.com/calendar/embed?src=421965033ceb0d38e5102cf5a923acc9843453eed7e189686106dfd3ec2c779b%40group.calendar.google.com&ctz=Africa%2FNairobi"
					style="border: 0" width="100%" height="600" frameborder="0" scrolling="no">
				</iframe>
			</div>
		</section>
	</main>
</body>
</html>