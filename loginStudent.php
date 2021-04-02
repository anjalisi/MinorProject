<?php
session_start();
require_once "connect.php";
if(isset($_POST['stu_name']) && isset($_POST['stu_email']) && isset($_POST['signup_stu']))
{
	unset($_SESSION['email']);
    $sql_u= "select * from student_data where email=:email";
	$stmt1=$pdo->prepare($sql_u);
	$stmt1->execute(array(
		':email' => $_POST['stu_email']
	));
	$count= $stmt1->rowCount();  
	if($count > 0)  
	{  
		$_SESSION['error'] = "Seems Like the User Already Exists";
        header("Location: loginStudent.php");
        return; 
	}  
	else{
        $sql="INSERT INTO student_data(name, email, password, enroll_no, status)
	 values(:name,:email,:password, :enroll_no, 'Open')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['stu_name'],
            ':email' => $_POST['stu_email'],
            ':password' => md5($_POST['stu_pass']),
            ':enroll_no' => $_POST['enrol'],
        ));
        $_SESSION['email'] = $_POST['stu_email'];

        header("Location:student/noticeboard.php");
        return;
    }
}

if(isset($_POST['email']) && isset($_POST['pass']) )
{
	$query = "SELECT * FROM student_data WHERE email = :username AND password = :password";  
	$statement = $pdo->prepare($query);  
	$statement->execute(  
		 array(  
			  'username'=>$_POST["email"],  
			  'password'=>md5($_POST["pass"])
		 )  
	);  
	$count = $statement->rowCount();  
	if($count > 0) 
	{  
		 $_SESSION["email"] = $_POST["email"];  
		 header("Location:student/noticeboard.php");  
		 return;
	}  
	else  
	{  
		$_SESSION['error'] = "Invalid Username or Password";
        header("Location: loginStudent.php");
        return;  
	}  
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    	<title>Campus Recruitment | Student Login</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
                <header id="header" class="alt">
                    <h1 id="logo"><a href="index.html">University <span>Placement Cell</span></a></h1>
                    <nav id="nav">
                        <ul>
                            <li><a href="loginRecruiter.php" class="button primary scrolly">Login as Recruiter</a></li>
                        </ul>
                    </nav>
                </header>

        <div class="cont">
            <form method = "post" class="form sign-in">
                <h2>Sign In</h2>
                <?php
						if(isset($_SESSION['error']))
						{
							echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
							unset($_SESSION['error']);
						}
					?>
                <label>
                    <span>Email Address</span>
                    <input name="email" type="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@igdtuw.ac.in" title= "Use college mail id" placeholder="@igdtuw.ac.in"  required>
                </label>
                <label>
                    <span>Password</span>
                    <input name="pass" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 						 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </label>
                
                    <input class="submit" type="submit" value="Sign In"></input>
                
                <p class="forgot-pass">Forgot Password ?</p>
            </form>

            <div class="sub-cont">
                <div class="img">
                    <div class="img-text m-up">
                        <h2>New here?</h2>
                        <p>Sign up and never miss out on any placement opportunities!</p>
                    </div>
                    
                    <div class="img-text m-in">
                        <h2>One of us?</h2>
                        <p>If you already have an account, sign in. We've missed you!</p>
                    </div>
                    
                    <div class="img-btn">
                        <span class="m-up">Sign Up</span>
                        <span class="m-in">Sign In</span>
                    </div>
                </div>
            
                <form method="post" class="form sign-up">
                    <h2>Sign Up</h2>
                    <?php
						if(isset($_SESSION['error']))
						{
							echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
							unset($_SESSION['error']);
						}
					?>
                    <label>
                        <span>Name</span>
                        <input name="stu_name" type="text" required>
                    </label>
                    <label>
                        <span>Email</span>
                        <input name="stu_email" type="email" placeholder="@igdtuw.ac.in"  pattern="^[a-zA-Z0-9._%+-]+@igdtuw.ac.in"  required>
                    </label>
                    <label>
                        <span>Enrolment Number</span>
                        <input name="enrol" type="text" pattern="^[0-9]{11}$" maxlength="11" title="Enter Correct Roll Number" required>
                    </label>
                    <label>
                        <span>Password</span>
                        <input name="stu_pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 						 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </label>
                    <input name="signup_stu" type="submit" class="submit" value="Sign Up"></input>
                </form>
            </div>
        </div>


    </div>
        
        <script type="text/javascript" src="assets/js/script.js"></script>

    </body>
</html>
