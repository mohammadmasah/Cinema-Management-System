<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movie Halls</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
     <nav class="main-nav">
        <ul class="nav-links">
            <li><a href="../views/home.php">home</a></li>
            <li><a href="../views/index.php">Movie List</a></li>
            <li><a href="../views/rooms.php" class="active">Halls</a></li>
            <li><a href="../views/screening.php">Screening</a></li>
        </ul>

    </nav>
    <main>
        <h1>🏛️ Movie Halls</h1>
        <section class="add-room-section">

            <h2> Add New Hall</h2>
            <form id="room-form" action="../../backend/controllers/add_rooms.php" method="POST">
                <input type="hidden" name="id" id="form-room-id">

                <input type="text" name="name" id="form-room-name" placeholder="Hall Name" required>
                <input type="number" name="capacity" id="form-room-capacity" placeholder="Capacity" required>

                <select name="type" id="form-room-type">
                    <option value="Standard">Standard</option>
                    <option value="3D">3D</option>
                    <option value="IMAX">IMAX</option>
                    <option value="4DX">4DX</option>
                </select>

                <button type="submit" id="submit-btn-room">Create Hall</button>
            </form>
        </section>
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

                        | Status: <span style="color: green;">Active</span>

                        <button class="btn-edit"
                            data-id="<?= $room['id'] ?>"
                            data-name="<?= htmlspecialchars($room['name']) ?>"
                            data-capacity="<?= $room['capacity'] ?>"
                            data-type="<?= htmlspecialchars($room['type'] ?? 'Standard') ?>"
                            onclick="editRoom(this)">
                            Edit
                        </button>
                        <button class="btn-delete-room" data-id="<?php echo $room['id']; ?>">Deactivate</button>
                    </li>
            <?php endforeach;
            endif; ?>
        </ul>



        <hr>
    </main>

    <script src="../JavaScript/script.js"></script>
</body>

</html>