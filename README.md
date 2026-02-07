# 🎬 CineLuxe Admin Dashboard
![Uploading Screenshot 2026-02-07 at 23.00.10.png…]()

## A Feature-Rich Cinema Management System 🚀


![Dashboard Screenshot]<img width="1080" height="1080" alt="photo-collage png" src="https://github.com/user-attachments/assets/b20deab3-92e0-4b90-8a38-101952f4274b" />
*(Replace this with an actual screenshot of your dashboard)*

CineLuxe Admin Dashboard is a modern, intuitive, and luxury web application designed for seamless management of cinema operations. Built with PHP for the backend and a modern CSS/JavaScript frontend, it provides cinema administrators with powerful tools to handle movies, screening schedules, and cinema halls efficiently.

---

## ✨ Features

-   **Luxury UI/UX:** A sleek, cinematic dark theme with modern CSS (Grid, Flexbox, Glassmorphism effects).
-   **Movie Management (CRUD):**
    -   Add new movies with details like title, director, duration, and release year.
    -   Edit existing movie information.
    -   Delete movies from the archive.
-   **Hall Management (CRUD & Soft Delete):**
    -   Create and manage cinema halls (rooms) with name, capacity, and type (Standard, 3D, IMAX, 4DX).
    -   "Soft Delete" functionality to deactivate halls instead of permanent removal.
-   **Screening Schedule Management (CRUD):**
    -   Schedule movie screenings by selecting a movie, a hall, and a start time.
    -   Edit and delete scheduled screenings.
-   **Central Admin Dashboard:** An at-a-glance overview with quick access to key management areas.
-   **Responsive Design:** Optimized for various screen sizes, from desktop to mobile.
-   **Secure Backend:** Utilizes PHP with PDO for secure database interactions and prevention of SQL injection.

---

## 🛠️ Technologies Used

-   **Backend:** PHP (Native) with PDO for MySQL database connectivity.
-   **Database:** MySQL
-   **Frontend:** HTML5, CSS3 (Custom Styling, Grid, Flexbox), JavaScript (Vanilla JS for dynamic interactions).
-   **Version Control:** Git & GitHub
-   **Icons:** Font Awesome

---

## 🚀 Installation & Setup Guide

Follow these steps to get the CineLuxe Admin Dashboard up and running on your local machine.

### Prerequisites

-   A web server with PHP support (e.g., Apache, Nginx).
-   MySQL database server.
-   Composer (for PHP dependency management, though not strictly required for this project if you don't have external libraries).

### Step-by-Step Installation

1.  **Clone the Repository:**
    ```bash
    git clone git@github.com:mohammadmasah/Cinema-Management-System.git
    cd Cinema-Management-System
    ```

2.  **Database Setup:**
    -   Create a new MySQL database (e.g., `my_cinema_db`).
    -   Import the provided SQL schema (if any) into your database.
        *(If you don't have an `.sql` file, you might need to manually create tables for `movies`, `rooms`, and `screenings`.)*
    
    _Example Table Structure (You might need to adjust based on your schema):_
    
    **`movies` table:**
    ```sql
    CREATE TABLE movies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        director VARCHAR(255) NOT NULL,
        duration INT NOT NULL, -- in minutes
        release_year INT NOT NULL
    );
    ```

    **`rooms` table:**
    ```sql
    CREATE TABLE rooms (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        capacity INT NOT NULL,
        type VARCHAR(50) DEFAULT 'Standard',
        status ENUM('active', 'inactive') DEFAULT 'active' -- For soft delete
    );
    ```

    **`screenings` table:**
    ```sql
    CREATE TABLE screenings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        movie_id INT NOT NULL,
        room_id INT NOT NULL,
        start_time DATETIME NOT NULL,
        FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
        FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
    );
    ```

3.  **Configure Database Connection:**
    -   Navigate to the `backend/config` directory.
    -   Open `config.php` and update the database credentials:
        ```php
        <?php
        define('DB_HOST', 'localhost'); // Your database host
        define('DB_NAME', 'my_cinema_db'); // The name of your database
        define('DB_USER', 'root'); // Your database username
        define('DB_PASS', 'your_password'); // Your database password
        ?>
        ```
    -   **Important:** Make sure `config.php` is listed in your `.gitignore` file to prevent sensitive information from being pushed to GitHub.

4.  **Place Project on Web Server:**
    -   Move the entire `Cinema-Management-System` folder into your web server's document root (e.g., `htdocs` for XAMPP, `www` for WAMP, or `/var/www/html` for LAMP).

5.  **Access the Application:**
    -   Open your web browser and navigate to:
        `http://localhost/Cinema-Management-System/frontend/views/home.php`
        (Adjust the path based on where you placed the project).

---

## 🤝 Contributing

Contributions are welcome! If you have suggestions for improvements or new features, please feel free to open an issue or submit a pull request.

---

## 📜 License

This project is open-sourced under the MIT License.

---
