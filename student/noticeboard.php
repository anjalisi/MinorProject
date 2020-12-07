<?php
session_start();
require_once "../connect.php";

$email = $_SESSION['email'];
$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Campus Recruitment | Student</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/dashboard.css" />
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

				$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$year = htmlentities($row['grad_year']);
				}

				if (isset($_POST['submit'])) {
					$stu_id = $_POST['stu_id'];
					$rec_id = $_POST['rec_id'];
					$cgpa_stu = "";
					$name = "";
					$activeBack = "";
					$aback = "";
					$deadBack = "";
					$dback = "";
					$year = "";
					$resume = "";
					$com_name = "";
					$jd = "";
					$deadline_date = "";
					$aback = "";
					$job_profiles = "";
					$contact = "";
					$cgpa_req = "";
					$role = "";
					//VARIABLES DEFINED HERE	
					$stmt = $pdo->query("SELECT * FROM student_data where email='$stu_id'");
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$cgpa_stu = htmlentities($row['CGPA']);
						$name = htmlentities($row['Name']);
						//$email= htmlentities($row['email']);
						$contact = htmlentities($row['contact']);
						$activeBack = htmlentities($row['active_back']);
						$deadBack = htmlentities($row['dead_back']);
						$year = htmlentities($row['grad_year']);
						$resume = htmlentities($row['resume']);
					}
					$stmt1 = $pdo->query("SELECT * FROM company_data where company_email='$rec_id'");
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$role = htmlentities($row['role']);
						$cgpa_req = htmlentities($row['cgpa']);
						$job_profiles = htmlentities($row['job_profiles']);
						$com_name = htmlentities($row['company_name']);
						$jd = htmlentities($row['jd_link']);
						$deadline_date = htmlentities($row['deadline_date']);
						$aback = htmlentities($row['activeback']);
						$dback = htmlentities($row['deadback']);
					}

					if ($cgpa_req > $cgpa_stu) {
						//MODAL 
						//YOU CAN NOT REGISTER HERE
					} else {
						$sql = "INSERT INTO student_registrations(stu_id, rec_id, applied_date, deadline_date, 
											rec_name, rounds, status, stu_name, stu_year, role, stu_cgpa, rec_jd, stu_res, aback,
											dback, approve, stu_contact, profile)
											values(:stu_id,:rec_id, :adate, :ddate, :rec_name, :rounds, :status, :stu_name, :stu_year,
											:role, :stu_cgpa, :rec_jd, :stu_res, :aback,
											:dback, :approve, :stu_contact,:profile)";

						$stmt = $pdo->prepare($sql);
						//PLS INSERT HERE
						$stmt->execute(array(
							':stu_id' => $stu_id,
							':rec_id' => $rec_id,
							':adate' => $applied_date,
							':ddate' => $deadline_date,
							':rec_name' => $rec_name,
							':rounds' => $rounds,
							':status' => $status,
							':stu_name' => $stu_name,
							':stu_year' => $stu_year,
							':role' => $role,
							':stu_cgpa' => $stu_cgpa,
							':rec_jd' => $rec_jd,
							':stu_res' => $stu_res,
							':aback' => $aback,
							':dback' => $dback,
							':approve' => $approve,
							':stu_contact' => $stu_contact,
							':profile' => $profile,

						));
						$stmt->execute(array(
							':name' => $_POST['comp_name'],
							':email' => $_POST['comp_email'],
							':pass' => $_POST['comp_pass'],
							':hr' => $_POST['hr_name'],
							':id' => $id
						));
						$stmt->execute(array(
							':name' => $_POST['comp_name'],
							':email' => $_POST['comp_email'],
							':pass' => $_POST['comp_pass'],
							':hr' => $_POST['hr_name'],
							':id' => $id
						));
						$_SESSION["username"] = $_POST["email"];

						header("Location:recruiter/applications.php");
						return;
					}
				}

				if ($year == 3) {
					$stmt = $pdo->query("SELECT * FROM company_data where approve=1 and role='Summer Intern'");
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$id = htmlentities($row['id']);
						echo "<article><header>
													<h2><a href='#'>";
						echo (htmlentities($row['company_name']));
						echo ("</a></h2>
											</header>
											<div class='table-wrapper'>
											<table>
												<tbody>
													<tr>
														<td>Test Date</td>
														<td>");
						echo (htmlentities($row['test_date']));
						echo ("</td>
											</tr>
											<tr>
												<td>Job Profile</td>
												<td>");
						echo (htmlentities($row['job_profiles']));
						echo ("</td>
											</tr>
											<tr>
												<td>Domain</td>
												<td>");
						echo (htmlentities($row['domain']));
						echo ("
											<tr>
												<td>Role</td>													
												<td>");
						echo (htmlentities($row['role']));
						echo ("</td></TR>
											<tr>
												<td>Eligibility Cutoff</td>
												<td>");
						echo (htmlentities($row['cgpa']));
						echo ("</td>
											</tr>
											<tr>
												<td>Active Backlogs</td>
												<td>");
						echo (htmlentities($row['activeback']));
						echo ("</td>
											</tr>
											<tr>
												<td>Dead Backlogs</td>
												<td>");
						echo (htmlentities($row['deadback']));
						echo ("</td>
											</tr>
											<tr>
												<td>Compensation (CTC)</td>
												<td>");
						echo (htmlentities($row['ctc']));
						echo ("</td>
											</tr>
											<tr>
												<td>Base Salary</td>
												<td>");
						echo (htmlentities($row['base']));
						echo ("</td>
											</tr>
											<tr>
												<td>Registration Deadline</td>
												<td>");
						echo (htmlentities($row['deadline_date']));
						echo ("</td>
											</tr>
											<tr>
												<td>POC</td>
												<td>");
						echo (htmlentities($row['poc_name']));
						echo ("</td>
											</tr>
											<tr>
												<td>POC Contact</td>
												<td><a href='#'>");
						echo (htmlentities($row['poc_contact']));
						echo ("</a></td>
											</tr>
																					
											</tbody>
											</table>
										<ul class='actions special'>
											<li><form method='post'><input type='text'/><input type='submit' class='button' name='submit' value='Register'/></form></li>
										</ul></article>						");
					}
				} else {
					$stmt = $pdo->query("SELECT * FROM company_data where approve=1 and role<>'Summer Intern'");
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$id = htmlentities($row['company_email']);
						echo "<article><header>
												<h2><a href='#'>";
						echo (htmlentities($row['company_name']));
						echo ("</a></h2>
										</header>
										<div class='table-wrapper'>
										<table>
											<tbody>
												<tr>
													<td>Test Date</td>
													<td>");
						echo (htmlentities($row['test_date']));
						echo ("</td>
										</tr>
										<tr>
											<td>Job Profile</td>
											<td>");
						echo (htmlentities($row['job_profiles']));
						echo ("</td>
										</tr>
										<tr>
											<td>Domain</td>
											<td>");
						echo (htmlentities($row['domain']));
						echo ("
										<tr>
											<td>Role</td>													
											<td>");
						echo (htmlentities($row['role']));
						echo ("</td></TR>
										<tr>
											<td>Eligibility Cutoff</td>
											<td>");
						echo (htmlentities($row['cgpa']));
						echo ("</td>
										</tr>
										<tr>
											<td>Active Backlogs</td>
											<td>");
						echo (htmlentities($row['activeback']));
						echo ("</td>
										</tr>
										<tr>
											<td>Dead Backlogs</td>
											<td>");
						echo (htmlentities($row['deadback']));
						echo ("</td>
										</tr>
										<tr>
											<td>Compensation (CTC)</td>
											<td>");
						echo (htmlentities($row['ctc']));
						echo ("</td>
										</tr>
										<tr>
											<td>Base Salary</td>
											<td>");
						echo (htmlentities($row['base']));
						echo ("</td>
										</tr>
										<tr>
											<td>Registration Deadline</td>
											<td>");
						echo (htmlentities($row['deadline_date']));
						echo ("</td>
										</tr>
										<tr>
											<td>POC</td>
											<td>");
						echo (htmlentities($row['poc_name']));
						echo ("</td>
										</tr>
										<tr>
											<td>POC Contact</td>
											<td><a href='#'>");
						echo (htmlentities($row['poc_contact']));
						echo ("</a></td>
										</tr>
																				
										</tbody>
										</table>
									<ul class='actions special'>
										<li>
										<form method='post'>
											<input type='hidden' value='$email' name='stu_id'/>
											<input type='hidden' value='$id' name='rec_id'/>
											<input type='submit' class='button' name='submit' value='Register'/>
										</form></li>
									</ul></article>						");
					}
				}


				?>

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