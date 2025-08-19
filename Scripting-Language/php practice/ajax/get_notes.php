<?php
$host = 'localhost';
$dbname = 'notes_db';
$username = 'root';
$password = 'D@t@base123';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-2">';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . htmlspecialchars($row['note']) . '</p>';
        echo '<small class="text-muted">' . $row['created_at'] . '</small>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">No notes found</p>';
}

$conn->close();
?>