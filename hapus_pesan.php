<?php
require 'mysql.php'; // koneksi database

if (!isset($_GET['id'])) {
    die("ID pesanan tidak ditemukan!");
}

$orderId = (int) $_GET['id'];

// Hapus item pesanan terlebih dahulu (karena foreign key)
mysqli_query($mysql, "DELETE FROM order_items WHERE order_id = $orderId");

// Hapus order utama
mysqli_query($mysql, "DELETE FROM orders WHERE order_id = $orderId");

// Balik ke halaman pesanan
echo "Ok";
exit;
?>