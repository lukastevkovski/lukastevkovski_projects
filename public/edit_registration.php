<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Registration.php';
require_once '../classes/VehicleModel.php';
require_once '../classes/Utility.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$registration = new Registration($pdo);
$vehicleModel = new VehicleModel($pdo);
$error = '';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$record = $registration->getById($id);
if (!$record) {
    header('Location: dashboard.php');
    exit;
}

$models = $vehicleModel->getAll();
$types = $pdo->query("SELECT * FROM vehicle_types")->fetchAll(PDO::FETCH_ASSOC);
$fuels = $pdo->query("SELECT * FROM fuel_types")->fetchAll(PDO::FETCH_ASSOC);

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
            $registration->update($id, $data);
            header('Location: dashboard.php');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Registration</title>
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
        <h2>Edit Registration</h2>
        <?php if ($error): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="model_id" class="form-label">Vehicle Model</label>
                <select name="model_id" id="model_id" class="form-control" required>
                    <option value="">Select Model</option>
                    <?php foreach ($models as $model): ?>
                        <option value="<?= $model['id'] ?>" <?= $model['id'] == $record['model_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($model['model_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Vehicle Type</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    <option value="">Select Type</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['id'] ?>" <?= $type['id'] == $record['type_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($type['type_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="chassis_number" class="form-label">Chassis Number</label>
                <input type="text" name="chassis_number" id="chassis_number" class="form-control" value="<?= htmlspecialchars($record['chassis_number']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="production_year" class="form-label">Production Year</label>
                <input type="date" name="production_year" id="production_year" class="form-control" value="<?= htmlspecialchars($record['production_year']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="registration_number" class="form-label">Registration Number</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="<?= htmlspecialchars($record['registration_number']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fuel_type_id" class="form-label">Fuel Type</label>
                <select name="fuel_type_id" id="fuel_type_id" class="form-control" required>
                    <option value="">Select Fuel Type</option>
                    <?php foreach ($fuels as $fuel): ?>
                        <option value="<?= $fuel['id'] ?>" <?= $fuel['id'] == $record['fuel_type_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($fuel['fuel_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="registration_to" class="form-label">Registration To</label>
                <input type="date" name="registration_to" id="registration_to" class="form-control" value="<?= htmlspecialchars($record['registration_to']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

