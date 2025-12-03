<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$menu_id = $_POST['menu_id'];
$jumlah = $_POST['jumlah'];

// Tambah atau update jumlah
if (isset($_SESSION['cart'][$menu_id])) {
    $_SESSION['cart'][$menu_id] += $jumlah;
} else {
    $_SESSION['cart'][$menu_id] = $jumlah;
}

echo "Ok";
?>