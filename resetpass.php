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
if($count==0 && $count1==0){
    header("Location: 404.shtml");
    return;
}
 if (isset($_POST['submit']) && $count > 0) { 
    if (strcmp($_POST['pass'], $_POST['rpass']) == 0) {
         $stmt = $pdo->prepare("UPDATE student_data SET password=:pass, token='' WHERE token= '$token'");
        
         $stmt->execute(array(
             ':pass' => md5($_POST['pass'])
            ));
             header("Location: loginStudent.php");
             return;
        } else {
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
    <title>IGDTUW Recruitment | Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
</head>

<body>
    <!-- Header -->
    <header id="header" class="alt">
        <nav id="nav">
            <ul>
                <li><a href="index.html" class="primary">Home</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" class="sign-in-form">
                    
                    <h2 class="title">Reset Password</h2>
                    <p class="field-title">Enter a strong password.</p>
                    <?php
                    if (isset($_SESSION['error1'])) {
                        echo ("<p style='color:red;'>" . htmlentities($_SESSION['error1']) . "</p>\n");
                        unset($_SESSION['error1']);
                    }
                    if (isset($_SESSION['msg1'])) {
                        echo ("<p style='color:red;'>" . htmlentities($_SESSION['msg']) . "</p>\n");
                        unset($_SESSION['msg1']);
                    }
                    ?>
                    <p class="field-title">New Password</p>
                    <div class="input-field">   
                        <input id="pass" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div> 
                    <p class="field-title">Confirm Password</p>
                    <div class="input-field">
                        <input id="rpass" type="password" name="rpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    <br />
                    <div class="g-recaptcha" data-sitekey="6LcgN9YaAAAAAPrZX4J3_17CFdei3GvowPgd2EYk" style="text-align: -webkit-center; text-align: -moz-center; text-align: -o-center; text-align: -ms-center;"></div>
                    <br />
                    <input name="submit" class="btn solid submit" type="submit" value="Reset Password"></input>
                </form>
            </div>    
        
        </div>

    </div>

        <script type="text/javascript" src="assets/js/script.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            window.onload = function() {
                var $recaptcha = document.querySelector('#g-recaptcha-response');
            
                if($recaptcha) {
                    $recaptcha.setAttribute("required", "required");
                }
            };
        </script>


</body>

</html>