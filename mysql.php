<?php

$mysql = mysqli_connect("localhost", "root", "", "cafe");

if (!$mysql) {
    echo "Keneksi Gagal: " . mysqli_connect_error();
}