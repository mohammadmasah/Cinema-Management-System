<?php
require_once __DIR__ . "/../config/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM movies WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        header("Location: ../../frontend/views/index.php?deleted=1");
        exit();
    } catch (PDOException $e) {
        die("Error deleting movie: " . $e->getMessage());
    }
}
