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
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
				<p>Click on 'POST' to make the company data visible to all the applicants.<br>
					You can add or edit some of the data, if required.</p>
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
							<th>POC Contact</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($_POST['approve'])){
							$rec_id= $_POST['rec_id'];
							$stmt = $pdo->prepare("UPDATE company_data SET approve=1 where company_email=:email");
							$stmt->execute(array(':email' => $rec_id));
							
						}
						$stmt = $pdo->query("SELECT * FROM company_data");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$rec_id=htmlentities($row['company_email']);
							$approve = htmlentities($row['approve']);
							$id=htmlentities($row['id']);
							$str="editcompany.php?txt=".strval($id);
							//echo($str);
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
							echo (htmlentities($row['poc_contact']));
							echo ("</td>
							<td>");
							echo ("</td>
							<td><form method='post'>
							<input type='hidden' value='$rec_id' name='rec_id'/>");
							if($approve == 0)
							{
								echo("
								<input type='submit' class='small' name='approve' value='Post'/>-
								</form></td>");
							}
							else{
								echo("
								<input type='submit' class='small disabled' name='approve' value='Posted' />
								</form></td>");
							}
							echo("<td><a href='$str' class='button small'>Edit</a></td>\n");
						}
						?>

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
	<script type="text/javascript">
		var timer = setInterval(function(){ auto_logout() }, 600000);
		function reset_interval(){
		    clearInterval(timer);
		    timer = setInterval(function(){ auto_logout() }, 600000);
		}
		 
		function auto_logout(){
		    
		    if(confirm("Your session has ended due to inactivity, click Ok to login to the portal again.")){
		        window.location="../logout.php";
		    }
		 
		}
	</script>

</body>

</html>
