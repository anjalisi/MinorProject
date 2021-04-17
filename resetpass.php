<?php
 session_start();
 require_once "connect.php";

 if (!isset($_GET['token'])) {
     header("Location: index.html");
     return;
}

$token = $_GET['token'];

    //student query
    $query = "SELECT * from student_data where token = :token";
    $statement = $pdo->prepare($query);
    $statement->execute(array(
        ':token' => $token
    ));
    $count = $statement->rowCount();
    //echo($count);
    // recruiter query
    $query1 = "SELECT * FROM company_data WHERE token = :token";
    $statement1 = $pdo->prepare($query1);
    $statement1->execute(
        array(
            'token' => $token
        )
    );

    $count1 = $statement1->rowCount();
    //echo($count1);
 if (isset($_POST['submit']) && $count > 0) { 
    if (strcmp($_POST['pass'], $_POST['rpass']) == 0) {
         $stmt = $pdo->prepare("UPDATE student_data SET password=:pass, token='' WHERE token= '$token'");
        
         $stmt->execute(array(
             ':pass' => md5($_POST['pass'])
            ));
            echo("HEELLLOO");
             header("Location: loginStudent.php");
             return;
        } else {
            echo("Error");
            $_SESSION['error1'] = "Passwords Did Not Match";
             header("Location: resetpass.php?token=".$token);
             return;
        }
            
     } 
   
else if(isset($_POST['submit']) && $count1 > 0){
    if (strcmp($_POST['pass'], $_POST['rpass']) == 0) {
            //echo($token);
            $stmt1 = $pdo->prepare("UPDATE company_data SET token='',password=:pass WHERE token='$token'");
            //echo($token);
            $stmt1->execute(array(
                ':pass' => md5($_POST['pass'])
            ));
            //echo($token);
             header("Location: loginRecruiter.php");
             return;
        } 
    else {
            $_SESSION['error1'] = "Passwords Did Not Match";
            header("Location: resetpass.php?token=".$token);
            return;
        }
     }

 ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Campus Recruitment | Reset Password</title>
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
             <form method="post" class="form sign-in">
                <h2>Password Reset</h2>
                <p>Enter a strong password.</p>
                <br />
                <?php
                if (isset($_SESSION['error'])) {
                    echo ("<center><span style='color:blue;'>" . htmlentities($_SESSION['error']) . "</span></center>\n");
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['msg1'])) {
                    echo ("<center><span style='color:blue;'>" . htmlentities($_SESSION['msg']) . "</span></center>\n");
                    unset($_SESSION['msg1']);
                }
                ?>
                <label>
                    <span>New Password</span>
                    <input id="pass" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input id="rpass" type="password" name="rpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </label>
                <br />

                <!-- RECAPTCHA ADD WHEN DOMAIN REGISTERED 
                    <div class="g-recaptcha" data-sitekey="WEBSITEKEYHERE" data-theme="light" data-size="normal" data-image="image"></div> 
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

                <br />
                <input name="submit" class="submit" type="submit" value="Reset my Password"></input>
            </form>
        </div>    
        
    </div>

        <script type="text/javascript" src="assets/js/script.js"></script>


</body>

</html>
             
       