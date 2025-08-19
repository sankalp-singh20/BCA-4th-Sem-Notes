<?php
$foods = array('apple', 'orange', 'grapes');

array_push($foods, "watermelon");
// array_pop($foods);//last gone
// array_shift($foods); //first gone
foreach ($foods as $index => $food) {
    echo $food . "<br>";

}


//associative array => An array made of key=>value pairs
$capitals = array(
    "nepal" => "kathmandu",
    "japan" => "kyoto"
);
foreach ($capitals as $key => $value) {
    echo "{$key} = {$value} <br>";
}
?>