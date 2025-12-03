<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$menu_id = $_POST['menu_id'];
$action = $_POST['action'];

if ($action == "plus") {
    $_SESSION['cart'][$menu_id]++;
} else if ($action == "minus") {
    if ($_SESSION['cart'][$menu_id] > 1) {
        $_SESSION['cart'][$menu_id]--;
    } else {
        unset($_SESSION['cart'][$menu_id]);
    }
} else if ($action == "delete") {
    unset($_SESSION['cart'][$menu_id]);
}

echo "OK";
?>