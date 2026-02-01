<?php

require_once __DIR__ . "/../config/config.php";

$host = DB_HOST;
$databaseName = DB_NAME;
$username = DB_USER;
$password = DB_PASS;

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $id = $_GET['id'];
    $sql = "DELETE FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

    echo "Record deleted successfully ✅";
} catch (PDOException $e) {
    echo "Error deleting record: " . $e->getMessage();
}

$conn = null;
