CREATE DATABASE vehicle_licensing;
USE vehicle_licensing;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE vehicle_models (
    id INT PRIMARY KEY AUTO_INCREMENT,
    model_name VARCHAR(100) NOT NULL
);

CREATE TABLE vehicle_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type_name VARCHAR(50) NOT NULL
);

CREATE TABLE fuel_types (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fuel_name VARCHAR(50) NOT NULL
);

CREATE TABLE registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    model_id INT NOT NULL,
    type_id INT NOT NULL,
    chassis_number VARCHAR(50) UNIQUE NOT NULL,
    production_year DATE NOT NULL,
    registration_number VARCHAR(20) NOT NULL,
    fuel_type_id INT NOT NULL,
    registration_to DATE NOT NULL,
    FOREIGN KEY (model_id) REFERENCES vehicle_models(id),
    FOREIGN KEY (type_id) REFERENCES vehicle_types(id),
    FOREIGN KEY (fuel_type_id) REFERENCES fuel_types(id)
);

INSERT INTO vehicle_types (type_name) VALUES ('sedan'), ('coupe'), ('hatchback'), ('suv'), ('minivan');
INSERT INTO fuel_types (fuel_name) VALUES ('gasoline'), ('diesel'), ('electric');
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$z6yT5x9z8y0x7w6v5u4t3e2r1q0p9o8i7u6y5t4r3e2w1q0p9o8i7'); -- Password: admin123
