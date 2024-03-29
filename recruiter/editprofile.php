<?php
session_start();
require_once "../connect.php";

if (!isset($_SESSION['username'])) {
	header('Location:../loginRecruiter.php');
	return;
}
$email = $_SESSION['username'];
$stmt = $pdo->query("SELECT * FROM company_data where company_email='$email'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {

	$stmt = $pdo->prepare('UPDATE company_data SET cgpa=:cgpa, role=:role, deadback=:dback, activeback=:aback, domain=:d,company_contact=:contact, base=:base,ctc=:ctc, location=:loc, job_profiles=:pro,test_date=:tdate,
		interview_date=:idate, deadline_date=:ddate, min_shortlist= :min, poc_name=:poc, poc_contact= :pcont, hr_name=:hr,
		jd_link=:jd, result_date= :rdate 
		WHERE company_email=:email');
	$stmt->execute(
		array(
			':role' => $_POST['role'],
			':cgpa' => $_POST['cgpa'],
			':aback' => $_POST['aback'],
			':dback' => $_POST['dback'],
			':d' => $_POST['domain'],
			':contact' => $_POST['phone'],
			':base' => $_POST['base'],
			':ctc' => $_POST['ctc'],
			':loc' =>  $_POST['locn'],
			':pro' =>  $_POST['jobpr'],
			':tdate' => $_POST['tdate'],
			':idate' => ($_POST['idate']),
			':ddate' => $_POST['ddate'],
			':min' => $_POST['minshrt'],
			':poc' => $_POST['poc'],
			':pcont'  => $_POST['poc_contact'],
			':hr' => $_POST['rname'],
			':jd' => $_POST['jd'],
			':rdate' => $_POST['rdate'],
			':email' => $email
		)
	);
	$_SESSION['success'] = 'Record updated';
	header("Location: profile.php");
	return;
}

?>
<!DOCTYPE HTML>

<html>

<head>
	<title>IGDTUW Recruitment | Recruiter</title>
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
				<li><a href="applications.php">Applications</a></li>
				<li class="active"><a href="profile.php">Profile</a></li>
				<li><a href="finalshortlists.php">Shortlists</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<?php

			if (count($rows)) {
				$stmt = $pdo->query("SELECT * FROM company_data where company_email='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$role = htmlentities($row['role']);
					$name = htmlentities($row['company_name']);
					$email = htmlentities($row['company_email']);
					$domain = htmlentities($row['domain']);
					$phone = htmlentities($row['company_contact']);
					$job_profiles = htmlentities($row['job_profiles']);
					$location = htmlentities($row['location']);
					$ctc = htmlentities($row['ctc']);
					$jd = htmlentities($row['jd_link']);
					$base = htmlentities($row['base']);
					$test_date = htmlentities($row['test_date']);
					$interview_date = htmlentities($row['interview_date']);
					$rdate = htmlentities($row['result_date']);
					$deadline_date = htmlentities($row['deadline_date']);
					$min = htmlentities($row['min_shortlist']);
					$hr = htmlentities($row['hr_name']);
					$poc = htmlentities($row['poc_name']);
					$poc_contact = htmlentities($row['poc_contact']);
					$aback = htmlentities($row['activeback']);
					$dback = htmlentities($row['deadback']);
					$cgpa = htmlentities($row['cgpa']);
				}
			}


			?>

			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Company Profile</h1>
				</header>
			</section>
			<?php
			if (isset($_SESSION['error'])) {
				echo ("<center><span style='color:blue;'>" . htmlentities($_SESSION['error']) . "</span></center>\n");
				unset($_SESSION['error']);
			}
			?>
			<form method="post" action="#">
				<div class="row gtr-uniform">
					<div class="col-6 col-12-xsmall">
						Company Name<input type="text" name="cname" id="cname" value="<?= $name ?>" readonly />
					</div>
					<div class="col-6 col-12-xsmall">
						Recruitment Manager<input type="text" name="rname" id="rname" value="<?= $hr ?>" readonly />
					</div>
					<div class="col-6 col-12-xsmall">
						Domain<select name="domain">
							<option selected><?= $domain ?></option>
							<option>Technical</option>
							<option>Non-Technical</option>
						</select>
					</div>
					<div class="col-6 col-12-xsmall">
						Recruiter Email<input type="text" name="email" id="email" value="<?= $email ?>" readonly />
					</div>
					<div class="col-6 col-12-xsmall">
						Contact No.<input type="tel" maxlength="10" pattern="^[0-9]{10}$" name="phone" id="phone" value="<?= $phone ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Job Profile(s)<input type="text" name="jobpr" id="jobpr" value="<?= $job_profiles ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Duration * <select name="role" required>
							<option selected><?= $role ?></option>
							<option>6 Month Intern</option>
							<option>Full Time Employee</option>
							<option>Summer Intern</option>
							<option>Dual Offer(6 month+FTE)</option>
						</select>
					</div>
					<div class="col-6 col-12-xsmall">
						Min. CGPA * <input type="text" pattern="^[0-9]*\.[0-9]+$" name="cgpa" value="<?= $cgpa ?>" title="Minimum can be 0"/>
					</div>
					<div class="col-6 col-12-xsmall">
						Active Backs Allowed<input type="text" pattern="^[0-9]+$" name="aback" id="locn" value="<?= $aback ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Dead Backs Allowed<input type="text" pattern="^[0-9]+$" name="dback" id="locn" value="<?= $dback ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Location<input type="text" pattern="^[a-zA-Z]+$" name="locn" id="locn" value="<?= $location ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Compensation (CTC) *<input type="text" pattern="^[0-9a-zA-Z]+$" title="" name="ctc" id="ctc" value="<?= $ctc ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						Base Salary *<input type="text" pattern="^[0-9a-zA-Z]+$" name="base" id="base" value="<?= $base ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						Minimum Shortlists<input type="text" name="minshrt" pattern="^[0-9]{1,2,3,4,5}$" title="Enter a number" id="minshrt" value="<?= $min ?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Test Date(Tentative) *<input type="date" name="tdate" id="tdate" value="<?= $test_date ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						Interview Date(Tentative) *<input type="date" name="idate" id="idate" value="<?= $interview_date ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						Registration Deadline(Tentative) *<input type="date" name="ddate" id="ddate" value="<?= $deadline_date ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						Result Deadline(Tentative) *<input type="date" name="rdate" id="ddate" value="<?= $rdate ?>" required />
					</div>
					<div class="col-6 col-12-xsmall">
						POC Name<input type="text" name="poc" value="<?= $poc ?>" />
					</div>
					<div class="col-6">
						POC Contact <input type="tel" name="poc_contact" id="pass" value="<?= $poc_contact ?>" maxlength="10" pattern="^[0-9]{10}$" />
					</div>
					<div class="col-12">
						Job Description File(Drive Link)<input type="text" pattern="^https://drive\.google\.com/file/d/([0-9]+([a-zA-Z]+[0-9]+)+)([a-zA-Z]+(/[a-zA-Z]+)+)\?usp=sharing$" name="jd" value="<?= $jd ?>" />
					</div>
					<div class="col-12">
						<input type="checkbox" id="checkx" name="checkx" required>
						<label for="checkx">I declare that the above information is true.</label>
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input name="submit" type="submit" class="button primary" value="Save"></li>
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

			if (confirm("Your session has ended due to inactivity, click Ok to login to the portal again.")) {
				window.location = "../logout.php";
			}

		}
	</script>

</body>

</html>