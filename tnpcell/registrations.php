<?php
session_start();
require_once "../connect.php";

if(!isset($_SESSION['admin']))
{
	header('Location:../loginAdmin.php');
	return;
}
$email = $_SESSION['admin'];

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Campus Recruitment | TNP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/tnpdash.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Header -->
					<header id="header">
						<a href="../index.html" class="logo">Home</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="studentdata.php">Student Database</a></li>
							<li><a href="recruiterdata.php">Recruiter Database</a></li>
							<li class="active"><a href="registrations.php">Registration Database</a></li>
							<li><a href="placed.php">Placed Students</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major align-center">
									<h1>Registration Database</h1>
								</header>							
							</section>

							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Company Name</th>
											<th>Student Email</th>
											<th>Recruiter Email</th>
											<th>Job Profile(s)</th>
											<th>Registration Date</th>
											<th>Rounds</th>
											<th>Status</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										
									<?php
										$stmt = $pdo->query("SELECT * FROM student_registrations");
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo "<tr>
											<td>";
											echo (htmlentities($row['rec_name']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['stu_id']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['rec_id']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['profile']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['applied_date']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['rounds']));
											echo ("</td>
											<td>");
											echo (htmlentities($row['status']));
											echo ("</td>
											<td><input type='button' name='register' value='Approve' class='small'></td>
											<td><a href='reviewreg.php' class='button small'></a></td>
										</tr>\n");
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
	</body>
</html>
