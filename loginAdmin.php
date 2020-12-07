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
        header("Location:tnpcell/registrations.html");
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
    <title>Campus Recruitment | TnP Login</title>
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
                <h2>TnP Student Login</h2>
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" placeholder="@igdtuw.ac.in" required>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label>
                <input value="Sign In" class="submit" type="submit"></input>

                <p class="forgot-pass">Forgot Password ?</p>
            </form>

        </div>

        <script type="text/javascript" src="assets/js/script.js"></script>

</body>

</html>