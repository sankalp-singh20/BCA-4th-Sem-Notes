<?php

$host = 'localhost';
$dbname = 'feedback';
$username = 'root';
$password = 'D@t@base123';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    comments TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

$name = $email = $comments = "";
$nameErr = $emailErr = $commentsErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["comments"])) {
        $commentsErr = "Comments are required";
    } else {
        $comments = test_input($_POST["comments"]);
        if (strlen($comments) < 10) {
            $commentsErr = "Comments must be at least 10 characters long";
        }
    }

    if (empty($nameErr) && empty($emailErr) && empty($commentsErr)) {
        $sql = "INSERT INTO feedback (name, email, comments) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $comments);

        if ($stmt->execute()) {
            $successMsg = "Thank you for your feedback!";

            $name = $email = $comments = "";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Feedback Form</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($successMsg)): ?>
                            <div class="alert alert-success">
                                <?php echo $successMsg; ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $name; ?>">
                                <span class="error"><?php echo $nameErr; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $email; ?>">
                                <span class="error"><?php echo $emailErr; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="comments" class="form-label">Comments:</label>
                                <textarea class="form-control" id="comments" name="comments"
                                    rows="5"><?php echo $comments; ?></textarea>
                                <span class="error"><?php echo $commentsErr; ?></span>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>