<?php
session_start();
require_once "connect.php";
if(isset($_POST['comp_name']) && isset($_POST['comp_email']) && isset($_POST['signup_comp']))
{
    unset($_SESSION['username']);
    
    $sql_u= "select * from company_data where company_email=:email";
	$stmt1=$pdo->prepare($sql_u);
	$stmt1->execute(array(
		':email' => $_POST['comp_email']
	));
	$count= $stmt1->rowCount();  
	if($count > 0)  
	{  
		$_SESSION['error'] = "Seems Like the User Already Exists";
        header("Location: loginRecruiter.php");
        return; 
	}  
	else{
        $sql="INSERT INTO company_data(company_name, company_email, password, hr_name, id)
     values(:name,:email,:pass, :hr,:id)";
     
        $str= rand();
        $vkey= md5($str);
        $id= rand(1000,999999);
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['comp_name'],
            ':email' => $_POST['comp_email'],
            ':pass' => md5($_POST['comp_pass']),
            ':hr' => $_POST['hr_name'],
            ':id' => $id
        ));
        $_SESSION["username"] = $_POST["comp_email"];  

        header("Location:recruiter/applications.php");
        return;
    }
}

if(isset($_POST['email']) && isset($_POST['password']) )
{
	$query = "SELECT * FROM company_data WHERE company_email = :username AND password = :password";  
	$statement = $pdo->prepare($query);  
	$statement->execute(  
		 array(  
			  'username'=>$_POST["email"],  
			  'password'=>md5($_POST["password"])  
		 )  
	);  
	$count = $statement->rowCount();  
	if($count > 0) 
	{  
		 $_SESSION["username"] = $_POST["email"];  
		 header("Location:recruiter/applications.php");  
		 return;
	}  
	else  
	{  
		$_SESSION['error'] = "Invalid Username or Password";
        header("Location: loginRecruiter.php");
        return;  
	}  
}
?>
<!DOCTYPE HTML>
<html>
    
    <head>
	    <title>Campus Recruitment | Recruiter Login</title>
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
                            <li><a href="loginStudent.php" class="button primary scrolly">Login as Student</a></li>
                        </ul>
                    </nav>
                </header>
        
        <div class="cont">
            
            <form method="post" class="form sign-in">
                <h2><b>Sign In</b></h2>
                <?php
					if(isset($_SESSION['error']))
					{
						echo ("<center><span style='color:blue;'>".htmlentities($_SESSION['error'])."</span></center>\n");
						unset($_SESSION['error']);
					}
				?>
                    
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label> 
                    <input class="submit" type="submit" value="Sign In" class="signin_comp">
                
                <p><a href="forgotpass.php" class="forgot-pass">Forgot Password ?</a></p>
            </form>

            <div class="sub-cont">
                
                <div class="img">
                    
                    <div class="img-text m-up">
                        <h2>New here?</h2>
                        <p>Sign up and meet with the brilliant minds on campus!</p>
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
                        <span>Company Name</span>
                        <input type="text" pattern="^[a-zA-Z ][a-zA-Z0-9-_. ]*$" name="comp_name" required>
                    </label>
                    
                    <label>
                        <span>Email</span>
                        <input type="email" name="comp_email" required>
                    </label>
                    
                    <label>
                        <span>Representative Name</span>
                        <input type="text" name="hr_name" required>
                    </label>
                    
                    <label>
                        <span>Password</span>
                        <input type="password" name="comp_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 						 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </label>
                    
                    <input type="submit" class="submit" name="signup_comp" value="Sign Up">
                    </form>
            </div>
        </div>
    </div>
        
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>

</html>
