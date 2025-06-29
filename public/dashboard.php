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

$search = isset($_GET['search']) ? Utility::sanitize($_GET['search']) : '';
$registrations = $registration->getAll($search);
$models = $vehicleModel->getAll();
$types = $pdo->query("SELECT * FROM vehicle_types")->fetchAll(PDO::FETCH_ASSOC);
$fuels = $pdo->query("SELECT * FROM fuel_types")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Vehicle Licensing</a>
        <div class="ms-auto">
            <a href="vehicle_model.php" class="btn btn-outline-secondary me-2">Manage Models</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Register Vehicle</h2>
        <form method="POST" action="save_registration.php" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="model_id" class="form-label">Vehicle Model</label>
                <select name="model_id" id="model_id" class="form-control" required>
                    <option value="">Select Model</option>
                    <?php foreach ($models as $model): ?>
                        <option value="<?= $model['id'] ?>"><?= htmlspecialchars($model['model_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Vehicle Type</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    <option value="">Select Type</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['type_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="chassis_number" class="form-label">Chassis Number</label>
                <input type="text" name="chassis_number" id="chassis_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="production_year" class="form-label">Production Year</label>
                <input type="date" name="production_year" id="production_year" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="registration_number" class="form-label">Registration Number</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fuel_type_id" class="form-label">Fuel Type</label>
                <select name="fuel_type_id" id="fuel_type_id" class="form-control" required>
                    <option value="">Select Fuel Type</option>
                    <?php foreach ($fuels as $fuel): ?>
                        <option value="<?= $fuel['id'] ?>"><?= htmlspecialchars($fuel['fuel_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="registration_to" class="form-label">Registration To</label>
                <input type="date" name="registration_to" id="registration_to" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <h2 class="mt-5">Licensed Vehicles</h2>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by model, plate, or chassis" value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Chassis</th>
                    <th>Year</th>
                    <th>Plate</th>
                    <th>Fuel</th>
                    <th>Reg. To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $reg): ?>
                    <tr class="<?= Utility::getRowClass($reg['registration_to']) ?>">
                        <td><?= htmlspecialchars($reg['model_name']) ?></td>
                        <td><?= htmlspecialchars($reg['type_name']) ?></td>
                        <td><?= htmlspecialchars($reg['chassis_number']) ?></td>
                        <td><?= htmlspecialchars($reg['production_year']) ?></td>
                        <td><?= htmlspecialchars($reg['registration_number']) ?></td>
                        <td><?= htmlspecialchars($reg['fuel_name']) ?></td>
                        <td><?= htmlspecialchars($reg['registration_to']) ?></td>
                        <td>
                            <a href="edit_registration.php?id=<?= $reg['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete_registration.php?id=<?= $reg['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</a>
                            <?php if (Utility::getRowClass($reg['registration_to'])): ?>
                                <a href="extend_registration.php?id=<?= $reg['id'] ?>" class="btn btn-sm btn-warning">Extend</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

