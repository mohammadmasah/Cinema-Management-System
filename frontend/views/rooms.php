<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movie Halls</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    
    <main>
        <h1>🏛️ Movie Halls</h1>
        <ul id="rooms-container">
            <?php
            require_once "../../backend/controllers/rooms.php";
            $rooms = getActiveRooms();

            if (empty($rooms)): ?>
                <p>No active halls found.</p>
                <?php else:
                foreach ($rooms as $room): ?>
                    <li class="room-item">
                        <strong><?php echo htmlspecialchars($room['name']); ?></strong>
                        (Capacity: <?php echo $room['capacity']; ?>)

                        | Type: <span><?php echo htmlspecialchars($room['type'] ?? 'Standard'); ?></span>

                        | Status: <span style="color: green;">🟢Active</span>

                        <button class="btn-delete-room" data-id="<?php echo $room['id']; ?>">Deactivate</button>
                    </li>
            <?php endforeach;
            endif; ?>
        </ul>
        <section class="add-room-section">
            <h2>➕ Add New Hall</h2>
            <form action="../../backend/controllers/add_rooms.php" method="POST">
                <input type="text" name="name" placeholder="Hall Name (e.g. IMAX)" required>
                <input type="number" name="capacity" placeholder="Capacity" required>
                <select name="type">
                    <option value="Standard">Salles</option>
                    <option value="3D">3D</option>
                    <option value="IMAX">IMAX</option>
                    <option value="4DX">4DX</option>
                </select>
                <button type="submit" class="btn-add">Create Hall</button>
            </form>
        </section>
        <hr>
    </main>

    <script src="../../frontend/JavaScript/script.js"></script>
</body>

</html>