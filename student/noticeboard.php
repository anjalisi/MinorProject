<?php
session_start();
require_once "../connect.php";

$email=$_SESSION['email'];
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Campus Recruitment | Student</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/dashboard.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				
				<!-- Scroll to Top -->
					<div id="totop">
						<ul class="actions">
							<li><a href="#wrapper" id="btn" class="button icon solid solo fa-arrow-up scrolly">Top</a></li>
						</ul>
					</div>
				
				<!-- Intro -->
					<div id="intro">
						<h1>Student Dashboard</h1>
						<p>
							<b>View and update your details to participate in the University Campus Recruitment Drive.</b>
							<br />
							<br />
							Download the <a href="#">Placement Brochure</a> to know the guidelines for the process.
							<br />
							For more information, visit the <a href="http://igdtuw.ac.in/" target="_blank">University Website</a>.
							<br />
							Current Status: <b>Open for Recruitment</b>
						</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="../index.html" class="logo">Home</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="noticeboard.php">Notice Board</a></li>
							<li><a href="registrations.html">Registrations</a></li>
							<li><a href="profile.php">Profile</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Article Header -->
						<article class="post featured">
							<header class="major">
								<h2>Notice Board</h2>
							</header>
						</article>

						<!-- Posts -->
							<section class="posts">
								
								<?php
									$stmt = $pdo->query("SELECT * FROM company_data where approve=1");
									while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
										echo "<article><header>
												<h2><a href='#'>";
										echo(htmlentities($row['company_name']));
										echo("</a></h2>
										</header>
										<div class='table-wrapper'>
										<table>
											<tbody>
												<tr>
													<td>Test Date</td>
													<td>");
										echo(htmlentities($row['test_date']));
										echo("</td>
										</tr>
										<tr>
											<td>Job Profile</td>
											<td>");
										echo(htmlentities($row['job_profiles']));
										echo("</td>
										</tr>
										<tr>
											<td>Domain</td>
											<td>");
										echo(htmlentities($row['domain']));
										echo("
										<tr>
											<td>Role</td>													
											<td>");
										echo(htmlentities($row['role']));
										echo("</td></TR>
										<tr>
											<td>Eligibility Cutoff</td>
											<td>");
										echo(htmlentities($row['cgpa']));
										echo("</td>
										</tr>
										<tr>
											<td>Active Backlogs</td>
											<td>");
										echo(htmlentities($row['activeback']));
										echo("</td>
										</tr>
										<tr>
											<td>Dead Backlogs</td>
											<td>");
										echo(htmlentities($row['deadback']));
										echo("</td>
										</tr>
										<tr>
											<td>Compensation (CTC)</td>
											<td>");
										echo(htmlentities($row['ctc']));
										echo("</td>
										</tr>
										<tr>
											<td>Base Salary</td>
											<td>");
										echo(htmlentities($row['base']));
										echo("</td>
										</tr>
										<tr>
											<td>Registration Deadline</td>
											<td>");
										echo(htmlentities($row['deadline_date']));
										echo("</td>
										</tr>
										<tr>
											<td>POC</td>
											<td>");
										echo(htmlentities($row['poc_name']));
										echo("</td>
										</tr>
										<tr>
											<td>POC Contact</td>
											<td><a href='#'>");
										echo(htmlentities($row['poc_contact']));
										echo("</a></td>
										</tr>
																				
										</tbody>
										</table>
									<ul class='actions special'>
										<li><a href='#' class='button'>Register</a></li>
									</ul></article>						");
									}
									
									


								?>
								<!-- <article>
									<header>
										<span class="date">August 23, 2020</span>
										<h2><a href="#">Microsoft FTE</a></h2>
									</header>

									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td>Visit Date</td>
													<td>26-08-2020</td>
												</tr>
												<tr>
													<td>Profile</td>
													<td>Software Engineer</td>
												</tr>
												<tr>
													<td>Domain</td>
													<td>Technical</td>
												</tr>
												<tr>
													<td>Role</td>													
													<td>Full Time</td>
												</tr>
												<tr>
													<td>Target Courses</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>Eligibility Cutoff</td>
													<td>80%</td>
												</tr>
												<tr>
													<td>Backlogs</td>
													<td>0 active/dead</td>
												</tr>
												<tr>
													<td>Compensation (CTC)</td>
													<td>35 LPA</td>
												</tr>
												<tr>
													<td>Registration Deadline</td>
													<td>25-08-2020</td>
												</tr>
												<tr>
													<td>POC</td>
													<td><a href="#">09301012017</a></td>
												</tr>											
											</tbody>
										</table>
									<ul class="actions special">
										<li><a href="#" class="button">Register</a></li>
									</ul>
								</article> -->
								<article>
									<header>
										<span class="date">August 24, 2020</span>
										<h2><a href="#">Intuit FTE</a></h2>
									</header>

									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td>Visit Date</td>
													<td>28-08-2020</td>
												</tr>
												<tr>
													<td>Profile</td>
													<td>Software Engineer</td>
												</tr>
												<tr>
													<td>Domain</td>
													<td>Technical</td>
												</tr>
												<tr>
													<td>Role</td>													
													<td>Full Time</td>
												</tr>
												<tr>
													<td>Target Courses</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>Eligibility Cutoff</td>
													<td>75%</td>
												</tr>
												<tr>
													<td>Backlogs</td>
													<td>0 active/dead</td>
												</tr>
												<tr>
													<td>Compensation (CTC)</td>
													<td>15 LPA</td>
												</tr>
												<tr>
													<td>Registration Deadline</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>POC</td>
													<td><a href="#">09301012017</a></td>
												</tr>											
											</tbody>
										</table>
									<ul class="actions special">
										<li><a href="#" class="button">Register</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">August 24, 2020</span>
										<h2><a href="#">Intuit FTE</a></h2>
									</header>

									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td>Visit Date</td>
													<td>28-08-2020</td>
												</tr>
												<tr>
													<td>Profile</td>
													<td>Software Engineer</td>
												</tr>
												<tr>
													<td>Domain</td>
													<td>Technical</td>
												</tr>
												<tr>
													<td>Role</td>													
													<td>Full Time</td>
												</tr>
												<tr>
													<td>Target Courses</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>Eligibility Cutoff</td>
													<td>75%</td>
												</tr>
												<tr>
													<td>Backlogs</td>
													<td>0 active/dead</td>
												</tr>
												<tr>
													<td>Compensation (CTC)</td>
													<td>15 LPA</td>
												</tr>
												<tr>
													<td>Registration Deadline</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>POC</td>
													<td><a href="#">09301012017</a></td>
												</tr>											
											</tbody>
										</table>
									<ul class="actions special">
										<li><a href="#" class="button">Register</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">August 24, 2020</span>
										<h2><a href="#">Intuit FTE</a></h2>
									</header>

									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td>Visit Date</td>
													<td>28-08-2020</td>
												</tr>
												<tr>
													<td>Profile</td>
													<td>Software Engineer</td>
												</tr>
												<tr>
													<td>Domain</td>
													<td>Technical</td>
												</tr>
												<tr>
													<td>Role</td>													
													<td>Full Time</td>
												</tr>
												<tr>
													<td>Target Courses</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>Eligibility Cutoff</td>
													<td>75%</td>
												</tr>
												<tr>
													<td>Backlogs</td>
													<td>0 active/dead</td>
												</tr>
												<tr>
													<td>Compensation (CTC)</td>
													<td>15 LPA</td>
												</tr>
												<tr>
													<td>Registration Deadline</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>POC</td>
													<td><a href="#">09301012017</a></td>
												</tr>											
											</tbody>
										</table>
									<ul class="actions special">
										<li><a href="#" class="button disabled">Register</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">August 24, 2020</span>
										<h2><a href="#">Intuit FTE</a></h2>
									</header>

									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td>Visit Date</td>
													<td>28-08-2020</td>
												</tr>
												<tr>
													<td>Profile</td>
													<td>Software Engineer</td>
												</tr>
												<tr>
													<td>Domain</td>
													<td>Technical</td>
												</tr>
												<tr>
													<td>Role</td>													
													<td>Full Time</td>
												</tr>
												<tr>
													<td>Target Courses</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>Eligibility Cutoff</td>
													<td>75%</td>
												</tr>
												<tr>
													<td>Backlogs</td>
													<td>0 active/dead</td>
												</tr>
												<tr>
													<td>Compensation (CTC)</td>
													<td>15 LPA</td>
												</tr>
												<tr>
													<td>Registration Deadline</td>
													<td>CSE, IT</td>
												</tr>
												<tr>
													<td>POC</td>
													<td><a href="#">09301012017</a></td>
												</tr>											
											</tbody>
										</table>
									<ul class="actions special">
										<li><a href="#" class="button disabled">Register</a></li>
									</ul>
								</article>
							</section>

						<!-- Footer -->
							<footer>
								<div class="pagination">
									<!--<a href="#" class="previous">Prev</a>-->
									<a href="#" class="page active">1</a>
									<a href="#" class="page">2</a>
									<a href="#" class="page">3</a>
									<span class="extra">&hellip;</span>
									<a href="#" class="page">8</a>
									<a href="#" class="page">9</a>
									<a href="#" class="page">10</a>
									<a href="#" class="next">Next</a>
								</div>
							</footer>

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

				mybutton = document.getElementById("totop");

				window.onscroll = function() {scrollFunction()};

				function scrollFunction() {
				  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
				    mybutton.style.display = "block";
				  } else {
				    mybutton.style.display = "none";
				  }
				}
				function topFunction() {
				  document.documentElement.scrollTop = 0;
				}
			</script>

	</body>
</html>
