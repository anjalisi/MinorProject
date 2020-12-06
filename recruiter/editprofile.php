<?php
session_start();
require_once "connect.php";

$email=$_SESSION['username'];
$stmt= $pdo->query("SELECT * FROM company_data where company_email='$email'");
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['submit'])){
	
	if(strcmp($_POST['passw'], $_POST['rpassw'])==0){
		$stmt = $pdo->prepare('UPDATE company_data SET domain=:d,company_contact=:contact, base=:base,ctc=:ctc, location=:loc, job_profiles=:pro,test_date=:tdate,
		interview_date=:idate, deadline_date=:ddate, min_shortlist= :min, password=:pass, poc_name=:poc, poc_contact= :pcont, hr_name=:hr,
		jd_link=:jd, result_date= :rdate 
		WHERE company_email=:email');
		$stmt->execute(array(
			':d'=> $_POST['domain'],
			':contact' => $_POST['phone'],
			':base' => $_POST['base'],
			':ctc' => $_POST['ctc'],
			':loc' =>  $_POST['locn'],
			':pro' =>  $_POST['jobpr'],
			':tdate' => $_POST['tdate'],
			':idate' => ($_POST['idate']),
			':ddate' => $_POST['ddate'],
			':min' => $_POST['minshrt'],
			':pass' => $_POST['passw'],
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
							<li><a href="applications.html">Applications</a></li>
							<li class="active"><a href="profile.php">Profile</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
					<?php

					if(count($rows)){
						$stmt = $pdo->query("SELECT * FROM company_data where company_email='$email'");
						while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
							$name= htmlentities($row['company_name']);
							$email= htmlentities($row['company_email']);
							$domain=htmlentities($row['domain']);
							$phone=htmlentities($row['company_contact']);
							$job_profiles=htmlentities($row['job_profiles']);
							$location= htmlentities($row['location']);
							$ctc=htmlentities($row['ctc']);
							$jd=htmlentities($row['jd_link']);
							$base=htmlentities($row['base']);
							$test_date=htmlentities($row['test_date']);
							$interview_date=htmlentities($row['interview_date']);
							$rdate=htmlentities($row['result_date']);
							$deadline_date=htmlentities($row['deadline_date']);
							$min= htmlentities($row['min_shortlist']);
							$hr=htmlentities($row['hr_name']);
							$poc=htmlentities($row['poc_name']);
							$poc_contact=htmlentities($row['poc_contact']);
							$password= htmlentities($row['password']);
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
								if(isset($_SESSION['error']))
								{
									echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
									unset($_SESSION['error']);
								}
							?>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Company Name<input type="text" name="cname" id="cname" value="<?= $name?>" disabled/>
									</div>
									<div class="col-6 col-12-xsmall">
										Recruitment Manager<input type="text" name="rname" id="rname" value="<?= $hr?>" disabled/>
									</div>
									<div class="col-6 col-12-xsmall">
										Domain<input type="text" name="domain" id="" value="<?= $domain?>"/>
									</div>
									<div class="col-6 col-12-xsmall">
										Recruiter Email<input type="text" name="email" id="email" value="<?= $email?>" disabled/>
									</div>
									<div class="col-6 col-12-xsmall">
										Contact No.<input type="text" name="phone" id="phone" value="<?= $phone?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Job Profile(s)<input type="text" name="jobpr" id="jobpr" value="<?= $job_profiles?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Location<input type="text" name="locn" id="locn" value="<?= $location?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Compensation (CTC)<input type="text" name="ctc" id="ctc" value="<?= $ctc?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Base Salary<input type="text" name="base" id="base" value="<?= $base?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Minimum Shortlists<input type="text" name="minshrt" id="minshrt" value="<?= $min ?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Test Date(Tentative) *<input type="date" name="tdate" id="tdate" value="<?= $test_date ?>" required />
									</div>
									<div class="col-6 col-12-xsmall">
										Interview Date(Tentative) *<input type="date" name="idate" id="idate" value="<?= $interview_date ?>" required/>
									</div>
									<div class="col-6 col-12-xsmall">
										Registration Deadline(Tentative) *<input type="date" name="ddate" id="ddate" value="<?= $deadline_date ?>" required/>
									</div>
									<div class="col-6 col-12-xsmall">
										Result Deadline(Tentative) *<input type="date" name="rdate" id="ddate" value="<?= $rdate ?>" required/>
									</div>
									<div class="col-6 col-12-xsmall">
										POC Name<input type="text" name="poc" value="<?= $poc ?>" />
									</div>
									<div class="col-6">
										POC Contact <input type="text" name="poc_contact" id="pass" value="<?= $poc_contact ?>" />
									</div>
									<div class="col-12">
										Job Description File(Drive Link)<input type="text" name="jd" value="<?= $jd ?>" />
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
											<li><input name="submit" type="submit" class="button primary" value="Save"></a></li>
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