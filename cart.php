<?php
session_start();
include 'mysql.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Keranjang kosong</h2>";
    exit;
}

echo "<h1>Keranjang Anda</h1>";

$total = 0;

foreach ($_SESSION['cart'] as $menu_id => $jumlah) {
    $result = $mysql->query("SELECT * FROM menu WHERE menu_id = $menu_id");
    $menu = $result->fetch_assoc();

    $subtotal = $menu['harga'] * $jumlah;
    $total += $subtotal;

    echo "
        <div>
            <h3>{$menu['nama_menu']}</h3>
            <p>Jumlah: $jumlah</p>
            <p>Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "</p>
        </div>
        <hr>
    ";
}

echo "<h2>Total: Rp " . number_format($total, 0, ',', '.') . "</h2>";
echo "<a href='checkout.php'><button>Checkout</button></a>";
?>
