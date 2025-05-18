<?php
session_start();

require_once 'validations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $formData = [
        'name' => $_POST['name'] ?? '',
        'surname' => $_POST['surname'] ?? '',
        'email' => $_POST['email'] ?? '',
        'username' => $_POST['username'] ?? '',
        'password' => $_POST['password'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'birthday' => $_POST['birthday'] ?? ''
    ];

   
    $errors = validateForm($formData);

    if (empty($errors)) {
        $_SESSION['success'] = true;
        header('Location: success.php');
        exit;
    } else {
        
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $formData;
        header('Location: index.php');
        exit;
    }
} else {
  
    header('Location: index.php');
    exit;
}