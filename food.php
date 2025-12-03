<?php
include 'mysql.php';
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 COFFEE - Food</title>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
    <link rel="icon" type="image/png" href="foto/ico.png">
</head>

<body>

<!-- NOTIFICATION -->
<div id="notif-area"></div>

<!-- CART ICON -->
<div class="cart-icon" id="cart-toggle">🛒</div>

  <!-- PANEL CART -->
  <div id="cart-panel">

    <span id="close-cart">✖</span>

    <div id="cart-content">
      <h2 class="test">Keranjang</h2>
      <div id="cart-container">
        Memuat...
      </div>
    </div>
  </div>

<nav class="lux-nav">
    <h2>17 COFFEE</h2>

    <div class="nav-right">
        <a href="home.php">🏠</a>
        <a href="food.php">🍽️</a>
        <a href="drink.php">🥤</a>
        <a href="contact.php">✉️</a>
    </div>
</nav>


<div class="hero-header">
    <img src="foto/kafe.jpg" class="hero-img">
    <div class="hero-overlay"></div>

    <div class="hero-text">
        <h1>Makanan Favorit</h1>
        <p>Pilih menu makanan terbaik untuk temani harimu ✨</p>
    </div>
</div>


<!-- MENU SECTION -->
<section class="menu-grid">

<?php  
$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = ($search !== "")
    ? "SELECT * FROM menu WHERE kategori='food' AND nama_menu LIKE '%$search%'"
    : "SELECT * FROM menu WHERE kategori='food'";

$result = mysqli_query($mysql, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<p class='no-result'>Menu tidak ditemukan</p>";
}

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="menu-card">
        <img src="foto/<?= $row['foto'] ?>" class="menu-img">

        <h3><?= $row['nama_menu'] ?></h3>
        <p class="menu-price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>

        <p class="menu-desc"><?= $row['deskripsi'] ?></p>

        <div class="menu-action">
            <button class="order" data-id="<?= $row['menu_id'] ?>">Pesan</button>

            <div class="qty-box">
                <button class="plus" data-id="<?= $row['menu_id'] ?>">+</button>
                <span class="zero" id="qty-<?= $row['menu_id'] ?>">0</span>
                <button class="minus" data-id="<?= $row['menu_id'] ?>">-</button>
            </div>
        </div>
    </div>
<?php } ?>

</section>

<!-- FOOTER -->
<footer class="footer-lux">
    <p>© 2025 17 COFFEE - Food Menu</p>
</footer>


<script src="cart.js?v=<?= time() ?>"></script>
  <script>
    document.getElementById("navToggle").onclick = function () {
      document.getElementById("navLinks").classList.toggle("show-nav");
    };
  </script>

</body>
</html>
