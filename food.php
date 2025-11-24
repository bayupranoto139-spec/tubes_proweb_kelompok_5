<?php
include 'mysql.php';
?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>☕17 Coffee - Food</title>
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
  <header>
    <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
    <div class="header-text">
      <h1>17 Coffee</h1>
      <p>Choose Your Favourite Menu!</p>
    </div>
  </header>

  <!--Navigasi-->

  <nav>
    <a href="home.php">Home</a>
    <a href="drink.php">Drink</a>
    <a href="food.php">Food</a>
    <a href="contact.php">Contact</a>

  </nav>
  <h2 class="font">Pesan Makanan Favoritmu</h2>

<!-- ICON CART -->
<div class="cart-icon" id="cart-toggle">🛒</div>

<!-- PANEL CART -->
<div id="cart-panel">
    
    <span id="close-cart">✖</span>

    <div id="cart-content">
        <h2>Keranjang</h2>
        <div id="cart-container">
            Memuat...
        </div>
    </div>
</div>


  <!--Menu Makanan-->

  <section class="menu">
    <?php
    // Ambil data menu dari database
    $query = "SELECT * FROM menu WHERE kategori = 'food' LIMIT 50";
    $result = mysqli_query($mysql, $query);


    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item'>";
      echo "<img src='foto/" . $row['foto'] . "' alt='" . $row['nama_menu'] . "' class='coffee-img'/>";
      echo "<h2>" . $row['nama_menu'] . " - Rp" . number_format($row['harga'], 0, ',', '.') . "</h2>";
      echo "<p>" . $row['deskripsi'] . "</p><br><br>";
      echo "<div class='btn-group'>";
      echo "<button class='order' data-id='" . $row['menu_id'] . "'>Pesan</button>";
      echo "<div class='btn'>";
      echo "<button class='plus' data-id='" . $row['menu_id'] . "'>+</button>";
      echo '<span id="qty-' . $row['menu_id'] . '">0</span>';
      echo "<button class='minus' data-id='" . $row['menu_id'] . "'>-</button>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </section>

  <!--Footer-->

  <footer class="font">
    <p> © Copyright by kelompok 5 2025</p>
  </footer>

  <script src="cart.js"></script>

</body>

</html>