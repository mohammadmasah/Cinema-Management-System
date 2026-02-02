<?php

require_once __DIR__ . "/../config/config.php";

$host = DB_HOST;
$databaseName = DB_NAME;
$username = DB_USER;
$password = DB_PASS;


//for viewe
$dsn = "mysql:host=$host;dbname=$databaseName;charset=utf8mb4";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM movies";
    $movies = $db->query($sql);


    foreach ($movies as $movie) {
        echo "<li class= 'movies-item'>";
        //echo "🆔 <strong>ID: </strong>" . $movie["id"] . "<br>";
        echo "🎬 <strong>Title:</strong> " . $movie["title"] . "<br>";
        echo "👤 <strong>Director:</strong> " . $movie["director"] . "<br>";
        echo "⏳ <strong>Duration:</strong> " . $movie["duration"] . " min<br>";
        echo "📅 <strong>Year:</strong> " . $movie["release_year"] . "<br>";

        echo "<button class='btn-delete' data-id='" . $movie["id"] . "'>Delete</button>";
    }
} catch (PDOException $error) {
    echo "Connection Error ❌: " . $error->getMessage();
}
?>
<link rel="stylesheet" href="/frontend/style.css">