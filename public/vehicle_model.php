<?php
session_start();
require_once '../config/database.php';
require_once '../classes/VehicleModel.php';
require_once '../classes/Utility.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$vehicleModel = new VehicleModel($pdo);
$models = $vehicleModel->getAll();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model_name = Utility::sanitize($_POST['model_name']);
    if (!empty($model_name)) {
        try {
            $vehicleModel->create($model_name);
            header('Location: vehicle_model.php');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    } else {
        $error = 'Model name is required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Vehicle Models</title>
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
        <h2>Manage Vehicle Models</h2>
        <?php if ($error): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="model_name" class="form-label">Model Name</label>
                <input type="text" name="model_name" id="model_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Model</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Model Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                    <tr>
                        <td><?= htmlspecialchars($model['model_name']) ?></td>
                        <td>
                            <a href="edit_model.php?id=<?= $model['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete_model.php?id=<?= $model['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</a>
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

