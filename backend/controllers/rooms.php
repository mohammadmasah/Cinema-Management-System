<?php
require_once __DIR__ . "/../config/config.php";

function getActiveRooms()
{

    if (!defined('DB_HOST')) {
        require_once __DIR__ . "/../config/config.php";
    }

    try {

        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM rooms WHERE active = 'Active'";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {

        error_log($error->getMessage());
        return [];
    }
}
