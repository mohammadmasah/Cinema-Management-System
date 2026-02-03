<?php
require_once __DIR__ . "/../config/config.php";

try {

    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO movies (title, director, duration, release_year) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $title = $_POST['title'];
    $director = $_POST['director'];
    $duration = $_POST['duration'];
    $year = $_POST['release_year'];

    $stmt->execute([$title, $director, $duration, $year]);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
