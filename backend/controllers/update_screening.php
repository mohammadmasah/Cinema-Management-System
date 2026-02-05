<?php
require_once __DIR__ . "/../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id = $_POST['id'];
        $movie_id = $_POST['movie_id'];
        $room_id = $_POST['room_id'];
        $start_time = $_POST['start_time'];


        $sql = "UPDATE screenings SET movie_id = ?, room_id = ?, start_time = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$movie_id, $room_id, $start_time, $id]);


        header("Location: ../../frontend/views/screening.php?status=updated");
        exit();
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
