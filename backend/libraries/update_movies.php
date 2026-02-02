<?php

require_once __DIR__ . "/../config/config.php";

$host = DB_HOST;
$databaseName = DB_NAME;
$username = DB_USER;
$password = DB_PASS;

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $duration = $_POST['duration'];
    $year = $_POST['release_year'];

    $sql = "UPDATE movies SET title = ?, director = ?, duration = ?, release_year = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([$title, $director, $duration, $year, $id]);


    echo "Movie updated successfully! 🎬";

    header("Location: ../../frontend/index.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
