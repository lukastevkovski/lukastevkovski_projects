<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Registration.php';
require_once '../classes/Utility.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$registration = new Registration($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'model_id' => Utility::sanitize($_POST['model_id']),
        'type_id' => Utility::sanitize($_POST['type_id']),
        'chassis_number' => Utility::sanitize($_POST['chassis_number']),
        'production_year' => Utility::sanitize($_POST['production_year']),
        'registration_number' => Utility::sanitize($_POST['registration_number']),
        'fuel_type_id' => Utility::sanitize($_POST['fuel_type_id']),
        'registration_to' => Utility::sanitize($_POST['registration_to'])
    ];

    if (!Utility::validateDate($data['production_year']) || !Utility::validateDate($data['registration_to'])) {
        $error = 'Invalid date format.';
    } else {
        try {
            $registration->create($data);
            header('Location: dashboard.php');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

if ($error): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-4">
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </body>
    </html>
<?php endif; ?>
