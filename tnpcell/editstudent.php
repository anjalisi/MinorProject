<?php
session_start();
require_once "../connect.php";
if(!isset($_SESSION['admin']))
{
	header('Location:../loginAdmin.php');
	return;
}
$email = $_SESSION['admin'];
if (!isset($_GET['txt'])) {
	header("Location:studentdata.php");
	return;
}

$email = $_GET['txt'];

if(isset($_POST['save'])){
	$filename=$email.'-lor-'.$_FILES['myfile']['name'];
	$destination='../student/lor/'.$filename;
	$extension= pathinfo($filename, PATHINFO_EXTENSION);
	$file= $_FILES['myfile']['tmp_name'];
	$size= $_FILES['myfile']['size'];

	if(!in_array($extension,['pdf','doc','docx'])){
		echo '<script>alert("Enter a PDF or Doc!")</script>';
	}
	if($_FILES['myfile']['size']>2097152){
	    echo '<script>alert("File should be under 2MB")</script>';
	}
	else{
		if(move_uploaded_file($file, $destination)){
			$sql= "UPDATE student_data SET lor=:name WHERE email='$email'";
			
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':name' => $filename));

			
	header("Location:studentdata.php");
		
		echo '<script>alert("Uploaded Sucessfully!")</script>';
		return;
		}

	}
}

$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {

	$stmt = $pdo->prepare("UPDATE student_data SET CGPA=:cgpa, resume=:resume, dead_back=:dback, active_back=:aback  
		WHERE email='$email'");
	$stmt->execute(array(
		':cgpa' => $_POST['cgpa'],
		':aback' => $_POST['aback'],
		':dback' => $_POST['dback'],
		':resume' => $_POST['resume'],
	));
	header("Location:studentdata.php");
	return;
}

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
				<li><a href="recruiterdata.php">Recruiter Database</a></li>
				<li><a href="registrations.php">Registrations Database</a></li>
				<li><a href="placed.php">Placed Students</a></li>
				<li class="active"><a href="editstudent.php">Edit Student</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<?php
			if (count($rows)) {
				$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$name = htmlentities($row['Name']);
					$email = htmlentities($row['email']);
					$contact = htmlentities($row['contact']);
					$activeBack = htmlentities($row['active_back']);
					$deadBack = htmlentities($row['dead_back']);
					$enrol = htmlentities($row['enroll_no']);
					$CGPA = htmlentities($row['CGPA']);
					$year = htmlentities($row['grad_year']);
					$resume = htmlentities($row['resume']);
					
				}
			}
			?>
			<!-- Post -->
			<section class="post">
				<header class="major">
					<h1>Edit Student Profile</h1>
				</header>
			</section>

			<form method="post">
				<div class="row gtr-uniform">
					<div class="col-6 col-12-xsmall">
						Full Name<input type="text" readonly name="fname" id="fname" value="<?= $name?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Enrollment No.<input type="text" readonly name="enrol" id="roll" value="<?= $enrol?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Email<input type="text" readonly name="email" id="email" value="<?= $email?>" />
					</div>
					<div class="col-6 col-12-xsmall">
						Contact No.<input type="text" readonly name="phone" id="phone" value="<?=$contact?>" />
					</div>
					<div class="col-3 col-12-xsmall">
						CGPA<input type="text" pattern="^[0]|[0-9]\.(\d?\d?)|[10].[0]$" name="cgpa" id="cgpa" value="<?=$CGPA?>" />
					</div>
					<div class="col-3 col-12-xsmall">
						Year<input type="text" readonly name="year" id="year" value="<?=$year?>" />
					</div>
					<div class="col-3 col-12-xsmall">
						Active Backlogs<input type="text" pattern="^[0-9]+$" name="aback" id="activeback" value="<?=$activeBack?>">
					</div>
					<div class="col-3 col-12-xsmall">
						Dead Backlogs<input type="text" pattern="^[0-9]+$" name="dback" id="deadback" value="<?=$deadBack?>">
					</div>

					<div class="col-6">
						Resume <input type="text" name="resume" id="resume" value="<?=$resume?>" readonly/>
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Save" name = "submit" href="studentdata.php" class="button primary"></li>
							<li><input type="reset" value="Reset" /></li>
						</ul>
					</div>
				</div>
			</form>
<!-- Post -->
<section class="post">
				<header class="major">
					<h1>Letter of Recommendation</h1>
				</header>
			</section>

			<form method="post" enctype="multipart/form-data">
				<div class="row gtr-uniform">
					<div class="col-12 col-12-xsmall">
						Upload LOR<br><input type="file" name="myfile" value="<?= $name?>" />
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Upload" name = "save"  class="button primary"></li>
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