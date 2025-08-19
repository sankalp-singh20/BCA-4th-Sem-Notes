<?php
include 'config.php';

// Create (Add) Operation
if (isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $age = $conn->real_escape_string($_POST['age']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);

    $sql = "INSERT INTO students (name, age, email, course) VALUES ('$name', '$age', '$email', '$course')";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update Operation
if (isset($_POST['update'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $age = $conn->real_escape_string($_POST['age']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);

    $sql = "UPDATE students SET name='$name', age='$age', email='$email', course='$course' WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete Operation
if (isset($_GET['delete'])) {
    $id = $conn->real_escape_string($_GET['delete']);

    $sql = "DELETE FROM students WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>