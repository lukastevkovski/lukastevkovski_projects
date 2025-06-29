<?php
require_once __DIR__ . '/../config/database.php';

class Registration {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByRegistrationNumber($regNumber) {
        $stmt = $this->pdo->prepare("
            SELECT r.*, vm.model_name, vt.type_name, ft.fuel_name
            FROM registrations r
            JOIN vehicle_models vm ON r.model_id = vm.id
            JOIN vehicle_types vt ON r.type_id = vt.id
            JOIN fuel_types ft ON r.fuel_type_id = ft.id
            WHERE r.registration_number = ?
        ");
        $stmt->execute([htmlspecialchars($regNumber)]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($search = '') {
        $query = "
            SELECT r.*, vm.model_name, vt.type_name, ft.fuel_name
            FROM registrations r
            JOIN vehicle_models vm ON r.model_id = vm.id
            JOIN vehicle_types vt ON r.type_id = vt.id
            JOIN fuel_types ft ON r.fuel_type_id = ft.id
        ";
        if ($search) {
            $query .= " WHERE vm.model_name LIKE ? OR r.registration_number LIKE ? OR r.chassis_number LIKE ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(["%$search%", "%$search%", "%$search%"]);
        } else {
            $stmt = $this->pdo->query($query);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM registrations WHERE chassis_number = ?");
        $stmt->execute([$data['chassis_number']]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Chassis number already exists.");
        }

        $stmt = $this->pdo->prepare("
            INSERT INTO registrations (model_id, type_id, chassis_number, production_year, registration_number, fuel_type_id, registration_to)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['model_id'], $data['type_id'], htmlspecialchars($data['chassis_number']),
            $data['production_year'], htmlspecialchars($data['registration_number']),
            $data['fuel_type_id'], $data['registration_to']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM registrations WHERE chassis_number = ? AND id != ?");
        $stmt->execute([$data['chassis_number'], $id]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Chassis number already exists.");
        }

        $stmt = $this->pdo->prepare("
            UPDATE registrations
            SET model_id = ?, type_id = ?, chassis_number = ?, production_year = ?, registration_number = ?, fuel_type_id = ?, registration_to = ?
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['model_id'], $data['type_id'], htmlspecialchars($data['chassis_number']),
            $data['production_year'], htmlspecialchars($data['registration_number']),
            $data['fuel_type_id'], $data['registration_to'], $id
        ]);
    }

    public function extend($id, $registration_to) {
        $stmt = $this->pdo->prepare("UPDATE registrations SET registration_to = ? WHERE id = ?");
        return $stmt->execute([$registration_to, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM registrations WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("
            SELECT r.*, vm.model_name, vt.type_name, ft.fuel_name
            FROM registrations r
            JOIN vehicle_models vm ON r.model_id = vm.id
            JOIN vehicle_types vt ON r.type_id = vt.id
            JOIN fuel_types ft ON r.fuel_type_id = ft.id
            WHERE r.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>


