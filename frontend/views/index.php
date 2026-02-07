<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/style.css">
    <title>Movie Cinema</title>
</head>

<body>

    <nav class="main-nav">
        <ul class="nav-links">
            <li><a href="../views/home.php">home</a></li>
            <li><a href="../views/index.php" class="active">Movie List</a></li>
            <li><a href="../views/rooms.php">Halls</a></li>
            <li><a href="../views/screening.php">Screening</a></li>
        </ul>

    </nav>
    <main>
        <h1> Movie List</h1>
        <div id="movie-container">
            <?php include "../../backend/libraries/delete_movies.php"; ?>
        </div>
        <div>
            <form action="../../backend/libraries/add_movies.php" method="POST" id="movie-form">
                <input type="hidden" name="id" id="form-movie-id">
                <input type="text" name="title" id="form-title" placeholder="Movie Title" required>
                <input type="text" name="director" id="form-director" placeholder="Director" required>
                <input type="number" name="duration" id="form-duration" placeholder="Duration (min)" required>
                <input type="number" name="release_year" id="form-release-year" placeholder="Release Year" required>
                <button type="submit">Add Movie</button>
            </form>
        </div>
        <div id="movie-container">
            <?php
            require_once "../../backend/controllers/movies.php";
            $movies = getAllMovies();
            ?>
            <?php
            foreach ($movies as $movie) {
                $id       = $movie['id'];
                $title    = htmlspecialchars($movie['title']);
                $director = htmlspecialchars($movie['director']);
                $duration = $movie['duration'];
                $year     = $movie['release_year'];
                echo "
                <li class='movie-item'>
                    <div class='movie-info'>
                        <strong>🎬 $title</strong>
                        <span>($year)</span>
                    </div>

                    <div class='movie-actions'>

                        <button class='btn-update' data-id='$id' data-title='$title' data-director='$director 'data-duration='$duration' data-year='$year' onclick='editMovie(this)'>Edit</button>

                        <a href='../../backend/libraries/delete_movies.php?id=$id'class='btn-delete-link'>

                            <button type='button' class='btn-delete'>Delete</button>
                        </a>
                    </div>
                </li>";
            }
            ?>
        </div>
    </main>

    <script src="../JavaScript/script.js"></script>
</body>

</html>