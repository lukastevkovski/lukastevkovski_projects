<?php
session_start();

$formData = $_SESSION['form_data'] ?? [];
$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['form_data']);
unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        form { width: 400px; margin: 40px auto; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-bottom: 5px; box-sizing: border-box; }
        button { background: #4CAF50; color: white; padding: 20px 40px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        
    </style>
</head>
<body>

<form method="post" action="process.php">
    <h2>Register</h2>
    
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($formData['name'] ?? '') ?>">
    <div class="error"><?= $errors['name'] ?? '' ?></div>

    <label>Surname</label>
    <input type="text" name="surname" value="<?= htmlspecialchars($formData['surname'] ?? '') ?>">
    <div class="error"><?= $errors['surname'] ?? '' ?></div>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($formData['email'] ?? '') ?>">
    <div class="error"><?= $errors['email'] ?? '' ?></div>

    <label>Username</label>
    <input type="text" name="username" value="<?= htmlspecialchars($formData['username'] ?? '') ?>">
    <div class="error"><?= $errors['username'] ?? '' ?></div>

    <label>Password</label>
    <input type="password" name="password">
    <div class="error"><?= $errors['password'] ?? '' ?></div>

    <label>Phone Number</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($formData['phone'] ?? '') ?>">
    <div class="error"><?= $errors['phone'] ?? '' ?></div>

    <label>Date of Birth</label>
    <input type="date" name="birthday" value="<?= htmlspecialchars($formData['birthday'] ?? '') ?>">
    <div class="error"><?= $errors['birthday'] ?? '' ?></div>

    <button type="submit">Submit</button>
</form>

</body>
</html>