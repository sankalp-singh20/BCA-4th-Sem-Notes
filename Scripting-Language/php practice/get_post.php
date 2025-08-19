<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="get_post.php" method="post">


        <!-- <label for="">User name</label><br>
        <input type="text" name="username"><br>
        <label for="">password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Log in"> -->
        <label>Item</label>
        <input type="text" name="item" id=""><br><br>
        <label for="">quantity</label>
        <input type="text" name="quantity" id=""><br>
        <input type="submit" value="total">
    </form>
</body>

</html>
<?php
// echo "{$_GET["username"]} <br>";
// echo "{$_GET["password"]} ";
$item = $_POST['item'];
$price = 5.88;
$quantity = $_POST['quantity'];
$total = $quantity * $price;
echo "you have ordered {$quantity} x {$item}/s <br>";
echo "your total is : \$_COOKIE{$total}";
?>