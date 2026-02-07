<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Admin Panel</title>
    <link rel="stylesheet" href="../../frontend/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="admin-body">

    <main class="dashboard-container">
        <header class="dashboard-header">
            <h1><i class="fas fa-user-shield"></i> Central Admin Panel</h1>
            <p>Welcome back! Monitor and manage your cinema operations here.</p>
        </header>

        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon movie-bg"><i class="fas fa-film"></i></div>
                <div class="stat-info">
                    <h3>Movies</h3>
                    <p>Manage movie archive</p>
                    <a href="../views/index.php" class="stat-link">Access Movies</a>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon room-bg"><i class="fas fa-door-open"></i></div>
                <div class="stat-info">
                    <h3>Halls</h3>
                    <p>Capacity & Type settings</p>
                    <a href="../views/rooms.php" class="stat-link">Manage Halls</a>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon schedule-bg"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <h3>Screenings</h3>
                    <p>Showtime scheduling</p>
                    <a href="../views/screening.php" class="stat-link">Manage Schedule</a>
                </div>
            </div>
        </section>


    </main>

</body>

</html>