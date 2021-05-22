<?php
session_start();
require_once "connect.php";
if (isset($_POST['email'])) {
    $query = "SELECT * FROM student_data WHERE email = :username AND enroll_no = :roll";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST["email"],
            'roll' => $_POST["roll"]
        )
    );
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows)) {
        $email = htmlentities($_POST['email']);
        $stmt = $pdo->query("SELECT * FROM student_data where email='$email'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = htmlentities($row['Name']);
            $email = htmlentities($row['email']);
            $token = bin2hex(random_bytes(15));

            $stmt12 = $pdo->prepare("UPDATE student_data SET token=:token WHERE email='$email'");

            $stmt12->execute(
                array(
                    ':token' => $token
                )
            );

            $subject = "Password Reset";
            $body =  "Hi, $name.\n 
            Click here to reset your password igdtuwrecruits.in/resetpass.php?token=$token";
            $sender_email = "From: igdtuwrecruits@gmail.com";
            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "Check your mail to reset your password. This might take a few minutes.";
            }
        }
    } else {
        $_SESSION['error'] = "User does not exist";
        header("Location: forgotpass_stu.php");
        return;
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>IGDTUW Recruitment | Forgot Password</title>
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
                    
                <h2 class="title">Forgot Password?</h2>
                <br />
                <?php
                if (isset($_SESSION['error'])) {
                    echo ("<p style='color: red;'>" . htmlentities($_SESSION['error']) . "</p>\n");
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['msg'])) {
                    echo ("<p style='color:red;'>" . htmlentities($_SESSION['msg']) . "</p>\n");
                    unset($_SESSION['msg']);
                }
                ?>
                <p class="field-title">Email Address</p>
                <div class="input-field">
                    <input name="email" type="email" required>
                </div>
                <p class="field-title">Enrollment Number</p>
                <div class="input-field">
                    <input type="text" name="roll" required>
                </div>
                <input type="submit" value="Send Email" class="btn solid" />
                    
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <p>
                        Enter your email address and enrollment number and click on the link in the email to reset your password.
                    </p>
                </div>
            </div>
            
        </div>
    </div>   

</body>
    
    <script type="text/javascript" src="assets/js/script.js"></script>
</html>