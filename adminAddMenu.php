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
    <title>☕17 COFFEE - Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header>
        <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
        <div class="header-text">
            <h1>17 COFFEE</h1>
            <p>Choose Your Favourite Menu!</p>
        </div>
    </header>

    <nav>
    <a href="adminHome.php">Home</a>
    <a href="adminAddMenu.php">Edit Menu</a>
    </nav>

<h2>Tambah Menu Baru</h2>

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


</body>
</html>
