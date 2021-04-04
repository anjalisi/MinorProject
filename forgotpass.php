<?php
session_start();
require_once "connect.php";
if(isset($_POST['email'])){
    $query = "SELECT * FROM student_data WHERE email = :username AND enroll_no = :roll";  
	$statement = $pdo->prepare($query);  
	$statement->execute(  
		 array(  
			  'username'=>$_POST["email"],  
			  'roll'=>$_POST["roll"]
		 )  
	);  
    $rows= $statement->fetchAll(PDO::FETCH_ASSOC);
	if(count($rows)) 
	{ 
        $email = htmlentities($_POST['email']);
		$stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
            $name= htmlentities($row['Name']);
            $email= htmlentities($row['email']);
            $token= bin2hex(random_bytes(15));
            
            $stmt12 = $pdo->prepare("UPDATE student_data SET token=:token WHERE email='$email'");
            
            $stmt12->execute(array(
                ':token'=> $token
                )
            );

            $subject = "Password Reset";
            $body=  "Hi, $name.\n 
            Click here to reset your password http://localhost/mp/forgotpass.php?token=$token";
            $sender_email= "From: projectcllg@gmail.com";
            if(mail($email, $subject, $body, $sender_email)){
                $_SESSION['msg'] = "Check your mail to reset your password";
            }  
        }
	}  
	else  
	{  
		$_SESSION['error'] = "User does not exist";
        header("Location: forgotpass.php");
        return;  
	}
}

?>

<!DOCTYPE HTML>
<html>
    <head>
    	<title>Campus Recruitment | Forgot Password</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
                <header id="header" class="alt">
                    <h1 id="logo"><a href="index.html">University <span>Placement Cell</span></a></h1>
                </header>

        <div class="banner">
            <form method="POST" class="form sign-in">
                <h2>Forgot Password?</h2>
                <p>Enter your email address and enrollment number and click on the link in the email to reset your password.</p>
                <br />
                <?php
					if(isset($_SESSION['error']))
					{
						echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
						unset($_SESSION['error']);
					}
                    if(isset($_SESSION['msg']))
					{
						echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['msg'])."</span></center>\n");
						unset($_SESSION['msg']);
					}
				?>
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    <span>Enrollment Number</span>
                    <input type="text" name="roll" required>
                </label>
                <br />
                <br />
                <a href="">   
                    <input class="submit" name="submit" type="submit" value="Send Email"/>
                </a> 
                </form>

        </div>
        
        <script type="text/javascript" src="assets/js/script.js"></script>

    </body>
</html>