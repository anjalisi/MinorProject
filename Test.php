<?php
session_start();
require_once "connect.php";
include 'fileslogic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="myfile">
                <button type="submit" name="save">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>