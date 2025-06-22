<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Website.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $website = new Website($db);
    $website->cover_image_url = $_POST['coverImage'];
    $website->main_title = $_POST['mainTitle'];
    $website->subtitle = $_POST['subtitle'];
    $website->about = $_POST['about'];
    $website->phone = $_POST['phone'];
    $website->location = $_POST['location'];
    $website->type = $_POST['type'];
    $website->service1_image_url = $_POST['service1Image'];
    $website->service1_description = $_POST['service1Desc'];
    $website->service2_image_url = $_POST['service2Image'];
    $website->service2_description = $_POST['service2Desc'];
    $website->service3_image_url = $_POST['service3Image'];
    $website->service3_description = $_POST['service3Desc'];
    $website->company_description = $_POST['companyDesc'];
    $website->linkedin_url = $_POST['linkedin'];
    $website->facebook_url = $_POST['facebook'];
    $website->twitter_url = $_POST['twitter'];
    $website->google_url = $_POST['google'];

    if ($website->create()) {
        $lastId = $db->lastInsertId();
        header("Location: company.php?id=" . $lastId);
        exit();
    } else {
        echo "Error saving data.";
    }
}
?>