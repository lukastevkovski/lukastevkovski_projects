<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Website.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $website = new Website($db);
    $website->cover_image_url = filter_var($_POST['coverImage'], FILTER_SANITIZE_URL);
    $website->main_title = filter_var($_POST['mainTitle'], FILTER_SANITIZE_STRING);
    $website->subtitle = filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
    $website->about = filter_var($_POST['about'], FILTER_SANITIZE_STRING);
    $website->phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $website->location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    $website->type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $website->service1_image_url = filter_var($_POST['service1Image'], FILTER_SANITIZE_URL);
    $website->service1_description = filter_var($_POST['service1Desc'], FILTER_SANITIZE_STRING);
    $website->service2_image_url = filter_var($_POST['service2Image'], FILTER_SANITIZE_URL);
    $website->service2_description = filter_var($_POST['service2Desc'], FILTER_SANITIZE_STRING);
    $website->service3_image_url = filter_var($_POST['service3Image'], FILTER_SANITIZE_URL);
    $website->service3_description = filter_var($_POST['service3Desc'], FILTER_SANITIZE_STRING);
    $website->company_description = filter_var($_POST['companyDesc'], FILTER_SANITIZE_STRING);
    $website->linkedin_url = filter_var($_POST['linkedin'], FILTER_SANITIZE_URL);
    $website->facebook_url = filter_var($_POST['facebook'], FILTER_SANITIZE_URL);
    $website->twitter_url = filter_var($_POST['twitter'], FILTER_SANITIZE_URL);
    $website->google_url = filter_var($_POST['google'], FILTER_SANITIZE_URL);

    if ($website->create()) {
        $lastId = $db->lastInsertId();
        header("Location: company.php?id=" . $lastId);
        exit();
    } else {
        echo "Error saving data. Please check your input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Builder Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="form-page">
    <h1>You are one step away from your webpage</h1>
    <form action="submit.php" method="POST">
        <div class="form-section left">
            <label for="coverImage">Cover Image URL</label>
            <input type="text" id="coverImage" name="coverImage" required>
            <label for="mainTitle">Main Title of Page</label>
            <input type="text" id="mainTitle" name="mainTitle" required>
            <label for="subtitle">Subtitle of Page</label>
            <input type="text" id="subtitle" name="subtitle" required>
            <label for="about">Something about you</label>
            <textarea id="about" name="about" required></textarea>
            <label for="phone">Your telephone number</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
            <label for="type">Do you provide services or products?</label>
            <select id="type" name="type" required>
                <option value="services">Services</option>
                <option value="products">Products</option>
            </select>
        </div>
        <div class="form-section middle">
            <h3>Provide url for an image and description of your service/product</h3>
            <label for="service1Image">Image URL 1</label>
            <input type="text" id="service1Image" name="service1Image" required>
            <label for="service1Desc">Description of service/product 1</label>
            <textarea id="service1Desc" name="service1Desc" required></textarea>
            <label for="service2Image">Image URL 2</label>
            <input type="text" id="service2Image" name="service2Image" required>
            <label for="service2Desc">Description of service/product 2</label>
            <textarea id="service2Desc" name="service2Desc" required></textarea>
            <label for="service3Image">Image URL 3</label>
            <input type="text" id="service3Image" name="service3Image" required>
            <label for="service3Desc">Description of service/product 3</label>
            <textarea id="service3Desc" name="service3Desc" required></textarea>
        </div>
        <div class="form-section right">
            <h3>Provide a description of your company, something people should be aware of before they contact you:</h3>
            <label for="companyDesc">Description</label>
            <textarea id="companyDesc" name="companyDesc" required></textarea>
            <label for="linkedin">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" required>
            <label for="facebook">Facebook</label>
            <input type="url" id="facebook" name="facebook" required>
            <label for="twitter">Twitter</label>
            <input type="url" id="twitter" name="twitter" required>
            <label for="google">Google+</label>
            <input type="url" id="google" name="google" required>
        </div>
        <button type="submit">Submit</button> 
    </form>
</body>
</html>