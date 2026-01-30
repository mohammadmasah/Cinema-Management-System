<?php

require_once "../config/config.php";

$host = DB_HOST;
$databaseName = DB_NAME;
$username = DB_USER;
$password = DB_PASS;

$dsn = "mysql:host=$host;dbname=$databaseName;charset=utf8mb4";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection successful ✅<br>";

    $sql = "SELECT * FROM movies";
    $movies = $db->query($sql);

    echo "<ul>";
    foreach ($movies as $movie) {

        echo "<li>" . $movie["title"] . " - " . $movie["director"] . "</li>";
    }
    echo "</ul>";
} catch (PDOException $error) {
    echo "Erreur de connexion ❌: " . $error->getMessage();
}
