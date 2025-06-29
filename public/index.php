<?php
require_once '../config/database.php';
require_once '../classes/Registration.php';
require_once '../classes/Utility.php';

$db = new Database();
$pdo = $db->getConnection();
$registration = new Registration($pdo);
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['registration_number'])) {
    $regNumber = Utility::sanitize($_POST['registration_number']);
    $result = $registration->getByRegistrationNumber($regNumber);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Licensing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Vehicle Licensing</a>
        <div class="ms-auto">
            <a href="login.php" class="btn btn-outline-primary">Login</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Check Vehicle License</h2>
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="registration_number" class="form-control" placeholder="Enter license plate number" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <?php if ($result): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Chassis Number</th>
                            <th>Production Year</th>
                            <th>Registration Number</th>
                            <th>Fuel Type</th>
                            <th>Registration To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($result['model_name']) ?></td>
                            <td><?= htmlspecialchars($result['type_name']) ?></td>
                            <td><?= htmlspecialchars($result['chassis_number']) ?></td>
                            <td><?= htmlspecialchars($result['production_year']) ?></td>
                            <td><?= htmlspecialchars($result['registration_number']) ?></td>
                            <td><?= htmlspecialchars($result['fuel_name']) ?></td>
                            <td><?= htmlspecialchars($result['registration_to']) ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="error-message">No record found for the provided license plate number.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
