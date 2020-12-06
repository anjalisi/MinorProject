<?php
session_start();
require_once "../connect.php";

$email=$_SESSION['email'];
$stmt= $pdo->query("SELECT * FROM student_data where email='$email'");
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['submit'])){
	
	if(strcmp($_POST['passw'], $_POST['rpassw'])==0){ 
		$stmt = $pdo->prepare("UPDATE student_data SET Name=:name,contact=:contact, enroll_no=:enrol,CGPA=:CGPA, dead_back=:deadBack, active_back=:activeBack,
		grad_year=:year, resume=:resume, password=:pass WHERE email='$email'");

		$stmt->execute(array(
			':name'=> $_POST['fname'],
			':contact' => $_POST['phone'],
			':enrol' => $_POST['enrol'],
			':CGPA' => $_POST['cgpa'],
			':deadBack' =>  $_POST['dback'],
			':activeBack' =>  $_POST['aback'],
			':year' => $_POST['year'],
			':resume' => ($_POST['resume']),
			':pass' => $_POST['passw'],
			)
		);
		header("Location: profile.php");
		return;
	}
	else if(strcmp($_POST['passw'], $_POST['rpassw'])!=0)
	{
		$_SESSION['error'] = "Passwords Did Not Match";
        header("Location: editprofile.php");
        return;
	}
}

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

				<!-- Header -->
					<header id="header">
						<a href="../index.html" class="logo">Home</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="noticeboard.html#header">Notice Board</a></li>
							<li ><a href="registrations.html">Registrations</a></li>
							<li class="active"><a href="profile.php">Profile</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
					<?php

					if(count($rows)){
						$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
						while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
							$name= htmlentities($row['Name']);
							$email= htmlentities($row['email']);
							$contact=htmlentities($row['contact']);
							$activeBack=htmlentities($row['active_back']);
							$deadBack=htmlentities($row['dead_back']);
							$enrol= htmlentities($row['enroll_no']);
							$CGPA=htmlentities($row['CGPA']);
							$year=htmlentities($row['grad_year']);
							$resume=htmlentities($row['resume']);
							$password= htmlentities($row['password']);
						}
					}		
					?>

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Student Profile</h1>
								</header>							
							</section>
							<?php
								if(isset($_SESSION['error']))
								{
									echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
									unset($_SESSION['error']);
								}
							?>

							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Name<input type="text" name="fname" value="<?= $name?>" readonly/>
									</div>
									<!-- <div class="col-6 col-12-xsmall">
										Last Name<input type="text" name="lname" id="lname" value="Rawat" />
									</div> -->
									<div class="col-6 col-12-xsmall">
										Enrollment No.<input type="text" name="enrol" id="roll" value="<?= $enrol?>" readonly/>
									</div>
									<div class="col-6 col-12-xsmall">
										Email<input type="text" name="email" id="email" value="<?= $email?>" readonly />
									</div>
									<div class="col-6 col-12-xsmall">
										Contact No.<input type="text" name="phone" id="phone" value="<?= $contact?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										CGPA<input type="text" name="cgpa" id="cgpa" value="<?= $CGPA?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Active Backs<input type="text" name="aback" id="aback" value="<?= $activeBack?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Dead Backs<input type="text" name="dback" id="dback" value="<?= $deadBack?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Year
										
											<input type = "text" name="year" value="<?= $year?>"></input>
											
									</div>

									<div class="col-12">
										Resume Link<input type="text" name="resume" id="resume" value="<?= $resume?>"  />
									</div>
									<div class="col-12">
										Password<input type="password" name="passw" id="passw" value="<?= $password ?>" />
									</div>
									<div class="col-12">
										Confirm Password<input type="password" name="rpassw" id="rpassw" value="<?= $password ?>" />
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

	</body>
</html>