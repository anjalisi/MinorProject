<?php
session_start();
require_once "connect.php";
if (isset($_POST['email'])) {
    $query = "SELECT * from student_data where email=:email AND token = :token";
    $statement = $pdo->prepare($query);
    $statement->execute(array(
        ':email' => $_POST['email'],
        ':token' => $_POST['token']
    ));
    $count = $statement->rowCount();
    if ($count > 0) {

        if (strcmp($_POST['passw'], $_POST['rpassw']) == 0) {
            $stmt = $pdo->prepare("UPDATE student_data SET password=:pass WHERE token='$token'");

            $stmt->execute(array(
                ':pass' => md5($_POST['passw'])
            ));
            header("Location: profile.php");
            return;
        } else if (strcmp($_POST['passw'], $_POST['rpassw']) != 0) {
            $_SESSION['error'] = "Passwords Did Not Match";
            header("Location: restpass.php");
            return;
        }
    } else {
        $query1 = "SELECT * FROM company_data WHERE company_email = :username AND token = :token";
        $statement = $pdo->prepare($query1);
        $statement->execute(
            array(
                'username' => $_POST["email"],
                'token' => $_POST["token"]
            )
        );

        if (strcmp($_POST['passw'], $_POST['rpassw']) == 0) {
            $stmt = $pdo->prepare("UPDATE company_data SET password=:pass WHERE token='$token'");

            $stmt->execute(array(
                ':pass' => md5($_POST['passw'])
            ));
            header("Location: profile.php");
            return;
        } else if (strcmp($_POST['passw'], $_POST['rpassw']) != 0) {
            $_SESSION['error'] = "Passwords Did Not Match";
            header("Location: restpass.php");
            return;
        }
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
            <div class="form sign-in">
                <h2>Password Reset</h2>
                <p>Enter a strong password.</p>
                <br />
                <label>
                    <span>New Password</span>
                    <input name="pass" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input name="rpass" type="password" name="rpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </label>
                <br />

                <!-- RECAPTCHA ADD WHEN DOMAIN REGISTERED 
                    <div class="g-recaptcha" data-sitekey="WEBSITEKEYHERE" data-theme="light" data-size="normal" data-image="image"></div> 
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

                <br />
                <a href="">
                    <button class="submit" type="button">Reset my Password</button>
                </a>
            </div>

        </div>

        <script type="text/javascript" src="assets/js/script.js"></script>


</body>

</html>