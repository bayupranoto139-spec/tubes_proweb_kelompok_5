<?php
include 'mysql.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>☕17 coffee - Home</title>
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
  <h2 class="font">Rekomendasi Menu Untukmu</h2>

  <!--Menu Rekomendasi-->

  <section class="menu">
    <?php
    // Ambil data menu dari database
    $query = "SELECT * FROM menu LIMIT 50";
    $result = mysqli_query($mysql, $query);


    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item'>";
      echo "<img src='foto/" . $row['foto'] . "' alt='" . $row['nama_menu'] . "' class='coffee-img'/>";
      echo "<h3>" . $row['nama_menu'] . " - Rp" . number_format($row['harga'], 0, ',', '.') . "</h3>";
      echo "<p>" . $row['deskripsi'] . "</p><br><br>";
      echo "<div class='btn-group'>";
      echo "<button class='plus' data-id='" . $row['menu_id'] . "'>+</button>";
      echo "<button class='minus' data-id='" . $row['menu_id'] . "'>-</button>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </section>

  <section class="form-section">
    <h2>Form Pemesanan</h2>
    <form id="orderForm">
      <input type="text" id="nama" placeholder="Nama Pemesan" required>
      <input type="text" id="alamat" placeholder="Alamat Pengiriman" required>
      <input type="text" id="nohp" placeholder="Nomor HP" required>
      <p>Total: Rp0</p>
      <button type="submit">Kirim Pesanan</button>
    </form>
  </section>

  <!--Footer-->

  <footer class="font">
    <p> © Copyright by kelompok 5 2025</p>
  </footer>

</body>

</html>