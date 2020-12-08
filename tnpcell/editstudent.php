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
							<li><a href="registrations.php">Registrations Database</a></li>
							<li><a href="placed.php">Placed Students</a></li>
							<li class="active"><a href="editstudent.html">Edit Student</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Edit Student Profile</h1>
								</header>							
							</section>

							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Full Name<input type="text" name="fname" id="fname" value="Taniya Rawat" />
									</div>
									<div class="col-6 col-12-xsmall">
										Enrollment No.<input type="text" name="roll" id="roll" value="10001012017" />
									</div>
									<div class="col-6 col-12-xsmall">
										Email<input type="text" name="email" id="email" value="shreya093btcse17@igstuw.ac.in" />
									</div>
									<div class="col-6 col-12-xsmall">
										Contact No.<input type="text" name="phone" id="phone" value="123456987" />
									</div>
									<div class="col-3 col-12-xsmall">
										CGPA<input type="text" name="cgpa" id="cgpa" value="8.9" />
									</div>
									<div class="col-3 col-12-xsmall">
										Year
										<select name="year" id="year">
											<option value="">- Year -</option>
											<option value="1">1st</option>
											<option value="2">2nd</option>
											<option value="3">3rd</option>
											<option value="4" selected>4th</option>
										</select>
									</div>
									<div class="col-3 col-12-xsmall">
										Active Backlogs<input type="text" name="activeback" id="activeback" value="0">
									</div>
									<div class="col-3 col-12-xsmall">
										Dead Backlogs<input type="text" name="deadback" id="deadback" value="0">
									</div>

									<div class="col-6">
										Resume Link<input type="text" name="resume" id="resume" value="Resume Link"  />
									</div>
									<div class="col-6">
										Letter of Recommendation<input type="text" name="lor" id="lor" value="Recommendation">
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><a href="studentdata.php" class="button primary">Save</a></li>
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