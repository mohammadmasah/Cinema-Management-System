<?php

require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/controllers/screening.php";
require_once __DIR__ . "/controllers/movies.php";
require_once __DIR__ . "/controllers/rooms.php";


header('Content-Type: application/json');


$action = $_GET['action'] ?? '';

try {
    $response = [];

    switch ($action) {
        case 'screenings':
            $response = getAllScreenings();
            break;

        case 'movies':
            $page = $_GET['page'] ?? 1;
            $limit = 5;
            $offset = ($page - 1) * $limit;
            $response = getMoviesPaginated($limit, $offset);
            break;

        case 'rooms':
            $response = getActiveRooms();
            break;

        default:
            $response = ["error" => "Action not found"];
            break;
    }


    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
