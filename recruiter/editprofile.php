<?php
session_start();
require_once "connect.php";

$email=$_SESSION['username'];
$stmt= $pdo->query("SELECT * FROM company_data where company_email='$email'");
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit']) && isset($_POST['email'])){
	
	if(strcmp($_POST['pass'], $_POST['repass'])==0){
		$stmt = $pdo->prepare('UPDATE company_data SET itemname=:itemname, price=:price,qty=:qty, tax_rate=:tax_rate, tax_amt=:tax_amt,disc_rate=:disc_rate,disc_amt=:disc_amt, amount=:amount 
		WHERE order_id=:order_id AND invoice_id=:inv');
		$stmt->execute(array(
			':itemname' => $_POST['itemname'],
			':price' => $_POST['price'],
			':qty' => $_POST['qty'],
			':tax_rate' => 0,
			':tax_amt' => 0,
			':disc_rate' => $_POST['disc'],
			':disc_amt' => ($_POST['price']*$_POST['qty']*$_POST['disc']/100),
			':amount' => (($_POST['price']*$_POST['qty'])*(1-($_POST['disc']/100))* $_POST['tax']/100)+$_POST['price']*$_POST['qty'],
			':inv' => $_GET['invoice_id'],
			':order_id' => $_POST['order_id']
				)
		);
		$_SESSION['success'] = 'Record updated';
		header("Location: freelancer-invoice.php?id=".$id."&key=".$vkey);
		return;
	}
	else if(strcmp($_POST['pass'], $_POST['repass'])!=0)
	{
		$_SESSION['error'] = "Passwords Did Not Match";
        header("Location: freelancer_reg.php");
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
							$base=htmlentities($row['base']);
							$test_date=date("d-M-Y", strtotime($row['test_date']));
							$interview_date=date("d-M-Y", strtotime($row['interview_date']));
							$deadline_date=date("d-M-Y", strtotime($row['deadline_date']));
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

							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										Company Name<input type="text" name="cname" id="cname" value="<?=$name?>" disabled/>
									</div>
									<div class="col-6 col-12-xsmall">
										Recruitment Manager<input type="text" name="rname" id="rname" value="<?= $hr?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Domain<input type="text" name="" id="" value="<?= $domain?>"/>
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
										Test Date<input type="date" name="tdate" id="tdate" value="<?= $test_date ?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Interview Date<input type="date" name="idate" id="idate" value="<?= $interview_date ?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Registration Deadline<input type="date" name="ddate" id="ddate" value="<?= $deadline_date ?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Minimum Shortlists<input type="text" name="minshrt" id="minshrt" value="<?= $min ?>" />
									</div>
									<div class="col-6 col-12-xsmall">
										Point of Contact<input type="text" name="poc" value="<?= $poc ?>" disabled />
									</div>
									<div class="col-12">
										POC Contact <input type="password" name="poc_contact" id="pass" value="<?= $poc_contact ?>" />
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