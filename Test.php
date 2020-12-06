<?php
session_start();
require_once "connect.php";

if(isset($_POST['signin_comp']))
{
	unset($_SESSION['username']);
    $sql_u= "select * from company_data where company_email=:email";
	$stmt1=$pdo->prepare($sql_u);
	$stmt1->execute(array(
		':email' => $_POST['name']
	));
	$count= $stmt1->rowCount();  
	if($count > 0)  
	{   header("Location: recruiter/applications.html");
        return; 
	}  
	else{
        $_SESSION['error'] = "Invalid Username or Password";
        header("Location: recruiter/applications.html");
        return; 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                
                <p class="forgot-pass">Forgot Password ?</p>
            </form>

</body>
</html>