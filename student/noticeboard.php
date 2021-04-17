<?php
session_start();
require_once "../connect.php";

if (!isset($_SESSION['email'])) {
	header('Location:../loginStudent.php');
	return;
}
$email = $_SESSION['email'];
$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$status = htmlentities($rows['status']);

?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Campus Recruitment | Student</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/dashboard.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">

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
				View the <a href="../info/TNP-2019-2020.pdf" target="_blank">Recruitment Statuss</a> of IGDTUW'19.
				<br />
				For more information, visit the <a href="http://igdtuw.ac.in/" target="_blank">University Website</a>.
				<br />
				Current Status: <b><?= $status ?> for Recruitment</b>
			</p>
			<ul class="actions">
				<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="../logout.php" class="logo">Logout</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li class="active"><a href="noticeboard.php">Notice Board</a></li>
				<li><a href="registrations.php">Registrations</a></li>
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
				<p>
					Updates you about all the companies visiting the campus. You can register if and only if you fulfill the requirements of the <br>respective company.
					<br />
					<i><b>Note: </b>Register before the deadline mentioned for each company.</i>
				</p>
			</article>

			<!-- Posts -->
			<section class="posts">

				<?php

				$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$year = htmlentities($row['grad_year']);
				}
				if (strcmp($status, "Closed")) {
					if (isset($_POST['submit'])) {
						$stu_id = $_POST['stu_id'];
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
						$deadline_date = date("Y-m-d");
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
						$rec_id = $_POST['rec_id'];
						$stmt1 = $pdo->query("SELECT * FROM company_data where company_email='$rec_id'");
						while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
							$role = htmlentities($row['role']);
							$cgpa_req = htmlentities($row['cgpa']);
							$job_profiles = htmlentities($row['job_profiles']);
							$com_name = htmlentities($row['company_name']);
							$jd = htmlentities($row['jd_link']);
							$deadline_date = htmlentities($row['deadline_date']);
							$aback = htmlentities($row['activeback']);
							$dback = htmlentities($row['deadback']);
						}

						// if ($cgpa_req > $cgpa_stu) {
						// 	//MODAL 
						// 	//YOU CAN NOT REGISTER HERE
						// } else {
						$str = rand();
						$vkey = md5($str);
						$id = rand(1000, 999999);
						if ((float)$cgpa_req <= (float)$cgpa_stu && $activeBack <= $aback && $deadBack <= $dback) {
							$sql = "INSERT INTO student_registrations(id, stu_id, rec_id, applied_date, deadline_date, 
														rec_name, rounds, status, stu_name, stu_year, role, stu_cgpa, rec_jd, stu_res, aback,
														dback, approve, stu_contact, profile)
														values(:id,:stu_id,:rec_id, :adate, :ddate, :rec_name, :rounds, :status, :stu_name, :stu_year,
														:role, :stu_cgpa, :rec_jd, :stu_res, :aback,
														:dback, :approve, :stu_contact,:profile)";

							$stmt = $pdo->prepare($sql);
							//PLS INSERT HERE
							$stmt->execute(array(
								':id' => $id,
								':stu_id' => $stu_id,
								':rec_id' => $rec_id,
								':adate' => date("Y-m-d"),
								':ddate' => $deadline_date,
								':rec_name' => $com_name,
								':rounds' => 0,
								':status' => "Registered",
								':stu_name' => $name,
								':stu_year' => $year,
								':role' => $role,
								':stu_cgpa' => $cgpa_stu,
								':rec_jd' => $jd,
								':stu_res' => $resume,
								':aback' => $aback,
								':dback' => $dback,
								':approve' => 1,
								':stu_contact' => $contact,
								':profile' => $job_profiles,

							));
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
												<li>
												<form method='post'>
													<input type='hidden' value='$email' name='stu_id'/>
													<input type='hidden' value='$id' name='rec_id'/>
													<input type='submit' class='button' name='submit' value='Registered' readonly/>
												</form></li>
											</ul></article>	");
						}
					} else if ($year == 4) {
						$stmt = $pdo->query("SELECT * FROM company_data where approve=1 and role<>'Summer Intern'");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

							$id = htmlentities($row['company_email']);
							$stmt0 = $pdo->query("SELECT * FROM student_registrations where rec_id='$id' and stu_id='$email'");
							$row0 = $stmt0->fetchAll(PDO::FETCH_ASSOC);

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
											<input type='hidden' value='$id' name='rec_id'/>");
							if (count($row0)) {
								echo ("<input type='text' class='button disabled' value='Registered' readonly/> ");
							} else {
								echo ("<input type='submit' class='button' name='submit' value='Register'/>");
							}

							echo ("</form></li>
									</ul></article>						");
						}
					}
				} else {
					echo ("<h3>We have closed registrations for the session.</h3>");
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
		window.onload = setTimeout(function() {
			alert("Make sure your profile is up to date before registrations.");
		}, 2000);

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