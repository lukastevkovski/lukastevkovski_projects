<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Registration.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$registration = new Registration($pdo);
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$registration->delete($id);
header('Location: dashboard.php');
exit;
?>

# vehicle_licensing/public/extend_registration.php
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
$error = '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$record = $registration->getById($id);

if (!$record || !Utility::getRowClass($record['registration_to'])) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registration_to = Utility::sanitize($_POST['registration_to']);
    if (!Utility::validateDate($registration_to)) {
        $error = 'Invalid date format.';
    } else {
        $registration->extend($id, $registration_to);
        header('Location: dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Extend Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Vehicle Licensing</a>
        <div class="ms-auto">
            <a href="dashboard.php" class="btn btn-outline-secondary me-2">Back to Dashboard</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Extend Registration</h2>
        <?php if ($error): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="registration_to" class="form-label">New Registration To Date</label>
                <input type="date" name="registration_to" id="registration_to" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Extend</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
