<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $full_name = $_POST['f_name'];
    $email = $_POST['email'];
    $username = $_POST['u_name'];
    $password = $_POST['password'];

    $errors = [];

    if (strlen($full_name) > 40) {
        $errors[] = "full name must not exceed 40 length";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    } else if (!preg_match("/^[a-zA-Z]+\d+$/", $username)) {
        $errors[] = "username must start with a string followed by a number";
    } else if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 character long";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'> $error</p>";
        }
    }
    $conn = new mysqli('localhost', 'root', 'D@t@base123', "validation");
    if ($conn->connect_error) {
        die("connection failed");
    }
    $sql = "INSERT INTO registration(full_name,email,username,password) VALUES ('$full_name','$email','$username','$password')";
    if ($conn->query($sql)) {
        echo "registration successfully";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form validation</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="f_name">full name</label>
        <input type="text" name="f_name" placeholder="enter your full name" maxlength="40" required><br><br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="enter your email"><br><br>
        <label for="u_name">User Name</label>
        <input type="text" name="u_name" placeholder="enter your user name" required><br><br>
        <label for="password">password</label>
        <input type="password" name="password" placeholder="enter your password"><br><br>
        <button type="submit">Submit form</button>

    </form>
</body>

</html>