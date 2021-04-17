<?php
session_start();
require_once "../connect.php";
if (!isset($_SESSION['admin'])) {
	header('Location:../loginAdmin.php');
	return;
}
$email = $_SESSION['admin'];
if (!isset($_GET['txt'])) {
	header("Location:recruiterdata.php");
	return;
}

$id = $_GET['txt'];

$stmt = $pdo->query("SELECT * FROM company_data where id=$id");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {

	$stmt = $pdo->prepare('UPDATE company_data SET cgpa=:cgpa, deadback=:dback, activeback=:aback, company_contact=:contact, location=:loc, job_profiles=:pro,
		test_date=:tdate, interview_date=:idate, deadline_date=:ddate, min_shortlist= :min,poc_name=:poc, poc_contact= :pcont,
		 jd_link=:jd, result_date= :rdate 
		WHERE id=:id');
	$stmt->execute(
		array(
			':cgpa' => $_POST['cgpa'],
			':aback' => $_POST['aback'],
			':dback' => $_POST['dback'],
			':contact' => $_POST['phone'],
			':pro' =>  $_POST['jobpr'],
			':tdate' => $_POST['tdate'],
			':loc' => $_POST['loc'],
			':idate' => ($_POST['idate']),
			':ddate' => $_POST['ddate'],
			':rdate' => ($_POST['rdate']),
			':min' => $_POST['minshrt'],
			':poc' => $_POST['poc'],
			':pcont'  => $_POST['poc_contact'],
			':jd' => $_POST['jd'],
			':id' => $id,
		)
	);
	header("Location:recruiterdata.php");
	return;
}

?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Campus Recruitment | TNP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/tnpdash.css" />
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
				<li><a href="studentdata.php">Student Database</a></li>
				<li><a href="recruiterdata.php">Recruiter Database</a></li>
				<li><a href="registrations.php">Registrations Database</a></li>
				<li><a href="placed.php">Placed Students</a></li>
				<li class="active"><a href="editcompany.php">Edit Recruiter</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<?php
			if (count($rows)) {
				$stmt = $pdo->query("SELECT * FROM company_data where id=$id");
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
					$password = htmlentities($row['password']);
				}
			}
			?>

			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Edit Company Profile</h1>
				</header>
			</section>

			<form method="post">
				<div class="row gtr-uniform">
					<h2 class="col-10"><?= $name ?></h2>
					<div class="col-4 col-12-xsmall">
						Contact No.<input type="text" name="phone" id="phone" value="<?= $phone ?>" />
					</div>
					<div class="col-4 col-12-xsmall">
						Job Profile(s)<input type="text" name="jobpr" id="profile" value="<?= $job_profiles ?>" />
					</div>

					<div class="col-4 col-12-xsmall">
						Duration
						<select name="role" id="role">
							<option selected><?= $role ?></option>
							<option>FTE</option>
							<option>Intern (6m)</option>
							<option>Dual-offer (6m Intern + FTE)</option>
							<option>Intern (2m)</option>
						</select>
					</div>
					<div class="col-4 col-12-xsmall">
						Location<input type="text" name="loc" id="loc" value="<?= $location ?>">
					</div>
					<div class="col-4 col-12-xsmall">
						Base Compensation<input type="text" name="base" id="base" value="<?= $base ?>" readonly />
					</div>
					<div class="col-4 col-12-xsmall">
						CTC<input type="text" name="ctc" pattern="^[0-9]+ [a-zA-Z]+$" id="ctc" value="<?= $ctc ?>" readonly />
					</div>
					<div class="col-4 col-12-xsmall">
						Minimum Shortlists<input type="text" name="minshrt" id="mins" value="<?= $min ?>">
					</div>
					<div class="col-4 col-12-xsmall">
						POC Name<input type="text" name="poc" id="pocn" value="<?= $poc ?>">
					</div>
					<div class="col-4 col-12-xsmall">
						POC Contact No.<input type="text" name="poc_contact" id="pocc" value="<?= $poc_contact ?>">
					</div>
					<div class="col-3 col-12-xsmall">
						Test Date *<input type="date" name="tdate" id="tdate" value="<?= $test_date ?>" required>
					</div>
					<div class="col-3 col-12-xsmall">
						Interview Date *<input type="date" name="idate" id="idate" value="<?= $interview_date ?>" required>
					</div>
					<div class="col-3 col-12-xsmall">
						Deadline Date *<input type="date" name="ddate" id="rdate" value="<?= $deadline_date ?>" required>
					</div>
					<div class="col-3 col-12-xsmall">
						Result Date *<input type="date" name="rdate" id="rdate" value="<?= $rdate ?>" required>
					</div>
					<div class="col-4 col-12-xsmall">
						CGPA Eligibility<input type="text" pattern="^[0]|[0-9]\.(\d?\d?)|[10].[0]$" name="cgpa" id="cgpa" value="<?= $cgpa ?>">
					</div>
					<div class="col-4 col-12-xsmall">
						Dead Backlogs<input type="text" pattern="^[0-9]+$" name="dback" id="deadb" value="<?= $dback ?>">
					</div>
					<div class="col-4 col-12-xsmall">
						Active Backlogs<input type="text" pattern="^[0-9]+$" name="aback" id="activeb" value="<?= $aback ?>">
					</div>

					<div class="col-6">
						Job Description Link<input type="text" pattern=pattern="^https://drive\.google\.com/file/d/([0-9]+([a-zA-Z]+[0-9]+)+)([a-zA-Z]+(/[a-zA-Z]+)+)\?usp=sharing$" name="jd" id="jdlink" value="<?= $jd ?>" />
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

			if (!alert("Your session has ended due to inactivity, click Ok to login to the portal again.")) {
				window.location = "../logout.php";
			}

		}
	</script>

</body>

</html>