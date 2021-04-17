<?php
session_start();
require_once "../connect.php";
if (!isset($_SESSION['admin'])) {
	header('Location:../loginAdmin.php');
	return;
}

$email = $_SESSION['admin'];
if (!isset($_GET['txt'])) {
	header("Location:registrations.php");
	return;
}

$email = $_GET['txt'];

$stmt = $pdo->query("SELECT * FROM student_registrations where id='$email'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {

	$stmt = $pdo->prepare("UPDATE student_registrations SET profile=:profile, rounds=:rounds,status=:status  
		WHERE id='$email'");
	$stmt->execute(array(
		':rounds' => $_POST['rounds'],
		':profile' => $_POST['profile'],
		':status' => $_POST['status'],
	));
	header("Location:registrations.php");
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
				<li class="active"><a href="reviewreg.php">Review Registration</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<?php
			if (count($rows)) {
				$stmt = $pdo->query("SELECT * FROM student_registrations where id='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$name = htmlentities($row['rec_name']);
					$stu_name = htmlentities($row['stu_name']);

					$mail = htmlentities($row['rec_id']);
					$smail = htmlentities($row['stu_id']);
					$pro = htmlentities($row['profile']);
					$dur = htmlentities($row['role']);
					$date = htmlentities($row['applied_date']);
					$rounds = htmlentities($row['rounds']);
					$status = htmlentities($row['status']);
				}
			}
			?>
			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Review Student Registration</h1>
				</header>
			</section>

			<form method="post" action="#">
				<div class="row gtr-uniform">
					<div class="col-6 col-12-xsmall">
						Company Name<input type="text" name="cname" id="cname" value="<?= $name ?>" readonly />
					</div>
					<div class="col-6 col-12-xsmall">
						Student Name<input type="text" name="sname" id="sname" value="<?= $stu_name ?>" readonly />
					</div>
					<div class="col-4 col-12-xsmall">
						Recruiter Email<input type="text" name="remail" id="remail" value="<?= $mail ?>" readonly />
					</div>
					<div class="col-4 col-12-xsmall">
						Student Email<input type="text" name="semail" id="semail" value="<?= $smail ?>" readonly />
					</div>

					<div class="col-4 col-12-xsmall">
						Duration<input type="text" name="profile" id="profile" value="<?= $dur ?>" readonly />
					</div>
					<div class="col-3 col-12-xsmall">
						Registration Date<input type="text" name="rdate" id="rdate" value="<?= $date ?>" readonly>
					</div>
					<div class="col-3 col-12-xsmall">
						Job Profile<input type="text" name="profile" id="profile" value="<?= $pro ?>" />
					</div>
					<div class="col-3 col-12-xsmall">
						Rounds<select name="rounds">
							<option selected><?= $rounds ?></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
						</select>
					</div>
					<div class="col-3 col-12-xsmall">
						Status
						<select name="status">
							<option selected><?= $status ?></option>
							<option>Registered</option>
							<option>Test Scheduled</option>
							<option>Interview Scheduled</option>
							<option>Shortlisted</option>
							<option>Selected</option>
							<option>Rejected</option>
						</select>
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Save" name="submit" class="button primary"></li>
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