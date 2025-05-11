<?php
$username = htmlspecialchars($_GET['username'] ?? 'Guest');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?= $username ?></h1>
</body>
</html>
