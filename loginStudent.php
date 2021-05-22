<?php
session_start();
require_once "connect.php";
if (isset($_POST['stu_name']) && isset($_POST['stu_email']) && isset($_POST['signup_stu'])) {
    unset($_SESSION['email']);
    $sql_u = "select * from student_data where email=:email or enroll_no=:enroll_no";
    $stmt1 = $pdo->prepare($sql_u);
    $stmt1->execute(array(
        ':email' => $_POST['stu_email'],
        ':enroll_no' => $_POST['enrol']
    ));
    $count = $stmt1->rowCount();
    if ($count > 0) {
        $_SESSION['error'] = "Seems Like the User Already Exists";
        header("Location: loginStudent.php");
        return;
    } else {
        $token = bin2hex(random_bytes(15));
        $sql = "INSERT INTO student_data(name, email, password, enroll_no, status, token)
	 values(:name,:email,:password, :enroll_no, 'Open', :token)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['stu_name'],
            ':email' => $_POST['stu_email'],
            ':password' => md5($_POST['stu_pass']),
            ':enroll_no' => $_POST['enrol'],
            ':token' => $token,
        ));
        
        $_SESSION['email'] = $_POST['stu_email'];
        
        $name = $_POST['stu_name'];
        $email = $_POST['stu_email'];
        $subject = "Email verification";
        $body =  "Hi, $name.\n 
        Click here to verify your account igdtuwrecruits.in/student/noticeboard.php?token=$token";
        $sender_email = "From: igdtuwrecruits@gmail.com";
        if (mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "Check your mail to verify your account. This might take a few minutes.";
	}
	
        header("Location:loginStudent.php");
        return;
    }
}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $query = "SELECT * FROM student_data WHERE email = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST["email"],
            'password' => md5($_POST["pass"])
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $_SESSION["email"] = $_POST["email"];
        header("Location:student/noticeboard.php");
        return;
    } else {
        $_SESSION['error'] = "Invalid Username or Password";
        header("Location: loginStudent.php");
        return;
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>IGDTUW Recruitment | Student Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
</head>

<body>
    <!-- Header -->
    <header id="header" class="alt">
        <nav id="nav">
            <ul>
                <li><a href="index.html" class="primary">Home</a></li>                    
                <li><a href="loginRecruiter.php" class="primary">Login as Recruiter</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" class="sign-in-form">
                        
                <h2 class="title">Sign in</h2>
                <?php
                if (isset($_SESSION['error'])) {
                    echo ("<p style='color:red;'>" . htmlentities($_SESSION['error']) . "</p>\n");
                    unset($_SESSION['error']);
                }
                
                if (isset($_SESSION['msg'])) {
                    echo ("<p style='color:red;'>" . htmlentities($_SESSION['msg']) . "</p>\n");
                    unset($_SESSION['msg']);
                }
                ?>
                <p class="field-title">Email Address</p>
                <div class="input-field">
                    <input name="email" type="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@igdtuw.ac.in" title="Use college mail id" placeholder="@igdtuw.ac.in" required>
                </div>
                <p class="field-title">Password</p>
                <div class="input-field">
                    <input name="pass" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
                <br />
                <div class="g-recaptcha" data-sitekey="6LcgN9YaAAAAAPrZX4J3_17CFdei3GvowPgd2EYk" style="text-align: -webkit-center; text-align: -moz-center; text-align: -o-center; text-align: -ms-center;"></div>
                <br />
                <input type="submit" value="Login" class="btn solid" />
                <p><a href="forgotpass_stu.php">Forgot Password?</a></p>
                
            </form>

            

            <form method="post" class="sign-up-form">
                
                <h2 class="title">Sign up</h2>
                <?php
                if (isset($_SESSION['error'])) {
                    echo ("<p style='color:red;'>" . htmlentities($_SESSION['error']) . "</p>\n");
                    unset($_SESSION['error']);
                }
                ?>
                 <p class="field-title">Full Name</p>
                        <div class="input-field">
                            <input name="stu_name" type="text" required>
                        </div>
                        <p class="field-title">Email</p>
                        <div class="input-field">
                            <input name="stu_email" type="email" placeholder="@igdtuw.ac.in" pattern="^[a-zA-Z0-9._%+-]+@igdtuw.ac.in" required>
                        </div>
                        <p class="field-title">Enrollment Number</p>
                        <div class="input-field">
                            <input name="enrol" type="text" pattern="^[0-9]{11}$" maxlength="11" title="Enter Correct Roll Number" required>
                        </div>
                        <p class="field-title">Password</p>
                        <div class="input-field">
                            <input name="stu_pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <input name="signup_stu" type="submit" class="btn" value="Sign up" />          
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ?</h3>
                        <p>
                            Sign up using your University email id and never miss out on placement opportunities!
                        </p>
                        <br />
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                </div>
                
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>
                            If you already have an account, sign in to your dashboard. All the best on your recruitment journey!
                        </p>
                        <br />
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                </div>
            </div>
        </div>




</body>
    
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

</html>