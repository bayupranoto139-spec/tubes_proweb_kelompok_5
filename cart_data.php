<?php
session_start();
include 'mysql.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Keranjang masih kosong</p>";
    exit;
}

$total = 0;

foreach ($_SESSION['cart'] as $menu_id => $jumlah) {

    $result = $mysql->query("SELECT * FROM menu WHERE menu_id = $menu_id");
    $menu = $result->fetch_assoc();

    $subtotal = $menu['harga'] * $jumlah;
    $total += $subtotal;

    echo "
        <div class='cart-item'>
            <h3>{$menu['nama_menu']}</h3>
            <p>Harga: Rp " . number_format($menu['harga'], 0, ',', '.') . "</p>

            <div class='cart-controls'>
                <button class='cart-minus' data-id='{$menu_id}'>-</button>
                <span class='cart-qty' id='cart-qty-{$menu_id}'>{$jumlah}</span>
                <button class='cart-plus' data-id='{$menu_id}'>+</button>
                <button class='cart-delete' data-id='{$menu_id}'>Hapus</button>
            </div>

            <p>Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "</p>
        </div>
    ";
}

echo "<h2>Total: Rp " . number_format($total, 0, ',', '.') . "</h2>";
echo '<button class="checkout-btn" onclick="checkoutNow()">Checkout</button>';
?>