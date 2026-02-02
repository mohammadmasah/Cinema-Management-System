<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movie Cinema</title>
</head>

<body>
    <main>
        <h1>🎬 Movie List</h1>

        <div id="movie-container">
            <?php include "../backend/libraries/database.php"; ?>
        </div>
        <div>
            <form action="../backend/libraries/add_movies.php" method="POST">
               
                <input type="text" name="title" id="form-title" placeholder="Movie Title" required>
                <input type="text" name="director" id="form-director" placeholder="Director" required>
                <input type="number" name="duration" id="form-duration" placeholder="Duration (min)" required>
                <input type="number" name="release_year" id="form-release-year" placeholder="Release Year" required>
                <button type="submit">Add Movie</button>
                <button type="button" id="cancel-btn" style="display:none;" onclick="resetForm()">Cancel</button>
                
            </form>
        </div>
    </main>

    <script src="JavaScript/script.js"></script>
</body>

</html>