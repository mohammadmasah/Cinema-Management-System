<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/screening.php";

function getAllScreenings()
{
    try {

        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT screenings.*, 
               movies.title AS movie_title, 
               movies.duration AS movie_duration, 
               rooms.name AS room_name, 
               rooms.type AS room_type,
               screenings.movie_id, 
               screenings.room_id  
        FROM screenings
        JOIN movies ON screenings.movie_id = movies.id
        JOIN rooms ON screenings.room_id = rooms.id";

        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        return [];
    }
}
