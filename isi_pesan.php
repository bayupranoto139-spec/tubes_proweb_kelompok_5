<?php
require 'mysql.php';

$query = "SELECT * FROM contact";
$result = mysqli_query($mysql, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 Coffee - Contact</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
    <link rel="icon" type="image/png" href="foto/ico.png">
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <!-- HERO -->
    <div class="hero-header">
        <img src="foto/kafe.jpg" class="hero-img">
        <div class="hero-overlay"></div>

        <div class="hero-text">
            <h1>Makanan Favorit</h1>
            <p>Pilih menu makanan terbaik untuk temani harimu ✨</p>
        </div>
    </div>

    <!--Form Kontak-->
    <table id="tampilan">
        <thead>
            <tr class="atas">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="isi">
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['nomor_hp']; ?></td>
                    <td><?= $row['pesan']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    include 'footer.php';
    ?>

    <script src="cart.js?v=<?= time() ?>"></script>
    <script>
        document.getElementById("navToggle").onclick = function () {
            document.getElementById("navLinks").classList.toggle("show-nav");
        };
    </script>
</body>

</html>