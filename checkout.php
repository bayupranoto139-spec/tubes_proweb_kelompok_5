<?php
session_start();
include 'mysql.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Keranjang kosong!");
}

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login sebelum checkout.");
}

$user_id = $_SESSION['user_id'];


// Buat order baru
$mysql->query("INSERT INTO orders (user_id, total_harga) VALUES ($user_id, 0)");
$order_id = $mysql->insert_id;

$total_harga = 0;

// Masukkan item ke order_items
foreach ($_SESSION['cart'] as $menu_id => $jumlah) {

    $result = $mysql->query("SELECT harga FROM menu WHERE menu_id = $menu_id");
    $harga = $result->fetch_assoc()['harga'];

    $subtotal = $harga * $jumlah;
    $total_harga += $subtotal;

    $mysql->query("
        INSERT INTO order_items (order_id, menu_id, jumlah, subtotal)
        VALUES ($order_id, $menu_id, $jumlah, $subtotal)
    ");
}

// Update total harga
$mysql->query("
    UPDATE orders SET total_harga = $total_harga WHERE order_id = $order_id
");

// Hapus keranjang
unset($_SESSION['cart']);

echo "OK";

?>