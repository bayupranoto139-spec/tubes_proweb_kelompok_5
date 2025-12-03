<?php
require 'mysql.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO contact (nama, email, nomor_hp, pesan) VALUES ('$nama', '$email', '$nomor_hp', '$pesan')";
    $result = mysqli_query($mysql, $query);

    if (!$result) {
        $error = "Error: " . mysqli_error($mysql);
    } else {
        $success = "Pesan berhasil terkirim! Terima kasih telah menghubungi kami.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 COFFEE - Contact</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
    <link rel="icon" type="image/png" href="foto/ico.png">
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <!-- TAMBAHKAN NOTIFIKASI DI SINI -->
    <?php if (isset($success)): ?>
        <div class="notification success">
            ✓ <?= $success ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="notification error">
            ✗ <?= $error ?>
        </div>
    <?php endif; ?>

    <div class="hero-header">
        <img src="foto/kafe.jpg" class="hero-img">
        <div class="hero-overlay"></div>

        <div class="hero-text">
            <h1>Contact Us</h1>
            <p>Berikan masukan kepada kami ✨</p>
        </div>
    </div>

    <form action="" method="POST" id="ContactForm">
        <div>
            <label for="nama"></label>
            <input type="text" id="nama" name="nama" required placeholder="Nama Anda">
        </div>
        <div>
            <label for="email"></label>
            <input type="email" id="email" name="email" required placeholder="Email Anda">
        </div>
        <div>
            <label for="nomor_hp"></label>
            <input type="text" id="nomor_hp" name="nomor_hp" required placeholder="Nomor HP Anda">
        </div>
        <div>
            <label for="pesan"></label>
            <input type="textarea" id="pesan" name="pesan" required placeholder="Masukkan Pesan">
        </div>
        <button class="contact-btn" type="submit" name="submit">Kirim</button>
    </form>

    <?php
    include 'footer.php';
    ?>

    <script src="contact.js"></script>
    <script src="cart.js"></script>
    <script>
        document.getElementById("navToggle").onclick = function () {
            document.getElementById("navLinks").classList.toggle("show-nav");
        };
    </script>

</body>

</html>