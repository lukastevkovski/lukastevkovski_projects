<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $userName = trim($_POST['userName']);
    $telephoneNumber = trim($_POST['telephoneNumber']);
    $password = trim($_POST['password']);

    $formData = [$firstName, $lastName, $userName, $telephoneNumber, $password];

    if (!isFormValid($formData)) {
        echo "All fields are required.";
        exit;
    }

    if (!is_dir(USERS_DIR)) {
        mkdir(USERS_DIR);
    }

    saveUsername($userName);
    createUserFolderAndFile($firstName, $lastName, $userName, $telephoneNumber, $password);

    echo "<p>Welcome to our page!</p>";
}
