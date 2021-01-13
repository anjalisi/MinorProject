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
			<a href="../index.html" class="logo">Logout</a>
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
				</header><p>
						View the list of students who have logged in on the portal.<br/>
						Edit/Update the data as and when necessary or in case of any discrepencies. A student can be blocked from further activity,<br/> disabling the student to participate in further placement drives.
						</p>	
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
						if(isset($_POST['block'])){
							$stu_id= $_POST['stu_id'];
							$stmt = $pdo->prepare("UPDATE student_data SET status='Closed' where email=:email");
							$stmt->execute(array(':email' => $stu_id));
							
						}


						$stmt = $pdo->query("SELECT * FROM student_data");
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$stu_id=htmlentities($row['email']);
							$str="editstudent.php?txt=".strval($stu_id);
							$status= htmlentities($row['status']);			
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
							echo (htmlentities($row['lor']));
							echo ("</td>
							<td><form method='post'>
							<input type='hidden' value='$stu_id' name='stu_id'/>");
							if(strcmp($status, 'Closed'))
							{
								echo("
								<input type='submit' class='small' name='block' value='Block'/>-
								</form></td>");
							}
							else{
								echo("
								<input type='submit' class='small disabled' name='block' value='Blocked' />
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
	</script>

</body>

</html>
