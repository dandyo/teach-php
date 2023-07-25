<?php
require_once('db.php');

session_start();

//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    $product = $_POST;

    $itemArray = array($product["id"] => array(
        'id' => $product['id'],
        'name' => $product['name'],
        'image' => $product['image'],
        'size' => $product['size'],
        'price' => $product['price'],
        'qty' => $product['qty']
    ));

    $msg = '';
    $inarray = false;

    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $k => $v) {
            if ($product['id'] == $v['id']) {
                if ($product['size'] == $v['size']) {
                    $inarray = true;
                    $msg = 'in array';
                    $_SESSION["cart"][$k]["qty"] += $_POST["qty"];
                }
            }
        }

        if ($inarray == false) {
            $_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
            $msg = 'array_merge';
        }
    } else {
        $msg = 'else';
        $_SESSION["cart"] = $itemArray;
    }

    http_response_code(200);
    echo json_encode(['msg' => $msg]);
}


if ($_SERVER["REQUEST_METHOD"] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    unset($_SESSION["cart"][$_DELETE["id"]]);
    $msg = 'deleted';

    http_response_code(200);
    echo json_encode(['msg' => $msg]);
}
