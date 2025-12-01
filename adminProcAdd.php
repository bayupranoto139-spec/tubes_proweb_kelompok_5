<?php
session_start();
require "mysql.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Akses ditolak!");
}

// ambil data dari form
$nama_menu = $_POST["nama_menu"];
$harga = $_POST["harga"];
$deskripsi = $_POST["deskripsi"];
$kategori = $_POST["kategori"];

// proses upload foto
$foto = $_FILES["foto"]["name"];
$tmp = $_FILES["foto"]["tmp_name"];
$folder = "foto/" . $foto;

move_uploaded_file($tmp, $folder);

$query = "INSERT INTO menu (nama_menu, harga, deskripsi, kategori, foto)
          VALUES ('$nama_menu', '$harga', '$deskripsi', '$kategori', '$foto')";

if ($mysql->query($query)) {
   echo "<script>window.location='adminAddMenu.php?status=success';</script>";
exit;
}
?>
