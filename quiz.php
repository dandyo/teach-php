<?php
$name = 'Dandy Ojeda';
$yearOfBirth = 1990;

$age = $yearOfBirth - 2023;

$colors = ['red', 'blue', 'yellow'];

echo "My name is " . $name . "<br>";
echo "I'm " . abs($age) . " years old.<br>";
echo 'colors: ' . count($colors) . "<br>";

echo "<br>My favorite colors <br>";
foreach ($colors as $x => $val) {
    echo $x + 1 . ": $val <br>";
}
echo "<br> My favorite colors <br>";
for ($x = 0; $x < count($colors); $x++) {
    echo $x + 1 . ". $colors[$x] <br>";
}


function getSum($x, $y)
{
    echo "the sum is " . $x + $y . "<br>";
}

getSum(1, 2);
