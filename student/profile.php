<?php
session_start();
require_once "../connect.php";
if (!isset($_SESSION['email'])) {
	header('Location:../loginStudent.php');
	return;
}
$email = $_SESSION['email'];

$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
$rows = $stmt->fetch(PDO::FETCH_ASSOC)

?>

<!DOCTYPE HTML>

<html>

<head>
	<title>IGDTUW Recruitment | Student</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/dashboard.css" />
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">

		<!-- Header -->
		<header id="header">
			<a href="../logout.php" class="logo">Logout</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="noticeboard.php">Notice Board</a></li>
				<li><a href="registrations.php">Registrations</a></li>
				<li class="active"><a href="profile.php">Profile</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<?php

			if (count($rows)) {
				$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$name = htmlentities($row['Name']);
					$email = htmlentities($row['email']);
					$enrol = htmlentities($row['enroll_no']);
					$contact = htmlentities($row['contact']);
					$deadBack = htmlentities($row['dead_back']);
					$activeBack = htmlentities($row['active_back']);
					$CGPA = htmlentities($row['CGPA']);
					$year = htmlentities($row['grad_year']);
					$resume = htmlentities($row['resume']);
					$password = htmlentities($row['password']);
				}
			}


			?>

			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Student Profile</h1>
				</header>
			</section>

			<div class="table-wrapper">
				<table>
					<tbody>
						<tr>
							<td>Name</td>
							<td><?= $name ?></td>
						</tr>
						<tr>
							<td>Enrollment Number</td>
							<td><?= $enrol ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $email ?></td>
						</tr>
						<tr>
							<td>Contact No.</td>
							<td><?= $contact ?></td>
						</tr>
						<tr>
							<td>CGPA</td>
							<td><?= $CGPA ?></td>
						</tr>
						<tr>
							<td>Active Back</td>
							<td><?= $activeBack ?></td>
						</tr>
						<tr>
							<td>Dead Back</td>
							<td><?= $deadBack ?></td>
						</tr>
						<tr>
							<td>Resume Link</td>
							<td>
							    <?php
							    echo '<a href="uploads/'.$resume.'" target="_blank">';
							    ?><?= $resume ?></a></td>
						</tr>
						<tr>
							<td>Year</td>
							<td>
								<?= $year ?>
						</tr>
						</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-12">
				<ul class="actions">
					<li><a href="editprofile.php" class="button primary">Edit</a></li>
				</ul>
			</div>


		</div>



		<!-- Copyright -->
		<div id="copyright">
			<p> &copy; Copyright 2020 | Design: Team 23</p>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script type="text/javascript">
		var timer = setInterval(function() {
			auto_logout()
		}, 600000);

		function reset_interval() {
			clearInterval(timer);
			timer = setInterval(function() {
				auto_logout()
			}, 600000);
		}

		function auto_logout() {

			if (!alert("Your session has ended due to inactivity, click Ok to login to the portal again.")) {
				window.location = "../logout.php";
			}

		}
	</script>

</body>

</html>