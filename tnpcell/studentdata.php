<?php
session_start();
require_once "../connect.php";

$email = $_SESSION['admin'];

?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Campus Recruitment | TNP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/tnpdash.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
			<h1>Training and Placement Cell</h1>
			<p>
				<b>View Master Databases for students and recruiters.</b>
				<br />
				<br />
				Update notice board and recruitment status for students. Approve recruiter details.
				<br />
				For more information, visit the <a href="http://igdtuw.ac.in/" target="_blank">University Website</a>.
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
				<li class="active"><a href="studentdata.php">Student Database</a></li>
				<li><a href="recruiterdata.php">Recruiter Database</a></li>
				<li><a href="registrations.html">Registrations Database</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<!-- Post -->
			<section class="post">
				<header class="major align-center">
					<h1>Student Database</h1>
				</header>
			</section>

			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Enrollment No.</th>
							<th>Email</th>
							<th>Contact No.</th>
							<th>CGPA</th>
							<th>Active Backs</th>
							<th>Dead Backs</th>
							<th>Year</th>
							<th>Resume Link</th>
							<th>LOR</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stmt = $pdo->query("SELECT * FROM student_data");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>
							<td>";
							echo (htmlentities($row['Name']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['enroll_no']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['email']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['contact']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['CGPA']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['active_back']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['dead_back']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['grad_year']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['resume']));
							echo ("</td>
							<td>");
							echo ("resume link");
							echo ("</td>
							<td><input type='button' name='block' value='Block' class='small'></td>
							<td><input type='button' name='editstu' value='Edit' class='small'></td>
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
	<script type="text/javascript">
		mybutton = document.getElementById("totop");

		window.onscroll = function() {
			scrollFunction()
		};

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