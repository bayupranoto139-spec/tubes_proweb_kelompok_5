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
    <title>☕17 COFFEE - Admin</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
    <div id="notif-area"></div>
    <div id="confirm-mini" style="display:none;"></div>


    <header>
        <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
        <div class="header-text">
            <h1>17 COFFEE</h1>
            <p>Choose Your Favourite Menu!</p>
        </div>
    </header>

    <nav id="main-nav">
        <button class="nav-toggle" id="navToggle">☰</button>
        <div class="nav-links" id="navLinks">
            <a href="adminHome.php">Home</a>
            <a href="adminAddMenu.php">Add Menu</a>
            <a href="isi_pesan.php">Feedback</a>
        </div>
    </nav>

    <h2 class="font">Daftar Menu</h2>


    <!--Menu Rekomendasi-->

    <section class="menu">
        <?php
        // Ambil data menu dari database
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $query = "SELECT * FROM menu";

        $result = mysqli_query($mysql, $query);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='item'>";
            echo "<img src='foto/" . $row['foto'] . "' alt='" . $row['nama_menu'] . "' class='coffee-img'/>";
            echo "<h2>" . $row['nama_menu'] . " - Rp" . number_format($row['harga'], 0, ',', '.') . "</h2>";
            echo "<p>" . $row['deskripsi'] . "</p><br><br>";
            echo "<div class='btn-group'>";
            echo '<button type="button" class="delete-btn" onclick="confirmDelete(' . $row['menu_id'] . ')">Hapus</button>';
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