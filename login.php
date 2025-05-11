<?php
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $file = 'users.txt';
    $found = false;

    if (!empty($username) && !empty($password)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            list($email, $rest) = explode(',', $line);
            list($existingUsername, $hashedPassword) = explode('=', $rest);

            if ($existingUsername === $username && password_verify($password, $hashedPassword)) {
                $found = true;
                break;
            }
        }

        if ($found) {
            header("Location: welcome.php?username=" . urlencode($username));
            exit();
        } else {
            $error = "<p style='color: red;'>Wrong username/password combination</p>";
        }
    } else {
        $error = "<p style='color: red;'>Please fill all fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login form</h2>
    <?= $error ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
