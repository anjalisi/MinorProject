<?php
session_start();
require_once "connect.php";

if(!isset($_SESSION['username']))
{
	header('Location:../loginRecruiter.php');
	return;
}
$email=$_SESSION['username'];

$stmt= $pdo->query("SELECT * FROM company_data where company_email='$email'");
$rows= $stmt->fetch(PDO::FETCH_ASSOC);

$duration= htmlentities($rows['role']);
$job= htmlentities($rows['job_profiles']);
					
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Campus Recruitment | Recruiter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/dashboard.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
						<h1>Recruiter Dashboard</h1>
						<?php

							if(count($rows)){
								$stmt = $pdo->query("SELECT * FROM company_data where company_email='$email'");
								while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									$name= htmlentities($row['company_name']);
									$id= htmlentities($row['id']);
									$poc=  htmlentities($row['poc_name']);
								}
							}
						?>
						<p>
							<b>View applicant profiles and participate in the University Campus Recruitment Drive.</b>
							<br />
							<br />
							Download the <a href="../info/TnP Brochure 2020-21.pdf" target="_blank">Placement Brochure</a> here.
							<br />
							For more information, visit the <a href="http://igdtuw.ac.in/" target="_blank">University Website</a>.
							<br />
							Recruiter ID: <b><?= $id?></b> <?= $name?>.
							<br />
							Person of Contact: <b><a href="#"><?= $poc?></a></b>
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
							<li class="active"><a href="applications.php">Applications</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="finalshortlists.php">Shortlists</a></li>							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Article Header -->
						<article class="post featured">
							<header class="major">
								<h2>Applications</h2>
							</header>	
						</article>

						<h3><?=$job?> - <?=$duration?></h3>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											
											<th>Full Name</th>
											<th>Contact</th>
											<th>Year</th>
											<th>CGPA</th>
											<th>Resume</th>
											<th>Active Backlogs</th>
											<th>Dead Backlogs</th>
											<th>Date Applied</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$stmt = $pdo->query("SELECT * FROM student_registrations where rec_id='$email' and status<>'Rejected'");
											while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
												$stu_name= htmlentities($row['stu_name']);
												$stu_contact= htmlentities($row['stu_contact']);
												$stu_res= htmlentities($row['stu_res']);
												$year= htmlentities($row['stu_year']);
												$cgpa= htmlentities($row['stu_cgpa']);
												$aback= htmlentities($row['aback']);
												$date= htmlentities($row['applied_date']);
												$dback= htmlentities($row['dback']);
												echo('<tr><td> <a href="#">');
												echo($stu_name);
												echo('</a> </td>
											<td>');
												echo($stu_contact);
												echo('</td>
											<td>');
												echo($year);
												echo('</td>
											<td>');
												echo($cgpa);
												echo('</td>
											<td>');
												echo($stu_res);
												echo('</td>
											<td>');
												echo($aback);
												echo('</td>
											<td>');
												echo($dback);
												echo('</td>
											<td>');
												echo($date);
												echo('</td></tr>');
											}					

										?>
									</tbody>
								</table>
							</div>
<!-- 
							<h3>Software Engineer - Intern</h3>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Full Name</th>
											<th>Course</th>
											<th>Branch</th>
											<th>Year</th>
											<th>CGPA</th>
											<th>Backlogs</th>
											<th>Date Applied</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>BTech</td>
											<td>CSE</td>
											<td>3rd</td>
											<td>9.0</td>
											<td>0</td>
											<td>26-08-2020</td>
										</tr>
										<tr>
											<td>2.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>BTech</td>
											<td>CSE</td>
											<td>3rd</td>
											<td>9.0</td>
											<td>0</td>
											<td>26-08-2020</td>
										</tr>
										<tr>
											<td>3.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>BTech</td>
											<td>CSE</td>
											<td>3rd</td>
											<td>9.0</td>
											<td>0</td>
											<td>26-08-2020</td>
										</tr>
										<tr>
											<td>4.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>BTech</td>
											<td>CSE</td>
											<td>3rd</td>
											<td>9.0</td>
											<td>0</td>
											<td>26-08-2020</td>
										</tr>
										<tr>
											<td>5.</td>
											<td> <a href="#">ABCD</a> </td>
											<td>BTech</td>
											<td>CSE</td>
											<td>3rd</td>
											<td>9.0</td>
											<td>0</td>
											<td>26-08-2020</td>
										</tr> -->
									<!-- </tbody> -->
								<!-- </table> -->
							<!-- </div> -->

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

				window.onscroll = function() {scrollFunction()};

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
				var timer = setInterval(function(){ auto_logout() }, 600000);
				function reset_interval(){
				    clearInterval(timer);
				    timer = setInterval(function(){ auto_logout() }, 600000);
				}
				
				function auto_logout(){
		    
				    if(!alert("Your session has ended due to inactivity, click Ok to login to the portal again.")){
				        window.location="../logout.php";
				    }
				 
				}
			</script>

	</body>
</html>
