<?php
session_start();
require "mysql.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Akses ditolak!");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>☕17 COFFEE - Admin</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
    <div id="notif-area"></div>

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

    <h2 class="font">Tambah Menu Baru</h2>

    <div id="AdminAddForm">

        <form action="adminProcAdd.php" method="POST" enctype="multipart/form-data">

            <label>Nama Menu:</label>
            <input type="text" name="nama_menu" required placeholder="Menu yang ingin ditambahkan">

            <label>Harga:</label>
            <input type="number" name="harga" required placeholder="Harga menu">

            <label>Deskripsi:</label>
            <textarea name="deskripsi" required placeholder="Deskripsi menu"></textarea>

            <label>Kategori:</label>
            <select name="kategori">
                <option value="food">Food</option>
                <option value="drink">Drink</option>
            </select>

            <label>Foto Menu:</label>
            <input type="file" name="foto" required>

            <button type="submit">Tambah Menu</button>
        </form>

    </div>

    <script src="cart.js?v=<?= time() ?>"></script>
    <script>
        document.getElementById("navToggle").onclick = function () {
            document.getElementById("navLinks").classList.toggle("show-nav");
        };
    </script>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <script>
            showNotification("Menu berhasil ditambahkan!", "success");
        </script>
    <?php endif; ?>


</body>

</html>