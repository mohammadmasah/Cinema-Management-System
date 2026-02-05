<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cinema Screenings</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
   
    <main>
        <div class="form-container">
            <h2 id="form-title">Add Screening</h2>
            <form id="screening-form" action="../../backend/controllers/add_screening.php" method="POST">
                <input type="hidden" name="id" id="form-screening-id">

                <div class="form-group">
                    <label>Movie:</label>
                    <select name="movie_id" id="form-movie-id" required>
                        <?php
                        require_once "../../backend/controllers/movies.php";
                        foreach (getMovies() as $movie) {
                            echo "<option value='{$movie['id']}'>{$movie['title']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hall:</label>
                    <select name="room_id" id="form-room-id" required>
                        <?php
                        require_once "../../backend/controllers/rooms.php";
                        foreach (getActiveRooms() as $room) {
                            echo "<option value='{$room['id']}'>{$room['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Time:</label>
                    <input type="datetime-local" name="start_time" id="form-start-time" required>
                </div>

                <button type="submit" id="submit-btn" class="btn-primary">Save</button>
                <button type="button" id="cancel-btn" style="display:none" onclick="resetForm()">Cancel</button>
            </form>
        </div>

        <hr>

        <h1>Upcoming Screenings</h1>
        <div class="screenings-list">
            <?php
            $apiUrl = "http://localhost/W-WEB-102-PAR-1-1-my_cinema-26/backend/index.php?action=screenings";
            $screenings = json_decode(@file_get_contents($apiUrl), true);

            if (!empty($screenings) && !isset($screenings['error'])):
                foreach ($screenings as $s): ?>
                    <div class="screening-card">
                        <p><strong>🎬 <?= htmlspecialchars($s['movie_title']) ?></strong></p>
                        <p><?= htmlspecialchars($s['room_name']) ?></p>
                        <p><?= $s['start_time'] ?></p>

                        <div class="actions">
                            <form action="../../backend/controllers/delete_screening.php" method="POST" style="display:inline;">
                                <input type="hidden" name="screening_id" value="<?= $s['id'] ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Delete?')">Delete</button>
                            </form>

                            <button class="btn-edit"
                                type="button"
                                data-id="<?= $s['id'] ?>"
                                data-movie="<?= $s['movie_id'] ?>"
                                data-room="<?= $s['room_id'] ?>"
                                data-time="<?= date('Y-m-d\TH:i', strtotime($s['start_time'])) ?>"
                                onclick="editScreening(this)">Edit</button>
                        </div>
                    </div>
                <?php endforeach;
            else: ?>
                <p>No screenings found.</p>
            <?php endif; ?>
        </div>
    </main>
    <script src="../JavaScript/script.js"></script>
</body>

</html>