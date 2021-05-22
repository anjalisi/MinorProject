<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=campus_recruitement', 'adminuser', 'adminuser');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
