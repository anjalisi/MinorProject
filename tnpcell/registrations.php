<?php
session_start();
require_once "../connect.php";

if (!isset($_SESSION['admin'])) {
	header('Location:../loginAdmin.php');
	return;
}
$email = $_SESSION['admin'];

?>
<!DOCTYPE HTML>

<html>

<head>
	<title>IGDTUW Recruitment | TNP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/tnpdash.css" />
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
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
				<li><a href="recruiterdata.php">Recruiter Database</a></li>
				<li class="active"><a href="registrations.php">Registration Database</a></li>
				<li><a href="placed.php">Placed Students</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<section class="post">
				<header class="major align-center">
					<h1>Registration Database</h1>
				</header>
				<p>
					Review the applications for each recruiter. Keep the applicants updated by editing the rounds and status.
				</p>
			</section>
			<?php
			$stmt = $pdo->query("SELECT * FROM company_data");
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$rec_id = htmlentities($row['company_email']);

				$com_name = htmlentities($row['company_name']);
				echo ('<h2 class="company-name collapsible"><span class="icon solid fa-angle-down"></span>&ensp;');
				echo ($com_name);
				echo ('</h2>
				                <div class="coll-content">
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Student Email</th>
													<th>Student Name</th>
													<th>Year</th>
													<th>Recruiter Email</th>
													<th>Job Profile(s)</th>
													<th>Registration Date</th>
													<th>Rounds</th>
													<th>Status</th>
													<th></th>
													<th></th>
												</tr>
											</thead>
											<tbody>');
				$stmt1 = $pdo->query("SELECT * from student_registrations where rec_id='$rec_id'");
				while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					//echo(1);
					$str = "reviewreg.php?txt=" . strval(htmlentities($row['id']));
					echo "<tr>
											<td>";
					echo (htmlentities($row['stu_id']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['stu_name']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['stu_year']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['rec_id']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['profile']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['applied_date']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['rounds']));
					echo ("</td>
											<td>");
					echo (htmlentities($row['status']));
					echo ("</td>
											<td><a href='$str' class='button small'>Review</a></td>
										</tr>");
				}
				echo ("</tbody>
									</table>
								</div>
								</div>\n");
			}
			?>
			<!-- <h2 class="company-name">Intuit</h2>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Student Email</th>
											<th>Student Name</th>
											<th>Year</th>
											<th>Recruiter Email</th>
											<th>Job Profile(s)</th>
											<th>Registration Date</th>
											<th>Rounds</th>
											<th>Status</th>
											<th></th>
											<th></th>
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
									</tbody>
								</table>
							</div>

							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table> -->
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
		var timer = setInterval(function() {
			auto_logout()
		}, 600000);

		function reset_interval() {
			clearInterval(timer);
			timer = setInterval(function() {
				auto_logout()
			}, 600000);
		}

		function auto_logout() {

			if (!alert("Your session has ended due to inactivity, click Ok to login to the portal again.")) {
				window.location = "../logout.php";
			}

		}
	</script>
	<script type="text/javascript">
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var content = this.nextElementSibling;
		    if (content.style.maxHeight){
		      content.style.maxHeight = null;
		    } else {
		      content.style.maxHeight = content.scrollHeight + "px";
		    }
		  });
		}
	</script>
</body>

</html>