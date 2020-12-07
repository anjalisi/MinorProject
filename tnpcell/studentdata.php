<?php
session_start();
require_once "../connect.php";

$email = $_SESSION['admin'];

?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Campus Recruitment | TNP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/tnpdash.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">

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
			<h1>Training and Placement Cell</h1>
			<p>
				<b>View Master Databases for students and recruiters.</b>
				<br />
				<br />
				Update notice board and recruitment status for students. Approve recruiter details.
				<br />
				For more information, visit the <a href="http://igdtuw.ac.in/" target="_blank">University Website</a>.
			</p>
			<ul class="actions">
				<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="../index.html" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li class="active"><a href="studentdata.php">Student Database</a></li>
				<li><a href="recruiterdata.php">Recruiter Database</a></li>
				<li><a href="registrations.php">Registrations Database</a></li>
				<li><a href="placed.php">Placed Students</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<!-- Post -->
			<section class="post">
				<header class="major align-center">
					<h1>Student Database</h1>
				</header>
			</section>

			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Enrollment No.</th>
							<th>Email</th>
							<th>Contact No.</th>
							<th>CGPA</th>
							<th>Active Backs</th>
							<th>Dead Backs</th>
							<th>Year</th>
							<th>Resume Link</th>
							<th>LOR</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stmt = $pdo->query("SELECT * FROM student_data");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>
							<td>";
							echo (htmlentities($row['Name']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['enroll_no']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['email']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['contact']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['CGPA']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['active_back']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['dead_back']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['grad_year']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['resume']));
							echo ("</td>
							<td>");
							echo ("resume link");
							echo ("</td>
							<td><input type='button' name='block' value='Block' class='small'></td>
							<td><input type='button' name='editstu' value='Edit' class='modals small'></td>
						</tr>\n");
						}
						?>

					</tbody>

				</table>
			</div>
			
			<div id="modal" class="modal">
				<div class="modal-content">
					<div class="modal-heading"><span class="close">&times;</span>Edit Details</div>	
					<div class="row">
						<p class="col-2">Name</p>
						<input type="text" value="Kritesha" class="col-4" readonly />

						<p class="col-2">Enrollment No.</p>
						<input type="text" value="08801012017" class="col-4" readonly />

						<p class="col-2">Email</p>
						<input type="text" value="tkri@gmail.com" class="col-4" readonly />

						<p class="col-2">Contact No.</p>
						<input type="text" value="1234567890" class="col-4" readonly />

						<p class="col-2">CGPA</p>
						<input type="text" value="8.9" class="col-4" readonly />

						<p class="col-2">Active Backs</p>
						<input type="text" value="0" class="col-4" readonly />

						<p class="col-2">Dead Backs</p>
						<input type="text" value="0" class="col-4" readonly />

						<p class="col-2">Year</p>
						<input type="text" value="4" class="col-4" readonly />

						<p class="col-2">Resume Link</p>
						<input type="text" value="drive.google.com/resumelinkdummy" class="col-4" readonly />	

						<p class="col-2">LOR</p>
						<input type="text" value="None" class="col-4" readonly />	
					</div>

					<input type="button" name="submit" value="Save" /> 

				</div>
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
	<script type="text/javascript">
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


		var modal = document.getElementById("modal");

		var buttons = document.getElementsByClassName("modals");

		var span = document.getElementsByClassName("close")[0];

		for (var i = 0; i < buttons.length; i++) 
		(function(i){
			buttons[i].onclick = function() {
				modal.style.display = "block";
			}
		})(i);

		span.onclick = function() {
		  modal.style.display = "none";
		}

		window.onclick = function(event) {
		  if (event.target == modal) {
		    modal.style.display = "none";
		  }
		}
	</script>

</body>

</html>
