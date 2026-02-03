<?php
require_once __DIR__ . "/../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
    $type = $_POST['type'];

    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      
        $sql = "INSERT INTO rooms (name, capacity, type, active) VALUES (?, ?, ?, 1)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $capacity, $type]);


        header("Location: ../../frontend/views/rooms.php?success=1");
        exit();

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}