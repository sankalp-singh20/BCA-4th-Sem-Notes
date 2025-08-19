<?php
$host = 'localhost';
$dbname = 'notes_db';
$username = 'root';
$password = 'D@t@base123';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS notes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    note TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($sql);

if (isset($_POST['note']) && !empty($_POST['note'])) {
    $note = $conn->real_escape_string($_POST['note']);
    $sql = "INSERT INTO notes (note) VALUES ('$note')";

    if ($conn->query($sql)) {
        echo "Note saved successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>