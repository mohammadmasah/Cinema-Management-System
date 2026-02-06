<?php
require_once __DIR__ . "/../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movie_id = $_POST['movie_id'];
    $room_id = $_POST['room_id'];
    $start_time = $_POST['start_time'];

    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $checkSql = "SELECT id FROM screenings 
        WHERE room_id = ? 
        AND ABS(TIMESTAMPDIFF(MINUTE, start_time, ?)) < 120";

        $checkStmt = $db->prepare($checkSql);
        $checkStmt->execute([$room_id, $start_time]);

        if ($checkStmt->fetch()) {
            header("Location: ../../frontend/views/screening.php?error=collision");
            exit();
        }

        $sql = "INSERT INTO screenings (movie_id, room_id, start_time) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$movie_id, $room_id, $start_time]);

        header("Location: ../../frontend/views/screening.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
