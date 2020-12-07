<?php
session_start();
require_once "connect.php";

$email=$_SESSION['username'];

$stmt= $pdo->query("SELECT * FROM company_data where company_email='$email'");
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Campus Recruitment | Recruiter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/dashboard.css" />
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
							<li><a href="applications.php">Applications</a></li>
							<li class="active"><a href="profile.php">Profile</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
					<?php

					if(count($rows)){
						$stmt = $pdo->query("SELECT * FROM company_data where company_email='$email'");
						while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
							$name= htmlentities($row['company_name']);
							$email= htmlentities($row['company_email']);
							$domain=htmlentities($row['domain']);
							$phone=htmlentities($row['company_contact']);
							$job_profiles=htmlentities($row['job_profiles']);
							$location= htmlentities($row['location']);
							$ctc=htmlentities($row['ctc']);
							$base=htmlentities($row['base']);
							$test_date=date("d-M-Y", strtotime($row['test_date']));
							$interview_date=date("d-M-Y", strtotime($row['interview_date']));
							$deadline_date=date("d-M-Y", strtotime($row['deadline_date']));
							$min= htmlentities($row['min_shortlist']);
							$hr=htmlentities($row['hr_name']);
							$poc=htmlentities($row['poc_name']);
							$poc_contact=htmlentities($row['poc_contact']);
						}
					}		


					?>
						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Company Profile</h1>
								</header>							
							</section>

							<div class="table-wrapper">
								<table>
									<tbody>
										<tr>
											<td>Company Name</td>
											<td><?= $name ?></td>
										</tr>
										<tr>
											<td>Recruitment Manager</td>
											<td><?= $hr?></td>
										</tr>
										<tr>
											<td>Domain</td>
											<td><?= $domain?></td>
										</tr>
										<tr>
											<td>Recruiter Email</td>
											<td><?= $email?></td>
										</tr>
										<tr>
											<td>Contact No.</td>
											<td><?= $phone?></td>
										</tr>
										<tr>
											<td>Job Profile(s)</td>
											<td><?= $job_profiles?></td>
										</tr>
										<tr>
											<td>Location</td>
											<td><?= $location?></td>
										</tr>
										<tr>
											<td>Compensation (CTC)</td>
											<td><?= $ctc?></td>
										</tr>
										<tr>
											<td>Base Salary</td>
											<td><?= $base?></td>
										</tr>
										<tr>
											<td>Test Date</td>
											<td><?= $test_date?></td>
										</tr>
										<tr>
											<td>Interview Date</td>
											<td><?= $interview_date?></td>
										</tr>
										<tr>
											<td>Registration Deadline</td>
											<td><?= $deadline_date?></td>
										</tr>
										<tr>
											<td>Minimum Shortlists</td>
											<td><?= $min?></td>
										</tr>
										<tr>
											<td>Point of Contact</td>
											<td><?= $poc?></td>
										</tr>
										<tr>
											<td>POC Contact</td>
											<td><?= $poc_contact?></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-12">
								<ul class="actions">
									<li><a href="editprofile.php" class="button primary">Edit</a></li>
									<li><a href="editprofile.php" class="button">Reset Password</a></li>
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

	</body>
</html>