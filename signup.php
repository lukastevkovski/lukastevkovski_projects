<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $file = 'users.txt';
    $userExists = false;
    $emailExists = false;

    if (!empty($email) && !empty($username) && !empty($_POST['password'])) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            list($existingEmail, $rest) = explode(',', $line);
            list($existingUsername) = explode('=', $rest);

            if ($existingUsername === $username) {
                $userExists = true;
            }
            if ($existingEmail === $email) {
                $emailExists = true;
            }
        }

        if ($userExists) {
            $message = "<p style='color: red;'>Username taken</p>";
        } elseif ($emailExists) {
            $message = "<p style='color: yellow;'>A user with this email already exists</p>";
        } else {
            file_put_contents($file, "$email,$username=$password\n", FILE_APPEND);
            header("Location: welcome.php?username=" . urlencode($username));
            exit();
        }
    } else {
        $message = "<p style='color: red;'>Please fill all fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign up form</h2>
    <?= $message ?>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
