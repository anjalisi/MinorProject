<?php
session_start();
require_once "connect.php";

$email=$_SESSION['email'];
$stmt= $pdo->query("SELECT * FROM student_data where email='$email'");
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
							<li><a href="noticeboard.html#header">Notice Board</a></li>
							<li ><a href="registrations.html">Registrations</a></li>
							<li class="active"><a href="profile.html">Profile</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>Student Profile</h1>
								</header>							
							</section>

							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										First Name<input type="text" name="fname" id="fname" value="Taniya" />
									</div>
									<div class="col-6 col-12-xsmall">
										Last Name<input type="text" name="lname" id="lname" value="Rawat" />
									</div>
									<div class="col-6 col-12-xsmall">
										Enrollment No.<input type="text" name="roll" id="roll" value="10001012017" />
									</div>
									<div class="col-6 col-12-xsmall">
										Email<input type="text" name="email" id="email" value="shreya093btcse17@igstuw.ac.in" />
									</div>
									<div class="col-6 col-12-xsmall">
										Contact No.<input type="text" name="phone" id="phone" value="123456987" />
									</div>
									<div class="col-6 col-12-xsmall">
										CGPA<input type="text" name="cgpa" id="cgpa" value="8.9" />
									</div>
									
									<div class="col-4 col-12-xsmall">
										Branch
										<select name="branch" id="branch">
											<option value="">- Branch -</option>
											<option value="1" selected>CSE</option>
											<option value="2">IT</option>
											<option value="3">MAE</option>
											<option value="4">ECE</option>
										</select>
									</div>
									<div class="col-4 col-12-xsmall">
										Course
										<select name="course" id="course">
											<option value="">- Course -</option>
											<option value="1" selected>BTech</option>
											<option value="2">MTech</option>
										</select>
									</div>
									<div class="col-4 col-12-xsmall">
										Year
										<select name="year" id="year">
											<option value="">- Year -</option>
											<option value="1">1st</option>
											<option value="2">2nd</option>
											<option value="3">3rd</option>
											<option value="4" selected>4th</option>
										</select>
									</div>

									<div class="col-12">
										Resume Link<input type="text" name="resume" id="resume" value="Resume Link"  />
									</div>
									<div class="col-12">
										Password <input type="password" name="pass" id="pass" value="password" />
									</div>
									<div class="col-12">
										Confirm Password<input type="password" name="passw" id="passw" value="password" />
									</div>
									<div class="col-12">
										<input type="checkbox" id="checkx" name="checkx">
										<label for="checkx">I declare that the above information is true.</label>
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><a href="profile.html" class="button primary">Save</a></li>
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