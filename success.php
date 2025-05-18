<?php
session_start();


if (empty($_SESSION['success'])) {
    header('Location: index.php');
    exit;
}


unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .success { color: green; font-size: 1.2em; }
    </style>
</head>
<body>
    <h1 class="success">Registration Successful!</h1>
    <p>Thank you for registering.</p>
    <p><a href="index.php">Return to form</a></p>
</body>
</html>