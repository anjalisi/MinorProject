<?php
session_start();
require_once "../connect.php";
if(!isset($_SESSION['admin']))
{
	header('Location:../loginAdmin.php');
	return;
}

$email = $_SESSION['admin'];
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Campus Recruitment | TNP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/tnpdash.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Header -->
					<header id="header">
						<a href="../index.html" class="logo">Logout</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="studentdata.php">Student Database</a></li>
							<li><a href="recruiterdata.php">Recruiter Database</a></li>
							<li><a href="registrations.php">Registration Database</a></li>
							<li class="active"><a href="placed.php">Placed Students</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major align-center">
									<h1>Placed Students</h1>
								</header>							
							</section>

							<h2 class="company-name">Intuit</h2>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Course</th>
											<th>Year</th>
											<th>Profile</th>
											<th>Other Offers</th>
											<th>Offer Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td> <a href="#">Shreya Srivatsan</a> </td>
											<td>shreya@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>2.</td>
											<td> <a href="#">Anjali Singh</a> </td>
											<td>anjo@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>3.</td>
											<td> <a href="#">Taniya Rawat</a> </td>
											<td>tanu@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>4.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>abcd.xyz.123@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
									</tbody>
								</table>
							</div>

							<h2 class="company-name">Microsoft</h2>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Course</th>
											<th>Year</th>
											<th>Profile</th>
											<th>Other Offers</th>
											<th>Offer Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td> <a href="#">Shreya Srivatsan</a> </td>
											<td>shreya@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>2.</td>
											<td> <a href="#">Anjali Singh</a> </td>
											<td>anjo@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>3.</td>
											<td> <a href="#">Taniya Rawat</a> </td>
											<td>tanu@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
										<tr>
											<td>4.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>abcd.xyz.123@gmail.com</td>
											<td>BTech</td>
											<td>4th</td>
											<td>SDE</td>
											<td>No</td>
											<td><input type="button" name="accept" value="Accept" class="small"></td>
											<td><input type="button" name="reject" value="Reject" class="small"></td>
										</tr>
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

	</body>
</html>