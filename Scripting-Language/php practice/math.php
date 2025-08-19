<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="math.php" method="post">
        <!-- <label for="">x:</label>
        <input type="text" name="x" id=""><br><br>
        <label for="">y:</label>
        <input type="text" name="y" id="">
        <input type="submit" value="total"> -->

        <label for="">radius:</label>
        <input type="text" name="radius" id="">
        <button type="submit">calculate</button>
    </form>
</body>

</html>
<?php
// $x = $_POST['x'];
// $y = $_POST['y'];

// $total = null;
// $total = abs($x);
// $total = round($x);
// $total = floor($x);
// $total = ceil($x);
// $total = pow($x, $y);

// echo $total;


$radius = $_POST['radius'];
$circumference = null;
$area = null;
$volume = null;

$circumference = 2 * pi() * $radius;
$circumference = round($circumference, 2);


$area = pi() * pow($radius, 2);
$area = round($area, 2);

$volume = 4 / 3 * pi() * pow($radius, 3);
$volume = round($volume, 2);
echo "Circuference = {$circumference}cm <br>";
echo "area = {$area}cm^2 <br>";
echo "volume = {$volume}cm^3 <br>";

?>