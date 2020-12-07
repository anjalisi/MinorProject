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

		<!-- Header -->
		<header id="header">
			<a href="../index.html" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="studentdata.php">Student Database</a></li>
				<li class="active"><a href="recruiterdata.php">Recruiter Database</a></li>
				<li><a href="registrations.php">Registration Database</a></li>
				<li><a href="placed.php">Placed Students</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<section class="post">
				<header class="major align-center">
					<h1>Recruiter Database</h1>
				</header>
			</section>

			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Hiring Manager</th>
							<th>Domain</th>
							<th>Email</th>
							<th>Contact No.</th>
							<th>Job Profile(s)</th>
							<th>Location</th>
							<th>Compensation (CTC)</th>
							<th>Test Date</th>
							<th>Interview Date</th>
							<th>Deadline</th>
							<th>Min. Shortlists</th>
							<th>Final Shortlists</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stmt = $pdo->query("SELECT * FROM company_data");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>
							<td>";
							echo (htmlentities($row['company_name']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['hr_name']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['domain']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['company_email']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['company_contact']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['job_profiles']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['location']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['ctc']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['test_date']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['interview_date']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['deadline_date']));
							echo ("</td>
							<td>");
							echo (htmlentities($row['min_shortlist']));
							echo ("</td>
							<td>");
							echo ('final_shortlists');
							echo ("</td>
							<td>");
							echo ("</td>
							<td><input type='button' name='notice' value='Post' class='small'></td>
							<td><input type='button' name='editrec' value='Edit' class='modals small'></td>
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
						<p class="col-2">Company Name</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Hiring Manager</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Domain</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Email</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Contact No.</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Job Profile(s)</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Location</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Compensation</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Test Date</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Interview Date</p>
						<input type="text" value="Intuit" class="col-4" readonly />	

						<p class="col-2">Deadline</p>
						<input type="text" value="Intuit" class="col-4" readonly />

						<p class="col-2">Min. Shortlists</p>
						<input type="text" value="Intuit" class="col-4" readonly />	

						<p class="col-2">Final Shortlists</p>
						<input type="text" value="Intuit" class="col-4" readonly />		
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
