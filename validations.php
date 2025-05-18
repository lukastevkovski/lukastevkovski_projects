<?php

function isRequired(string $value): bool {
    return trim($value) !== '';
}

function isValidUsername(string $username): bool {
    return preg_match('/^[a-zA-Z0-9_]+$/', $username);
}

function isValidEmail(string $email): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    $parts = explode('@', $email);
    return strlen($parts[0]) >= 5;
}

function isValidPassword(string $password): bool {
    return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password);
}

function isValidPhone(string $phone): bool {
    return preg_match('/^[0-9]+$/', $phone);
}

function isAdult(string $birthday): bool {
    $birthDate = DateTime::createFromFormat('Y-m-d', $birthday);
    if (!$birthDate) {
        return false;
    }
    
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    return $age >= 18;
}
function validateForm(array $data): array {
    $errors = [];

  
    if (!isRequired($data['name'])) {
        $errors['name'] = 'Name is required.';
    }


    if (!isRequired($data['surname'])) {
        $errors['surname'] = 'Surname is required.';
    }

    
    if (!isRequired($data['email'])) {
        $errors['email'] = 'Email is required.';
    } elseif (!isValidEmail($data['email'])) {
        $errors['email'] = 'Email must be valid and have at least 5 characters before @.';
    }


    if (!isRequired($data['username'])) {
        $errors['username'] = 'Username is required.';
    } elseif (!isValidUsername($data['username'])) {
        $errors['username'] = 'Username cannot contain spaces or special characters (except underscore).';
    }

   
    if (!isRequired($data['password'])) {
        $errors['password'] = 'Password is required.';
    } elseif (!isValidPassword($data['password'])) {
        $errors['password'] = 'Password must be at least 6 characters with 1 uppercase, 1 number, and 1 special character.';
    }


    if (!isRequired($data['phone'])) {
        $errors['phone'] = 'Phone number is required.';
    } elseif (!isValidPhone($data['phone'])) {
        $errors['phone'] = 'Phone number must contain only numbers.';
    }

    if (!isRequired($data['birthday'])) {
        $errors['birthday'] = 'Date of birth is required.';
    } elseif (!isAdult($data['birthday'])) {
        $errors['birthday'] = 'You must be at least 18 years old.';
    }

    return $errors;
}