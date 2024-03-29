<?php
session_start();
require_once "../connect.php";

if (!isset($_SESSION['email'])) {
	header('Location:../loginStudent.php');
	return;
}
$email = $_SESSION['email'];

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
				<li class="active"><a href="registrations.php">Registrations</a></li>
				<li><a href="profile.php">Profile</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Registrations</h1>
				</header>
				<p>
					View the recruiters you have applied to and track the status of your application.
					<br />
				</p>
			</section>

			<!-- Table -->
			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Recruiter</th>
							<th>Date Applied</th>
							<th>Deadline</th>
							<th>Rounds</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stmt = $pdo->query("SELECT * FROM student_registrations where stu_id='$email' and approve=1");
						$x = 1;
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>
											<td>";
							echo ($x++);
							echo ("</td>
											<td>");
							echo (htmlentities($row['rec_name']));
							echo ("</td>
											<td>");
							echo (htmlentities($row['applied_date']));
							echo ("</td>
											<td>");
							echo (htmlentities($row['deadline_date']));
							echo ("</td>
											<td>");
							echo (htmlentities($row['rounds']));
							echo ("</td>
											<td>");
							echo (htmlentities($row['status']));
							echo ("</td>
											</tr>");
						}
						?>


					</tbody>
				</table>
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