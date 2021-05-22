<?php
session_start();
require_once "connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $query = "SELECT * FROM admin_data WHERE email_id = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST["email"],
            'password' => $_POST["password"]
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $_SESSION["admin"] = $_POST["email"];
        header("Location:tnpcell/studentdata.php");
        return;
    } else {
        $_SESSION['error'] = "Invalid Username or Password";
        header("Location: loginAdmin.php");
        return;
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>IGDTUW Recruitment | TnP Login</title>
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
                    ?>
                    <p class="field-title">Email Address</p>
                    <div class="input-field">
                        <input name="email" type="email" required>
                    </div>
                    <p class="field-title">Password</p>
                    <div class="input-field">
                        <input name="password" type="password" required>
                    </div>
                    <br />
                    <div class="g-recaptcha" data-sitekey="6LcgN9YaAAAAAPrZX4J3_17CFdei3GvowPgd2EYk" style="text-align: -webkit-center; text-align: -moz-center; text-align: -o-center; text-align: -ms-center;"></div>
                    <br />
                    <input type="submit" value="Login" class="btn solid" />
                    
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Administrator Login</h3>
                    <p>
                        For members of the Training and Placement Cell of IGDTUW only. Kindly do not share these credentials with unauthorized users.
                    </p>
                </div>
            </div>
            
        </div>
    </div>

</body>    

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