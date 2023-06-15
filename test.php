<?php

$x = 10;
$y = 2;

echo $x + $y . "<br>";

if ($x == 1) {
    echo "number is equal to 1";
} else if ($x == 2) {
    echo "x is equal to 2";
} else {
    echo "number is not equal to 1 or 2";
}

echo "<br>";

switch ($x) {
    case 1:
        echo "x is equal to 1";
        break;
    case 2:
        echo "x is equal to 2";
        break;
    case 3:
        echo "x is equal to 3";
        break;
    case 4:
        echo "x is equal to 4";
        break;
    default:
        echo "default";
}
