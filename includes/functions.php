<?php

function isFormValid($data) {
    foreach ($data as $field) {
        if (empty(trim($field))) {
            return false;
        }
    }
    return true;
}

function createUserFolderAndFile($firstName, $lastName, $userName, $telephone, $password) {
    $userFolder = USERS_DIR . "/" . $firstName . "_" . $lastName;

    if (!is_dir($userFolder)) {
        mkdir($userFolder);
    }

    $userFile = $userFolder . "/" . $firstName . ".txt";
    $userData = implode(",", [$firstName, $lastName, $userName, $telephone, $password]);
    file_put_contents($userFile, $userData);
}

function saveUsername($userName) {
    file_put_contents(USERS_FILE, $userName . PHP_EOL, FILE_APPEND);
}
