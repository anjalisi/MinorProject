<?php
session_start();
require_once "connect.php";
if (isset($_POST['comp_name']) && isset($_POST['comp_email']) && isset($_POST['signup_comp'])) {
    unset($_SESSION['username']);

    $sql_u = "select * from company_data where company_email=:email";
    $stmt1 = $pdo->prepare($sql_u);
    $stmt1->execute(array(
        ':email' => $_POST['comp_email']
    ));
    $count = $stmt1->rowCount();
    if ($count > 0) {
        $_SESSION['error'] = "Seems Like the User Already Exists";
        header("Location: loginRecruiter.php");
        return;
    } else {
        $sql = "INSERT INTO company_data(company_name, company_email, password, hr_name, id, test_date, interview_date, deadline_date)
     values(:name,:email,:pass, :hr,:id, curdate(), curdate(), curdate())";

        $str = rand();
        $vkey = md5($str);
        $id = rand(1000, 999999);

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

if (isset($_POST['email']) && isset($_POST['password'])) {
    $query = "SELECT * FROM company_data WHERE company_email = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST["email"],
            'password' => md5($_POST["password"])
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $_SESSION["username"] = $_POST["email"];
        header("Location:recruiter/applications.php");
        return;
    } else {
        $_SESSION['error'] = "Invalid Username or Password";
        header("Location: loginRecruiter.php");
        return;
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>IGDTUW Recruitment | Recruiter Login</title>
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
                <li><a href="loginStudent.php" class="primary">Login as Student</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" class="sign-in-form">
                    
                    <h2 class="title">Recruiter Login</h2>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo ("<p style='color:red;'>" . htmlentities($_SESSION['error']) . "</p>\n");
                        unset($_SESSION['error']);
                    }
                    ?>

                    <p class="field-title">Email Address</p>
                    <div class="input-field">
                        <input type="email" name="email" required>
                    </div>
                    <p class="field-title">Password</p>
                    <div class="input-field">
                        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    <br />
                    <div class="g-recaptcha" data-sitekey="6LcgN9YaAAAAAPrZX4J3_17CFdei3GvowPgd2EYk" style="text-align: -webkit-center; text-align: -moz-center; text-align: -o-center; text-align: -ms-center;"></div>
                    <br />                    
                    <input type="submit" value="Login" class="btn solid" class="signin_comp"/>
                    <p><a href="forgotpass_rec.php">Forgot Password?</a></p>
                    
                </form>
                
                <form method="post" class="sign-up-form">
                    
                    <h2 class="title">Sign up</h2>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo ("<p>" . htmlentities($_SESSION['error']) . "</p>\n");
                        unset($_SESSION['error']);
                    }
                    ?>
                    <p class="field-title">Company Name</p>
                    <div class="input-field">
                        <input type="text" pattern="^[a-zA-Z ][a-zA-Z0-9-_. ]*$" name="comp_name" required>
                    </div>
                    <p class="field-title">Email</p>
                    <div class="input-field">
                        <input type="email" name="comp_email" required>
                    </div>
                    <p class="field-title">Representative Name</p>
                    <div class="input-field">
                        <input type="text" name="hr_name" required>
                    </div>
                    <p class="field-title">Password</p>
                    <div class="input-field">
                        <input type="password" name="comp_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    <input name="signup_comp" type="submit" class="btn" value="Sign up" />          
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Sign up and meet with the brilliant minds on campus. Happy recruiting!
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
                        If you already have an account, sign in to your dashboard. We've missed you!
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

    <script src="assets/js/script.js"></script>
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