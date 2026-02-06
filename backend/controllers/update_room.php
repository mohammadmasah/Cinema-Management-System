<?php
require_once __DIR__ . "/../config/config.php";

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
    $type = $_POST['type'];

    $sql = "UPDATE rooms SET name = ?, capacity = ?, type = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $capacity, $status, $id]);


    header("Location: ../../frontend/views/rooms.php?success=updated");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
