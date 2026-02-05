<?php
require_once __DIR__ . "/../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['screening_id'])) {
    $id = $_POST['screening_id'];

    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM screenings WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);


        header("Location: ../../frontend/views/screening.php?deleted=1");
        exit();
    } catch (PDOException $e) {
        die("Error deleting screening: " . $e->getMessage());
    }
}
