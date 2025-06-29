<?php
require_once __DIR__ . '/../config/database.php';

class VehicleModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM vehicle_models ORDER BY model_name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($model_name) {
        $stmt = $this->pdo->prepare("INSERT INTO vehicle_models (model_name) VALUES (?)");
        return $stmt->execute([htmlspecialchars($model_name)]);
    }

    public function update($id, $model_name) {
        $stmt = $this->pdo->prepare("UPDATE vehicle_models SET model_name = ? WHERE id = ?");
        return $stmt->execute([htmlspecialchars($model_name), $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM vehicle_models WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM vehicle_models WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

