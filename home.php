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
  <title>☕17 COFFEE - Home</title>
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
  <div id="notif-area"></div>

  <!--Navigasi-->

  <?php
  include 'navbar.php';
  ?>
  
  <h2 class="font">Rekomendasi Menu Untukmu</h2>

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

  <!--Menu Rekomendasi-->

  <section class="menu">
    <?php
    // Ambil data menu dari database
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if ($search !== '') {
      $query = "SELECT * FROM menu 
              WHERE rekomendasi = 'yes' 
              AND nama_menu LIKE '%$search%'";
    } else {
      $query = "SELECT * FROM menu WHERE rekomendasi = 'yes'";
    }

    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 0) {
    echo "<p class='no-result'>Menu tidak ditemukan.</p>";
}


    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item'>";
      echo "<img src='foto/" . $row['foto'] . "' alt='" . $row['nama_menu'] . "' class='coffee-img'/>";
      echo "<h2>" . $row['nama_menu'] . " - Rp" . number_format($row['harga'], 0, ',', '.') . "</h2>";
      echo "<p>" . $row['deskripsi'] . "</p><br><br>";
      echo "<div class='btn-group'>";
      echo "<button class='order' data-id='" . $row['menu_id'] . "'>Pesan</button>";
      echo "<div class='btn'>";
      echo "<button class='plus' data-id='" . $row['menu_id'] . "'>+</button>";
      echo '<span class="zero" id="qty-' . $row['menu_id'] . '">0</span>';
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

  <script src="cart.js?v=<?= time() ?>"></script>
  <script>
document.getElementById("navToggle").onclick = function () {
    document.getElementById("navLinks").classList.toggle("show-nav");
};
</script>


</body>

</html>