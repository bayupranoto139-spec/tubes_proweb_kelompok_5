<?php
session_start();
require "mysql.php";

// hanya admin yang boleh
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Akses ditolak!");
}

// ambil id menu
$id = $_GET["id"];

// ambil foto dulu agar bisa dihapus dari folder
$getFoto = $mysql->query("SELECT foto FROM menu WHERE menu_id = $id");
$foto = $getFoto->fetch_assoc();

if ($foto && file_exists("foto/" . $foto["foto"])) {
    unlink("foto/" . $foto["foto"]); // hapus file foto
}

// hapus menu dari database
$mysql->query("DELETE FROM menu WHERE menu_id = $id");

echo "Ok";
