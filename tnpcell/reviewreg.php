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
						<a href="../index.html" class="logo">Logout</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="studentdata.html">Student Database</a></li>
							<li><a href="recruiterdata.html">Recruiter Database</a></li>
							<li><a href="registrations.html">Registrations Database</a></li>
							<li><a href="placed.html">Placed Students</a></li>
							<li class="active"><a href="reviewreg.html">Review Registration</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Review Student Registration</h1>
								</header>							
							</section>

							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Company Name<input type="text" name="cname" id="cname" value="Intuit" />
									</div>
									<div class="col-6 col-12-xsmall">
										Student Name<input type="text" name="sname" id="sname" value="Taniya" />
									</div>
									<div class="col-6 col-12-xsmall">
										Recruiter Email<input type="text" name="remail" id="remail" value="blah@recruiter.in" />
									</div>
									<div class="col-6 col-12-xsmall">
										Student Email<input type="text" name="semail" id="semail" value="tanu@gmail.com" />
									</div>
									
									<div class="col-3 col-12-xsmall">
										Job Profile<input type="text" name="profile" id="profile" value="SDE" />
									</div>
									<div class="col-3 col-12-xsmall">
										Registration Date<input type="text" name="rdate" id="rdate" value="26-08-2020">
									</div>
									<div class="col-3 col-12-xsmall">
										Rounds<input type="text" name="round" id="round" value="0">
									</div>
									<div class="col-3 col-12-xsmall">
										Status
										<select>
											<option value="1" selected>Registered</option>
											<option value="2">Test Scheduled</option>
											<option value="3">Interview Scheduled</option>
											<option value="4">Shortlisted</option>
											<option value="5">Selected</option>
											<option value="6">Rejected</option>
										</select>
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><a href="registrations.php" class="button primary">Save</a></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>								
							</form>
						
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